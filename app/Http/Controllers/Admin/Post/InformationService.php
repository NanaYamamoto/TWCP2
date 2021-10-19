<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\TakemiLibs\CommonService;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class InformationService extends CommonService
{
    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function getList($data = [], $offset = 30)
    {
        $db = Post::query();
        $users = User::query();


        if (!empty($data['category_id'])) $db->where('category_id', ' LIKE', "%{$data['category_id']}%");

        if (!empty($data['content'])) $db->where('content', $data['content']);

        if (!empty($data['active'] = 1)) $db->where('active', $data['active']);

        // if( !empty($data['type']) ) $db->where( 'type', $data['type'] );

        if (!empty($data['name'])) $users->where('name', $data['name']);


        if (!empty($data['publish'])) $db->where('publish', $data['publish']);

        // もしキーワードが入力されている場合
        if (!empty($data['keyword'])) {
            
            $keyword = $data['keyword'];
            $db->where('content', 'LIKE', "%{$keyword}%") 
            && $users->where('name', 'LIKE', "%{$keyword}%");
            

            // $first = $users
            //     ->where('name', 'LIKE', "%{$keyword}%");

            // $all = $db
            //     ->where('content', 'LIKE', "%{$keyword}%")
            //     ->union($first);
                

            // 検索結果を結合したい
            
            // キーワードが入力されていない場合
        } 

        return $db->paginate();
        
        // return $all;

    }

    /**
     * 1件のデータ取得
     * @param integer $id
     * @return object
     */
    public function get(int $id)
    {
        $data = Post::find($id);
        $users = User::query();
        if ($data->type == 2) {
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
        $data = Post::create($data);
        return $data;
    }

    /**
     * 更新処理 
     * @param [content] $id
     * @param array $data 更新情報を配列で取得
     * @return object
     */
    public function update($id, $data = [])
    {

        $user = \Auth::user();
        $recode = Post::where('active', 1)->where('id', $id)->where('user_id', $user['id'])->find($id);
        if (!$recode) return null;

        $recode->fill($data);
        $recode->save();

        return $recode;
    }

    /**
     * 削除処理
     * @param [content] $id
     * @return void
     */
    public function delete($id)
    {
        // return User::where('id', $id)->delete();
        return Post::where('id', $id)->update(['active' => 2]);
    }
}
