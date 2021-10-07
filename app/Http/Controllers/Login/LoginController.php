<?php
//ログイン機能、新規登録機能自作
namespace App\Http\Controllers\Login;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
//メール送信
use App\Mail\ConfirmMail;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
    protected $session_key = 'users';

    /**
     * ログイン画面の表示
     * @return View
     */
    public function showLogin()
    {
        return view('login.login_form');
    }

    /**
     * ログイン処理
     * @param Request $request
     */
    public function login(Request $request)
    {
        $form = new Form();
        $service = new LoginService();

        //バリデーション
        $request->validate($form->getRule());

        //ユーザー判定
        $user = $service->userVerify($request);

        if ($user) {
            //アカウントが停止状態
            if ($user->active == 2) {
                return back()->withErrors([
                    'login_error' => 'このアカウントは使用できません。',
                ]);
            } elseif (!$user->email_verified_at) {
                //メール認証していない
                return back()->withErrors([
                    'login_error' => 'このアカウントは使用できません。',
                ]);
            } elseif ($user->password !== $request->password) {
                //パスワード打ち間違い
                return back()->withErrors([
                    'login_error' => 'パスワードが間違っています。',
                ]);
            } else {
                //ログイン成功
                $request->session()->regenerate();
                return redirect('operate/members')->with('login_success', 'ログインに成功しました。');
            }
        } else {
            //ユーザーが存在しない
            return  back()->withErrors([
                'login_error' => 'メールアドレスが間違っています。',
            ]);
        }
    }

    /**
     * 新規登録画面の表示
     * @return View
     */
    public function showRegist()
    {
        return view('login.regist_form');
    }

    /**
     * 新規登録処理
     * @param Request $request
     */
    public function regist_confirm(Request $request)
    {
        $form = new Form();
        $ses_key = $this->session_key . '.regist';

        // バリデーション
        $request->validate($form->getRuleRegist());

        //画像パスの作成、public/members/tempに保存
        if ($request->has('icon')) {
            $iconfile = $request->file('icon');
            $temp_path = $iconfile->store('public/temp');
            $read_temp_path = str_replace('public', '/storage', $temp_path);
        }

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'temp_path' => $temp_path ?? '',
            'read_temp_path' => $read_temp_path ?? '',
        );

        //セッションに保存
        session()->put("{$ses_key}.input", $data);

        //確認画面表示
        $view = view('login.regist_confirm');
        $view->with('data', $data);

        return $view;
    }

    /**
     * 登録完了処理
     * 
     */
    public function regist_pre_complete(Request $request)
    {
        $form = new Form();
        $service = new LoginService();
        $ses_key = "{$this->session_key}.regist";

        $data = $request->session()->get("{$ses_key}.input", null);
        //データがない場合は入力画面に戻る
        if (empty($data)) {
            return redirect()->route('showRegist');
        }

        //バリデーション
        $form->getRuleRegist($data);

        //登録処理
        $user = $service->regist($data);

        //セッション削除
        session()->forget("{$ses_key}");

        //メール送信処理
        Mail::to($user)->send(new ConfirmMail($user));

        return view('login.regist_pre_complete');
    }

    public function regist_complete($email_token)
    {
        //dd($email_token);
        $service = new LoginService();

        $verifytoken = $service->verifytoken($email_token);

        if ($verifytoken === true) {
            return view('login.regist_complete');
        }
    }
}
