<?php
namespace App\Http\Controllers\Admin\Post;

use App\Http\TakemiLibs\CommonService;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class InformationService extends CommonService {
    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function getList( $data = [], $offset = 30 ){
        $db = Post::query();
        $users = User::query();

        if( !empty($data['category']) ) $db->where( 'category', 'LIKE', "%{$data['category']}%");

        if( !empty($data['content']) ) $db->where( 'content', $data['content'] );

        if( !empty($data['active'] = 1) ) $db->where( 'active', $data['active'] );

        // if( !empty($data['type']) ) $db->where( 'type', $data['type'] );
        
        if( !empty($data['name']) ) $users->where( 'name', $data['name'] );
        

        if( !empty($data['publish']) ) $db->where( 'publish', $data['publish'] );

        
        return $db->paginate();
    } 

    // public function select($data = []){
    //     $data['type'] = \App\Models\Administrator::whereHas('users', function($q){
    //     $q->where('type', 2);
    //     })->get();
    // }

    /**
     * 1件のデータ取得
     * @param integer $id
     * @return object
     */
    public function get(int $id )
    {
        $data = Post::find( $id );
        $users = User::query();
        if( $data->type == 2 ){
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
    public function regist( $data = [] ){
        
        
        

        $data = Post::create( $data );
        return $data;
    }

    /**
     * 更新処理 
     * @param [content] $id
     * @param array $data 更新情報を配列で取得
     * @return object
     */
    public function update( $id, $data = [] ) {
        
        $user = \Auth::user();
        $recode = Post::where('active', 1)->where('id', $id)->where('user_id', $user['id'])->find( $id );
        if( !$recode ) return null;

        $recode->fill( $data );
        $recode->save();

        return $recode;
    }

    /**
     * 削除処理
     * @param [content] $id
     * @return void
     */
    public function delete( $id ) {
        // return User::where('id', $id)->delete();
        return Post::where('id', $id)->update(['active' => 2]);
    }
}