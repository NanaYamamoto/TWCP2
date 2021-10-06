<?php

namespace App\Http\Controllers\Login;

use App\Http\TakemiLibs\CommonService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class LoginService extends CommonService
{
    /**
     * ログイン：ユーザーを判定する
     * @param request
     * @return $user
     */
    public function userVerify($request)
    {
        $user = User::where('email', $request->email)->first();

        return $user;
    }

    /**
     * 新規登録処理
     * @param array $data 登録する情報を配列で取得`
     * @return void
     */
    public function regist($data = [])
    {
        $username = $data['name'];
        $temp_path = $data['temp_path'];
        $read_temp_path = $data['read_temp_path'];

        if ($temp_path) {
            //ファイル名は$temp_pathから"public/temp/"を除いたもの
            $filename = str_replace('public/temp/', '', $temp_path);
            //画像を保存するパス(場所)は"public/members/名前/xxx.jpeg"
            $storage_path = 'public/members/' . $username . '/' . $filename;

            //Storageファサードのmoveメソッドで、第一引数->第二引数へファイルを移動
            Storage::move($temp_path, $storage_path);
        }

        //DBに保存
        $data = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'icon_url' => $storage_path ?? '',
            'active' => '1',
            //追加
            'email_verify_token' => base64_encode($data['email']),
        ]);

        return $data;
    }

    /**
     * email_verify_tokenが存在するか調べる
     * 存在したらemail_verified_atに追加
     * @param $email_token
     */
    public function verifytoken($email_token)
    {
        //使用可能なトークンか
        if (!User::where('email_verify_token', $email_token)->exists()) {
            return view('login.regist_form')->with('message', 'エラーが発生しました。もう一度やり直してください。');
        } else {
            //email_verified_atカラムに日付を登録
            $user = User::where('email_verify_token', $email_token)->first();
            $user->email_verified_at = Carbon::now();
            if ($user->save()) {
                return true;
            } else {
                return view('login.regist_pre_complete')->with('message', 'メール認証に失敗しました。再度、メールからリンクをクリックしてください。');
            }
        }
    }
}
