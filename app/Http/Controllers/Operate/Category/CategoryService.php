<?php
namespace App\Http\Controllers\Operate\Category;

use App\Http\TakemiLibs\CommonService;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryService extends CommonService {

    /**
     * 一覧データ取得
     * @param array $data 一覧データを値を配列で取得
     * @return void
     */
    public static function getdata(){

        $db = Category::all();

        return $db;
    }

    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function getList( $data = [], $offset = 30 ){
        $db = Category::query();

        if( !empty($data['name']) ) $db->where( 'name', 'LIKE', "%{$data['name']}%");

        if( !empty($data['active']) ) $db->where( 'active', $data['active'] );

        //if( !empty($data['publish']) ) $db->where( 'publish', $data['publish'] );

        return $db->paginate();
    } 

    /**
     * 1件のデータ取得
     * @param integer $id
     * @return object
     */
    public function get(int $id )
    {
        $data = Category::find( $id );

        if( $data->active == 2 ){
            $data->url = $data->content;
            $data->content = '';
        }
        return $data;
    }

    /**
     * 新規登録処理
     * @param array $data 登録する情報を配列で取得`
     * @return void
     */
    public function regist( $data = [] ){

  /*      if($data['img']){
            $file_path = str_replace('temp/members','members/'.$data['name']);
            Storage::move($data['img'],$file_path);
        }
*/
        $data = Category::create( $data );
        return $data;
    }

    /**
     * 更新処理 
     * @param [active] $id
     * @param array $data 更新情報を配列で取得
     * @return object
     */
    public function update( $id, $data = [] ) {

        if( $data['active'] == 2 ) {
            $data['content'] = $data['url'];
        }

        $recode = Category::where('id', $id)->find($id);
        if( !$recode ) return null;

        $recode->fill( $data );
        $recode->save();

        return $recode;
    }

    /**
     * 削除処理
     * @param [active] $id
     * @return void
     */
    public function delete( $id ) {
        return Category::where('id', $id)->delete();
    }
}