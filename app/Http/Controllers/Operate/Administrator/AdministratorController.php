<?php

namespace App\Http\Controllers\Operate\Administrator;

use App\Http\Controllers\Controller;
use App\Http\TakemiLibs\SimpleForm;
use Illuminate\Http\Request;

/**
 * お知らせ管理コントローラー`
 */
class AdministratorController extends Controller
{
    protected $session_key = 'Administrator';

    /**
     * 検索一覧画面
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $search = new Search();
        $service = new AdministratorService();

        $ses_key = $this->session_key . '.serach';

        if ($request->has('btnSearch')) {
            $search_val = $request->all();
            //検索値のバリデーション
            $ret = SimpleForm::validation($search_val, $search->getRule());
            if ($ret !== true) {
                //バリデーションエラーあり
                foreach ($ret->errors() as $i => $v) unset($search_val[$i]);
            }
            //検索値をセッションに保存
            session()->put($ses_key . '.input', $search_val);
        }
        if ($request->has('btnSearchClear')) {
            session()->forget("{$ses_key}");
        }

        $search_val = session()->get("{$ses_key}.input", []);
        $form = $search->build($search_val);

        $def['publish'] = __('define.publish');
        $def['type'] = __('define.user.type');

        // $rows = $service->select( $search_val );
        $rows = $service->getList($search_val);

        $view = view('operate.administrator.list');

        $view->with('rows', $rows);
        $view->with('form', $form);
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
    public function profile(Request $request)
    {

        // dd($data);
        $view = view('operate.administrator.profile');


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
        $service = new AdministratorService();
        $data = $service->get($id);

        if (!$data) {
            return redirect()->route('operate.admin');
        }
        // dd($data);
        $view = view('operate.administrator.detail');
        $view->with('form', $form->getHtml($data->toArray()));
        

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

        $view = view('operate.administrator.regist');
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
        
        if ($request->has('icon_url')) {
            $icon_image = $request->file('icon_url');
            $temp_path = $form->store($icon_image);
        }
        //dd($fileName);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'icon_url' => $temp_path ?? '',
        );
        //バリデーション
        $request->validate($form->getRuleRegist($data));
        //dd($data);
        //セッションに保存
        session()->put("{$ses_key}.input", $data);
        //確認画面表示
        $view = view('operate.administrator.regist_confirm');
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
        $service = new AdministratorService();

        $ses_key = "{$this->session_key}.regist";

        $data = session()->get("{$ses_key}.input", null);

        //データがない場合は入力画面に戻る
        if (empty($data)) {
            return redirect()->route('operate.admin.regist');
        }

        //バリデーション
        //バリデーション
        $form->getRuleRegist($data);
        // $ret = SimpleForm::validation($data, $form->getRuleRegist($data));
        // if ($ret !== true) {
        //     //入力画面にリダイレクト
        //     return redirect()->route('operate.admin.regist')->withErrors($ret);
        // }

        //登録処理

        $service->regist($data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('operate.admin.regist.complete');
    }

    /**
     * 新規登録：完了画面
     * @param Request $request
     * @return void
     */
    public function regist_complete(Request $request)
    {
        $view = view('sample.complete');

        $view->with('func_name', 'お知らせ管理');
        $view->with('mode_name', '新規登録');
        $view->with('back', route('operate.admin'));

        return $view;
    }

    /**
     * 更新入力画面
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $form = new Form();
        $service = new AdministratorService();

        $ses_key = $this->session_key . '.update';

        if ($id) {
            $data = $service->get($id);
            session()->put("{$ses_key}.id", $id);
        }

        $input = session()->get("{$ses_key}.input", []);
        if (!$input) {
            $input = $data->toArray();
        }
        $view = view('operate.administrator.update');
        $view->with('form', $form->build($input));
        $view->with('icon', $form->getHtml($data->toArray()));
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
        $service = new AdministratorService();

        $ses_key = $this->session_key . '.update';

        //入力値をセッションに保存
        $input = $request->all();
        session()->put("{$ses_key}.input", $input);
        //
        $data = $service->get(session()->get("{$ses_key}.id"));
        $input['id'] = $data->id;

        //バリデーション
        $request->validate($form->getRule($input));



        //確認画面表示
        $view = view('operate.administrator.update_confirm');
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
        $service = new AdministratorService();

        $ses_key = "{$this->session_key}.update";

        $data = session()->get("{$ses_key}.input", null);

        //データがない場合は入寮画面に戻る
        if (empty($data)) {
            return redirect()->route('operate.admin.update');
        }

        //バリデーション
        $ret = SimpleForm::validation($data, $form->getRuleRegist($data));
        if ($ret !== true) {
            //入力画面にリダイレクト
            return redirect()->route('operate.admin.update')->withErrors($ret);
        }

        //登録処理
        $id = session()->get("{$ses_key}.id");
        $service->update($id, $data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('operate.admin.update.complete');
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
        $view->with('back', route('operate.admin'));

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
        $service = new AdministratorService();
        $ses_key = "{$this->session_key}.delete";
        $data = $service->get($id);

        if (!$data) {
            return redirect()->route('operate.admin');
        }

        session()->put("{$ses_key}.id", $id);

        $view = view('operate.administrator.delete_confirm');
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
        $form = new Form();
        $service = new AdministratorService();

        $ses_key = "{$this->session_key}.delete";

        $id = session()->get("{$ses_key}.id", null);

        //データがない場合は入寮画面に戻る
        if (empty($id)) {
            return redirect()->route('operate.admin');
        }

        //削除処理
        $service->delete($id);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('operate.admin.update.complete');
    }
}
