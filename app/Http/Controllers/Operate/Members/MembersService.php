<?php

namespace App\Http\Controllers\Operate\Members;

use App\Http\TakemiLibs\CommonService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MembersService extends CommonService
{
    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function getList($data = [], $offset = 30)
    {
        $db = User::query();

        if (!empty($data['name'])) $db->where('name', 'LIKE', "%{$data['name']}%");

        if (!empty($data['email'])) $db->where('email', 'LIKE', "%{$data['email']}%");

        if (!empty($data['active'])) $db->where('active', 'LIKE', "%{$data['active']}%");

        return $db->paginate(10);
    }

    /**
     * 1件のデータ取得
     * @param integer $id
     * @return object
     */
    public function get(int $id)
    {
        $data = User::find($id);

        return $data;
    }

    /**
     * 新規登録処理
     * @param array $data 登録する情報を配列で取得`
     * @return void
     */
    public function regist($data = [])
    {
        //dd($data);
        //画像を移動
        if ($data['icon_url']) {

            $file_path = str_replace('temp/members', 'members/' . $data['name'], $data['icon_url']);
            Storage::move($data['icon_url'], $file_path);
        }
        //dd($file_path);

        $data = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'icon_url' => $file_path,
            'active' => '1'
        ]);

        return $data;
    }

    /**
     * 更新処理 
     * @param [type] $id
     * @param array $data 更新情報を配列で取得
     * @return object
     */
    public function update($id, $data = [])
    {

        if ($data['type'] == 2) {
            $data['content'] = $data['url'];
        }

        $recode = User::find($id);
        if (!$recode) return null;

        $recode->fill($data);
        $recode->save();

        //画像の更新処理（あれば）

        return $recode;
    }

    /**
     * 削除処理
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        //論理削除：active=2にする
        $delete_date = User::find($id);

        if ($delete_date->active === 1) {
            $delete_date->active = 2;
            $delete_date->save();
        }

        //dd($delete_date->active);
    }
}
