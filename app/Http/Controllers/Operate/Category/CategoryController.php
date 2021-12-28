<?php

namespace App\Http\Controllers\Operate\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\TakemiLibs\SimpleForm;
use App\Models\Category;
/**
 * カテゴリー管理コントローラー`
 */
class CategoryController extends Controller
{

    protected $session_key = 'category';

    /**protected $Categoryservice;

    public function __construct(CategoryService $category_service)
    {
        $this->categoryService = $category_service;
    }
    */

    /**
     * 検索一覧画面
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $search = new Search();
        $service = new CategoryService();

        $ses_key = $this->session_key . '.search';

        if ($request->has('btnSearch')) {
            $search_val = $request->all();
            //dd($search_val);
            //検索値をセッションに保存
            session()->put($ses_key . '.input', $search_val);
        }

        if ($request->has('btnSearchClear')) {
            session()->forget("{$ses_key}");
        }

        $search_val = session()->get("{$ses_key}.input", []); //セッションに値がない場合は初期化
        //var_dump($search_val);

        //検索フォームを作る
        $form = $search->build($search_val);
        //dd($form);

        //検索結果をDBから取得
        $rows = $service->getList($search_val);

        $view = view('operate.category.list');

        $view->with('rows', $rows); //検索結果
        $view->with('form', $form); //フォーム

        return $view;

        /*
        $categorie = $this->categoryService->getdata();

        return view('operate.category.category', ['categorie' => $categorie]);
        */

    }

    /**
     * 詳細画面処理
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function details(Request $request, int $id)
    {

        $service = new CategoryService();
        $data = $service->get($id);
        if (!$data) {
            return redirect()->route('category');
        }

        $details = Category::find($id);
        $form = new Form();

        //dd($data);

        $view = view('operate.category.details');
        $view->with('form', $form->getHtml($details->toArray()));
        $view->with('details', $details);
        return $view;
    }

    /**
     * 新規作成入力画面
     * @param Request $request
     * @return void
     */
    public function regist(Request $request)
    {
        $form = new Form();

        $ses_key = $this->session_key . '.regist';

        $input = session()->get("{$ses_key}.input", []);

        $view = view('operate.category.regist');
        $view->with('form', $form->buildRegist($input));

        return $view;
    }

    /**
     * 新規登録：確認画面処理
     * @param Request $request
     * @return void
     */
    public function regist_confirm(Request $request)
    {
        $form = new Form();

        $ses_key = $this->session_key . '.regist';

        $data = $request->except('img');

        //storage/app/public/tempファイルに保存
        if ($request->has('img')) {
            date_default_timezone_set('Asia/Tokyo');
            $originalName = $request->file('img')->getClientOriginalName();

            $temp_path = $request->file('img')->storeAs('public/temp', $originalName);
            $read_temp_path = Url('') . '/' . str_replace('public/', 'storage/', $temp_path);
        }
        //dd($read_temp_path);
        $data = array(
            'name' => $request->name,
            'active' => $request->active,
            'img' => $read_temp_path ?? ''
        );

        //バリデーション
        $request->validate($form->getRuleRegist($data));

        //セッションに保存
        session()->put("{$ses_key}.input", $data);

        //確認画面表示
        $view = view('operate.category.regist_confirm');
        $view->with('form', $form->getHtml($data));

        return $view;
    }

    /**
     * 新規登録：登録処理
     *
     * @param Request $request
     * @return void
     */
    public function regist_proc(Request $request)
    {
        $form = new Form();
        $service = new CategoryService();

        $ses_key = "{$this->session_key}.regist";

        $data = session()->get("{$ses_key}.input", null);

        //データがない場合は入寮画面に戻る
        if (empty($data)) {
            return redirect()->route('operate.category.regist');
        }

        //登録処理
        $service->regist($data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('operate.category.regist.complete');
    }

    /**
     * 新規登録：完了画面
     * @param Request $request
     * @return void
     */
    public function regist_complete(Request $request)
    {
        $view = view('sample.complete');

        $view->with('func_name', 'カテゴリー管理');
        $view->with('mode_name', '新規登録');
        $view->with('back', route('operate.category'));

        return $view;
    }

    /**
     * 編集画面
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $form = new Form();
        $service = new CategoryService();

        $ses_key = $this->session_key . '.update';

        if ($id) {
            $data = $service->get($id);
            session()->put("{$ses_key}.id", $id);
        }

        $input = session()->get("{$ses_key}.input", []);
        //dd($input);
        if (!$input) {
            $input = $data->toArray();
        }
        $view = view('operate.category.update');
        $view->with('form', $form->build($input));
        $view->with('data', $data);

        return $view;
    }

    /**
     * 編集：確認画面処理
     * @param Request $request
     * @return void
     */
    public function update_confirm(Request $request)
    {
        $form = new Form();
        $service = new CategoryService();

        $ses_key = $this->session_key . '.update';

        //入力値をセッションに保存
        $input = $request->all();
        session()->put("{$ses_key}.input", $input);

        //
        $data = $service->get(session()->get("{$ses_key}.id"));
        $input['id'] = $data->id;

        //dd($input);

        //バリデーション
        $request->validate($form->getRule($input));

        //確認画面表示
        $view = view('operate.category.update_confirm');
        $view->with('form', $request);
        $view->with('data', $data);

        return $view;
    }

    /**
     * 更新：登録処理
     *
     * @param Request $request
     * @return void
     */
    public function update_proc(Request $request)
    {
        $form = new Form();
        $service = new CategoryService();

        $ses_key = "{$this->session_key}.update";

        $data = session()->get("{$ses_key}.input", null);

        //データがない場合は入寮画面に戻る
        if (empty($data)) {
            return redirect()->route('operate.category.update');
        }

        //バリデーション
        $ret = SimpleForm::validation($data, $form->getRuleRegist($data));
        if ($ret !== true) {
            //入力画面にリダイレクト
            return redirect()->route('operate.category.update')->withErrors($ret);
        }

        //登録処理
        $id = session()->get("{$ses_key}.id");
        $service->update($id, $data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('operate.category.update.complete');
    }

    /**
     * 更新：完了画面
     * @param Request $request
     * @return void
     */
    public function update_complete(Request $request)
    {
        $view = view('sample.complete');

        $view->with('func_name', 'カテゴリー管理');
        $view->with('mode_name', '更新');
        $view->with('back', route('operate.category'));

        return $view;
    }

    /**
     * 削除：確認画面
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function delete_confirm(Request $request, int $id)
    {
        $form = new Form();
        $service = new CategoryService();
        $ses_key = "{$this->session_key}.delete";
        $data = $service->get($id);

        if (!$data) {
            return redirect()->route('operate.category');
        }

        session()->put("{$ses_key}.id", $id);

        $view = view('operate.category.delete_confirm');
        $view->with('form', $data);

        return $view;
    }

    /**
     * 更新：削除処理
     *
     * @param Request $request
     * @return void
     */
    public function delete_proc(Request $request)
    {
        $form = new Form();
        $service = new CategoryService();

        $ses_key = "{$this->session_key}.delete";

        $id = session()->get("{$ses_key}.id", null);

        //データがない場合は入力画面に戻る
        if (empty($id)) {
            return redirect()->route('operate.category');
        }

        //削除処理
        $service->delete($id);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('operate.category.update.complete');
    }

    }

