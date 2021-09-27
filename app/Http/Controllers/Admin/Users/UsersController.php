<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\TakemiLibs\SimpleForm;
use Illuminate\Http\Request;

/**
 * ユーザー管理コントローラー`
 */
class UsersController extends Controller
{
    protected $session_key = 'users';

    /**
     * 検索一覧画面
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $search = new Search();
        $service = new UsersService();

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

        //フォームを作る
        $form = $search->build($search_val);

        $def['publish'] = __('define.publish'); //(連想配列)
        $def['type'] = __('define.info.type');
        // var_dump($def['publish']);
        // var_dump($def['type']);

        //検索結果をDBから取得
        $rows = $service->getList($search_val);

        $view = view('operate.members.list');

        $view->with('rows', $rows); //検索結果
        $view->with('form', $form); //フォーム
        $view->with('def', $def);

        return $view;
    }


    /**
     * 詳細画面処理
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function detail(Request $request, int $id)
    {
        $form = new Form();
        $service = new UsersService();
        $data = $service->get($id);

        if (!$data) {
            return redirect()->route('admin.users');
        }

        $view = view('admin.users.detail');
        $view->with('form', $form->getHtml($data->toArray()));

        return $view;
    }

    /**
     * 新規作成　入力画面
     * @param Request $request
     * @return void
     */
    public function regist(Request $request)
    {
        $form = new Form();

        $ses_key = $this->session_key . '.regist'; //(users.regist)

        $input = session()->get("{$ses_key}.input", []); //("users.regist.input")
        //var_dump($input);

        $view = view('admin.users.regist');
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

        $ses_key = $this->session_key . '.regist'; //(users.regist)

        //入力値をセッションに保存
        $data = $request->all();
        session()->put("{$ses_key}.input", $data); //(->flashにすると一回だけセッションが保たれる)

        //バリデーション
        $request->validate($form->getRuleRegist($data)); //$ruleがvalidationルール
        //var_dump($form->getRuleRegist($data));

        //確認画面表示
        $view = view('admin.users.regist_confirm');
        $view->with('form', $form->getHtml($data));
        //var_dump($form->getHtml($data));

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
        $service = new UsersService();

        $ses_key = "{$this->session_key}.regist";

        //sessionからデータを取得
        $data = session()->get("{$ses_key}.input", null);

        //データがない場合は入力画面に戻る
        if (empty($data)) {
            return redirect()->route('admin.users.regist');
        }

        //バリデーション
        $ret = SimpleForm::validation($data, $form->getRuleRegist($data));
        if ($ret !== true) {
            //入力画面にリダイレクト
            return redirect()->route('admin.users.regist')->withErrors($ret);
        }

        //登録処理
        $service->regist($data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('admin.users.regist.complete');
    }

    /**
     * 新規登録：完了画面
     * @param Request $request
     * @return void
     */
    public function regist_complete(Request $request)
    {
        $view = view('sample.complete');

        $view->with('func_name', 'ユーザー管理');
        $view->with('mode_name', '新規登録');
        $view->with('back', route('admin.users'));

        return $view;
    }

    /**
     * 更新　入力画面
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $form = new Form();
        $service = new UsersService();

        $ses_key = $this->session_key . '.update';

        if ($id) {
            //DBから該当データを取得
            $data = $service->get($id);
            session()->put("{$ses_key}.id", $id); //(users.update.id);
        }

        $input = session()->get("{$ses_key}.input", []);
        //dd($input);
        if (!$input) {
            $input = $data->toArray();
        }
        //var_dump($input);
        $view = view('admin.users.update');
        $view->with('form', $form->build($input));
        $view->with('data', $data);

        return $view;
    }

    /**
     * 更新：確認画面処理
     * @param Request $request
     * @return void
     */
    public function update_confirm(Request $request)
    {
        $form = new Form();
        $service = new UsersService();

        $ses_key = $this->session_key . '.update'; //(users.update)

        //入力値をセッションに保存
        $input = $request->all();
        session()->put("{$ses_key}.input", $input); //(users.update.input)
        //var_dump($input);

        //バリデーション
        $request->validate($form->getRuleRegist($input));

        //該当データを一件取得
        $data = $service->get(session()->get("{$ses_key}.id"));
        //dd($data);

        //確認画面表示
        $view = view('admin.users.update_confirm');
        $view->with('form', $form->getHtml($input));
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
        $service = new UsersService();

        $ses_key = "{$this->session_key}.update";

        $data = session()->get("{$ses_key}.input", null);

        //データがない場合は入力画面に戻る
        if (empty($data)) {
            return redirect()->route('admin.users.update');
        }

        //バリデーション
        $ret = SimpleForm::validation($data, $form->getRuleRegist($data));
        if ($ret !== true) {
            //入力画面にリダイレクト
            return redirect()->route('admin.users.update')->withErrors($ret);
        }

        //登録処理
        $id = session()->get("{$ses_key}.id");
        $service->update($id, $data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('admin.users.update.complete');
    }

    /**
     * 更新：完了画面
     * @param Request $request
     * @return void
     */
    public function update_complete(Request $request)
    {
        $view = view('sample.complete');

        $view->with('func_name', 'お知らせ管理');
        $view->with('mode_name', '更新');
        $view->with('back', route('admin.users'));

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
        $service = new UsersService();

        $ses_key = "{$this->session_key}.delete";
        //該当データを取得
        $data = $service->get($id);
        if (!$data) {
            return redirect()->route('admin.users');
        }

        session()->put("{$ses_key}.id", $id); //(users.delete.id)

        //dd($data);
        $view = view('admin.users.delete_confirm');
        $view->with('form', $form->getHtml($data->toArray()));
        // var_dump($data->toArray());
        // var_dump($form->getHtml($data->toArray()));

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
        $form = new Form();
        $service = new UsersService();

        $ses_key = "{$this->session_key}.delete";

        $id = session()->get("{$ses_key}.id", null);

        //データがない場合は入寮画面に戻る
        if (empty($id)) {
            return redirect()->route('admin.users');
        }

        //削除処理
        $service->delete($id);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('admin.users.update.complete');
    }
}
