<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TakemiLibs\SimpleForm;
use App\Models\Category;


class CategoryController extends Controller{

    protected $session_key = 'category';

    protected $Categoryservice;

    public function __construct(CategoryService $category_service)
    {
        $this->categoryService = $category_service;
    }

    /**
     * 一覧
     */
    public function index(){

        $categorie = $this->categoryService->getdata();

        return view('admin.category.category', ['categorie' => $categorie]);
    }
    /**
     * 詳細
     * @param Request $request
     */
    public function details( $id )
    {   
        $details = Category::find($id);
        $form = new Form();
        $view = view('admin.category.details');
        $view->with('form' ,$form->getHtml( $details->toArray() ) );
        $view->with('details', $details);
        return $view;
    }

    /**
     * 新規作成入力画面
     * @param Request $request
     * @return void
     */
    public function regist( Request $request ){
        $form = new Form();

        $ses_key = $this->session_key.'.regist';

        $input = session()->get("{$ses_key}.input", [] );

        $view = view('admin.category.regist');
        $view->with('form', $form->buildRegist( $input ) );

        return $view;
    }

    /**
     * 新規登録：確認画面処理
     * @param Request $request
     * @return void
     */
    public function regist_confirm( Request $request )
    {
        $form = new Form();

        $ses_key = $this->session_key.'.regist';

        $data = $request->except('img');

        //storage/app/public/tempファイルに保存
        if ($request->has('img')) {
            date_default_timezone_set('Asia/Tokyo');
            $originalName = $request->file('img')->getClientOriginalName();
            $fileName =  date("Ymd_His") . '.' . $originalName;
            $temp_path = $request->file('img')->storeAs('app/images', $fileName);
            $read_temp_path = Url('') . '/' . str_replace('public/', 'images/', $temp_path);
        }
        //dd($read_temp_path);
        $data = array(
            'name' => $request->name,
            'active' => $request->active,
            'img' => $temp_path ?? ''
        );

        //バリデーション
        $request->validate( $form->getRuleRegist( $data ) );

        //セッションに保存
        session()->put("{$ses_key}.input", $data);

        //確認画面表示
        $view = view('admin.category.regist_confirm');
        $view->with('form', $form->getHtml( $data ) );

        return $view;
    }

    /**
     * 新規登録：登録処理
     *
     * @param Request $request
     * @return void
     */
    public function regist_proc( Request $request )
    {
        $form = new Form();
        $service = new CategoryService();

        $ses_key = "{$this->session_key}.regist";

        $data = session()->get( "{$ses_key}.input", null );
        
        //データがない場合は入寮画面に戻る
        if( empty( $data ) ){
            return redirect()->route('admin.category.regist');
        }
        
        //登録処理
        $service->regist( $data );

        //セッション削除
        session()->forget( "{$ses_key}" );

        return redirect()->route('admin.category.regist.complete');
    }

    /**
     * 新規登録：完了画面
     * @param Request $request
     * @return void
     */
    public function regist_complete( Request $request )
    {
        $view = view('sample.complete');

        $view->with('func_name', 'カテゴリー管理');
        $view->with('mode_name', '新規登録');
        $view->with('back', route('admin.category') );

        return $view;
    }

    /**
     * 更新入力画面
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update( Request $request, $id ){
        $form = new Form();
        $service = new CategoryService();

        $ses_key = $this->session_key.'.update';

        if( $id ) {
            $data = $service->get( $id );
            session()->put("{$ses_key}.id", $id);
        }

        $input = session()->get("{$ses_key}.input", [] );
        if( !$input ) {
            $input = $data->toArray();
        }
        $view = view('admin.category.update');
        $view->with('form', $form->build( $input ) );
        $view->with('data', $data );

        return $view;
    }

    /**
     * 更新：確認画面処理
     * @param Request $request
     * @return void
     */
    public function update_confirm( Request $request )
    {
        $form = new Form();
        $service = new CategoryService();

        $ses_key = $this->session_key.'.update';

        //入力値をセッションに保存
        $input = $request->all();
        session()->put("{$ses_key}.input", $input );

        //バリデーション
        $request->validate( $form->getRuleRegist( $input ) );

        //
        $data = $service->get( session()->get("{$ses_key}.id") );

        //確認画面表示
        $view = view('admin.category.update_confirm');
        $view->with('form', $request );
        $view->with('data', $data );

        return $view;
    }

    /**
     * 更新：登録処理
     *
     * @param Request $request
     * @return void
     */
    public function update_proc( Request $request )
    {
        $form = new Form();
        $service = new CategoryService();

        $ses_key = "{$this->session_key}.update";

        $data = session()->get( "{$ses_key}.input", null );

        //データがない場合は入寮画面に戻る
        if( empty( $data ) ){
            return redirect()->route('admin.category.update');
        }

        //バリデーション
        $ret = SimpleForm::validation($data, $form->getRuleRegist($data) );
        if( $ret !== true ) {
            //入力画面にリダイレクト
            return redirect()->route('admin.category.update')->withErrors($ret);
        }

        //登録処理
        $id = session()->get( "{$ses_key}.id");
        $service->update( $id, $data );

        //セッション削除
        session()->forget( "{$ses_key}" );

        return redirect()->route('admin.category.update.complete');
    }

    /**
     * 更新：完了画面
     * @param Request $request
     * @return void
     */
    public function update_complete( Request $request )
    {
        $view = view('sample.complete');

        $view->with('func_name', 'カテゴリー管理');
        $view->with('mode_name', '更新');
        $view->with('back', route('admin.category') );

        return $view;
    }

    /**
     * 削除：確認画面
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function delete_confirm( Request $request, int $id )
    {
        $form = new Form();
        $service = new CategoryService();
        $ses_key = "{$this->session_key}.delete";
        $data = $service->get( $id );

        if( !$data ){
            return redirect()->route('admin.category');
        }

        session()->put( "{$ses_key}.id", $id);

        $view = view('admin.category.delete_confirm');
        $view->with( 'form', $data );

        return $view;
    }

    /**
     * 更新：削除処理
     *
     * @param Request $request
     * @return void
     */
    public function delete_proc( Request $request )
    {
        $form = new Form();
        $service = new CategoryService();

        $ses_key = "{$this->session_key}.delete";

        $id = session()->get( "{$ses_key}.id", null );

        //データがない場合は入力画面に戻る
        if( empty( $id ) ){
            return redirect()->route('admin.category');
        }

        //削除処理
        $service->delete( $id );

        //セッション削除
        session()->forget( "{$ses_key}" );

        return redirect()->route('admin.category.update.complete');
    }
}