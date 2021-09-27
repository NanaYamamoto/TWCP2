<?php
namespace App\Http\Controllers\Admin\Information;

use App\Http\TakemiLibs\CommonService;
use App\Models\Information;

class InformationService extends CommonService {
    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function getList( $data = [], $offset = 30 ){
        $db = Information::query();

        if( !empty($data['title']) ) $db->where( 'title', 'LIKE', "%{$data['title']}%");

        if( !empty($data['type']) ) $db->where( 'type', $data['type'] );

        if( !empty($data['publish']) ) $db->where( 'publish', $data['publish'] );

        return $db->paginate( $offset );
    } 

    /**
     * 1件のデータ取得
     * @param integer $id
     * @return object
     */
    public function get(int $id )
    {
        $data = Information::find( $id );

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

        if( $data['type'] == 2 ) {
            $data['content'] = $data['url'];
        }

        $data = Information::create( $data );
        return $data;
    }

    /**
     * 更新処理 
     * @param [type] $id
     * @param array $data 更新情報を配列で取得
     * @return object
     */
    public function update( $id, $data = [] ) {

        if( $data['type'] == 2 ) {
            $data['content'] = $data['url'];
        }

        $recode = Information::find( $id );
        if( !$recode ) return null;

        $recode->fill( $data );
        $recode->save();

        return $recode;
    }

    /**
     * 削除処理
     * @param [type] $id
     * @return void
     */
    public function delete( $id ) {
        return Information::where('id', $id)->delete();
    }
}