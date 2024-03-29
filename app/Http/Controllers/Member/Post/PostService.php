<?php

namespace App\Http\Controllers\Member\Post;

use App\Http\TakemiLibs\CommonService;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PostService extends CommonService
{
    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function getList($data = [], $offset = 10)
    {
        $db = Post::query();
        $users = User::query();
        $categories = Category::query();
        $postModel = new Post();

        $db->where('user_id', '<>' ,\Auth::id());

        if (!empty($data['category_id'])) $db->where('category_id', $data['category_id']);

        if (!empty($data['title'])) $db->where('title', $data['title']);
        
        if (!empty($data['content'])) $db->where('content', $data['content']);

        if (!empty($data['active'] = 1)) $db->where('active', $data['active']);

        if (!empty($data['img'])) $db->where('img', $data['img']);

        // if( !empty($data['type']) ) $db->where( 'type', $data['type'] );

        if (!empty($data['name'])) $users->where('name', $data['name']);
        if (!empty($data['name'])) $db->categories()->select('id', 'name')->where('name', $data['name'])->get()->toArray();

        // もしキーワードが入力されている場合
        if (!empty($data['keyword'])) {
            $keyword = $postModel->myContent($data['keyword']);
            
            // キーワードが入力されていない場合
        } else{
            return $db->orderby('id','DESC')->paginate($offset);
            exit;
        }
        return $keyword->paginate($offset);
    }

    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function myPostGet($data = [], $offset = 10)
    {
        $db = Post::query();
        $users = User::query();
        $user_id = \Auth::id();
        $categories = Category::query();
        $postModel = new Post();

        $db->where('user_id', $user_id);

        if (!empty($data['category_id'])) $db->where('category_id', $data['category_id']);

        if (!empty($data['title'])) $db->where('title', $data['title']);
        
        if (!empty($data['content'])) $db->where('content', $data['content']);

        if (!empty($data['active'] = 1)) $db->where('active', $data['active']);

        if (!empty($data['img'])) $db->where('img', $data['img']);

        // if( !empty($data['type']) ) $db->where( 'type', $data['type'] );

        if (!empty($data['name'])) $users->where('name', $data['name']);
        if (!empty($data['name'])) $db->categories()->select('id', 'name')->where('name', $data['name'])->get()->toArray();

        // もしキーワードが入力されている場合
        if (!empty($data['keyword'])) {
            $keyword = $postModel->myContent($data['keyword']);
            
            // キーワードが入力されていない場合
        } else{
            return $db->orderby('id','DESC')->paginate($offset);
            exit;
        }
        return $keyword->paginate($offset);
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

        $user = Auth::user();
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
