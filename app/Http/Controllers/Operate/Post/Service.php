<?php
namespace App\Http\Controllers\Operate\Post;

use App\Http\TakemiLibs\CommonService;
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

        if( !empty($data['keyword']) ) {
            $keyword = $data['keyword'];
            //OR検索処理の書き方
            $db->where( function( $query ) use ( $keyword ) {
                $query->where('title', 'LIKE', "%{$keyword}%");
                $query->OrWhere('content', 'LIKE', "%{$keyword}%");
            });
        }

        if( !empty($data['begin_at']) ) {
            $db->where( 'created_at', '>=', $data['begin_at'] );
        }

        if( !empty($data['end_at']) ) {
            $db->where( 'created_at', '<=', $data['end_at'] );
        }

        return $db->paginate( $offset );
    }
}