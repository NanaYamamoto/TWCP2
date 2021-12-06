<?php

namespace App\Http\Controllers\Operate\Administrator;

use App\Http\TakemiLibs\CommonService;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdministratorService extends CommonService
{
    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function getList($data = [], $offset = 30)
    {
        $db = Administrator::query();
        // $db->admins()->where('type_id', 2)->get();
        //1.参照Modelsをadministratorに変更(新規/登録/削除) 2.typeをtype_idに変更

        if (!empty($data['name'])) $db->where('name', 'LIKE', "%{$data['name']}%");

        if (!empty($data['email'])) $db->where('email', 'LIKE', "%{$data['email']}%");

        if (!empty($data['type_id'] = 2)) $db->where('type_id', $data['type_id']);

        if (!empty($data['active'])) $db->where('active', 'LIKE', "%{$data['active']}%");

        return $db->paginate(10);
    }

    // public function select($data = []){
    //     $data['type_id'] = \App\Models\Administrator::whereHas('Administrators', function($q){
    //     $q->where('type_id', 2);
    //     })->get();
    // }

    /**
     * 1件のデータ取得
     * @param integer $id
     * @return object
     */
    public function get(int $id)
    {
        $data = Administrator::find($id);

        return $data;
    }

    /**
     * 新規登録処理
     * @param array $data 登録するで情報を配列で取得`
     * @return void
     */
    public function regist($data = [])
    {
        $file_path = null;
        //dd($data);
        //画像を移動
        if ($data['icon_url']) {
            $file_path = str_replace('temp/administrators', 'administrators/' . $data['name'], $data['icon_url']);
            Storage::move($data['icon_url'], $file_path);
        }
        //dd($file_path);

        $data = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'icon_url' => $file_path,
            'active' => 1,
            'type' => 2,
        ]);

        $data['password'] = Hash::make($data['password']); //追加
        $data = Administrator::create($data);

        return $data;
    }

    /**
     * 更新処理 
     * @param [email] $id
     * @param array $data 更新情報を配列で取得
     * @return object
     */
    public function update($id, $data = [])
    {


        $recode = Administrator::find($id);
        if (!$recode) return null;

        $recode->fill($data);
        $recode->save();

        return $recode;
    }

    /**
     * 削除処理
     * @param [email] $id
     * @return void
     */
    public function delete($id)
    {
        // return Administrator::where('id', $id)->delete();
        return Administrator::where('id', $id)->update(['active' => 2]);
    }
}
