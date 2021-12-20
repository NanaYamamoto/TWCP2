<?php
namespace App\Http\Controllers\Operate\Post;

use App\Http\TakemiLibs\CommonService;
use App\Models\Category;
use App\Models\Post;

class Service extends CommonService {

    /**
     * 検索処理
     * @param array $data 検索条件を値を配列で取得
     * @return void
     */
    public function getList($data = [], $offset = 30)
    {
        $db = Post::query();

        $db->where('active', 1 );

        if( !empty($data['keyword']) ) {
            $keyword = $data['keyword'];
            //OR検索処理の書き方
            $db->where(function( $query ) use ( $keyword ) {
                $query->where('title', 'LIKE', "%{$keyword}%");
                $query->orwhere('content', 'LIKE', "%{$keyword}%");
            });
        }

        if( !empty($data['begin_at']) ) {
            $db->where( 'created_at', '>=', $data['begin_at'] );
        }

        if( !empty($data['end_at']) ) {
            $db->where( 'created_at', '<=', $data['end_at'] );
        }

        if( !empty($data['category']) ) {
            $db->where( 'category_id', '<=', $data['category'] );
        }

        return $db->paginate( $offset );
    }

    public static function getCagetoryItems(){
        return Category::where('active',1)->pluck('name')->toArray();
    }

    public function delete($id) {
        return Post::where('id', $id)->update(['active' => 2]);
    }
}