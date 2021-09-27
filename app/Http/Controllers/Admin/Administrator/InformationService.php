<?php
namespace App\Http\Controllers\Admin\Administrator;

use App\Http\TakemiLibs\CommonService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InformationService extends CommonService {
    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function getList( $data = [], $offset = 30 ){
        $db = User::query();
        // $db->admins()->where('type', 2)->get();

        if( !empty($data['name']) ) $db->where( 'name', 'LIKE', "%{$data['name']}%");

        if( !empty($data['email']) ) $db->where( 'email', $data['email'] );

        if( !empty($data['type'] = 2) ) $db->where( 'type', $data['type'] );

        if( !empty($data['active'] = 1) ) $db->where( 'active', $data['active'] );

        if( !empty($data['icon_url']) ) $db->where( 'icon_url', $data['icon_url'] );
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
        $data = User::find( $id );

        if( $data->active == 1 ){
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

        $data['type'] = 2; //追加
        $data['password'] = Hash::make($data['password']); //追加
        $data = User::create( $data );
        return $data;
    }

    /**
     * 更新処理 
     * @param [email] $id
     * @param array $data 更新情報を配列で取得
     * @return object
     */
    public function update( $id, $data = [] ) {


        $recode = User::find( $id );
        if( !$recode ) return null;

        $recode->fill( $data );
        $recode->save();

        return $recode;
    }

    /**
     * 削除処理
     * @param [email] $id
     * @return void
     */
    public function delete( $id ) {
        // return User::where('id', $id)->delete();
        return User::where('id', $id)->update(['active' => 2]);
    }
}