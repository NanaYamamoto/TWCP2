<?php

namespace App\Http\Controllers\Operate\Administrator;

use App\Http\TakemiLibs\CommonService;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

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

        if (!empty($data['email'])) $db->where('email', $data['email']);

        if (!empty($data['type_id'] = 2)) $db->where('type_id', $data['type_id']);

        if (!empty($data['active'] = 1)) $db->where('active', $data['active']);

        if (!empty($data['icon_url'])) $db->where('icon_url', $data['icon_url']);
        return $db->paginate();
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

        if ($data->active == 1) {
            $data->url = $data->content;
            $data->content = '';
        }
        return $data;
    }

    /**
     * 新規登録処理
     * @param array $data 登録するで情報を配列で取得`
     * @return void
     */
    public function regist($data = [])
    {

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
