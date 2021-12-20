<?php
namespace App\Http\Controllers\Operate\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
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
        $view->with('rows', $service->getList( $data, 20 ) );
        $view->with('form', $search->build( $data ) );

        return $view;
    }

        /**
     * 削除：確認画面
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function delete_confirm(int $id)
    {
        $ses_key = 'operate.post.delete';
        $service = new Service();
        $data = Post::find( $id );

        if (!$data) {
            return redirect()->route('operate.post');
        }
        session()->put("{$ses_key}.id", $id);

        $view = view('operate.post.delete_confirm');
        $view->with('form', $data);

        return $view;
    }

    /**
     * 更新：登録処理
     *
     * @param Request $request
     * @return void
     */
    public function delete_proc(Request $request)
    {
        $service = new Service();

        $ses_key = 'operate.post.delete';

        $id = session()->get("{$ses_key}.id", null);

        //データがない場合は入寮画面に戻る
        if (empty($id)) {
            return redirect()->route('operate.post');
        }

        //削除処理
        $service->delete($id);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('operate.post.delete.complete');
    }

    public function delete_complete(Request $request)
    {
        $view = view('sample.complete');

        $view->with('func_name', '記事管理');
        $view->with('mode_name', '削除');
        $view->with('back', route('operate.post'));

        return $view;
    }
}