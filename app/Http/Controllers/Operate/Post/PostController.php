<?php
namespace App\Http\Controllers\Operate\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 管理画面：記事管理コントローラ
 */
class PostController extends Controller {

    /**
     * 検索一覧画面
     */
    public function index( Request $request ){
        $ses_key = 'operate.post.search';
        $search = new Search();
        $service = new Service();
        $rows = [];

        $data = $request->all();
        if( $data ) {
            session()->put( $ses_key, $data);
        }

        if( $request->has('btnSearchClear') ) {
            session()->forget( $ses_key );
        }


        $data = session()->get( $ses_key, [] );

        $view = view('operate.post.list');
        $view->with('rows', $service->getList( $data ) );
        $view->with('form', $search->build( $data ) );

        return $view;
    }
}