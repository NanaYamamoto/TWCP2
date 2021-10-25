<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\TakemiLibs\SimpleForm;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    protected $session_key = 'post';

    /**
     * 検索一覧画面
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $search = new Search();
        $service = new InformationService();

        $ses_key = $this->session_key . '.serach';
        
        $user = \Auth::user();
        $categories = Category::select('id','name')->get()->pluck('name','id');

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
            // dd($search_val['name']);
        }
        if ($request->has('btnSearchClear')) {
            session()->forget("{$ses_key}");
        }

        $search_val = session()->get("{$ses_key}.input", []);
        $form = $search->build($search_val);
        // $service->user_id = \Auth::id();

        $def['publish'] = __('define.publish');
        $def['active'] = __('define.info.type');

        $rows = $service->getList($search_val);

        $view = view('top');

        $view->with('rows', $rows);
        $view->with('form', $form);
        $view->with('def', $def);
        $view->with('user', $user);
        $view->with('categories', $categories);

        return $view;
    }

    public function top(Request $request)
    {
        
        
        $user = \Auth::user();
        $categories = Category::select('id','name')->get()->pluck('name','id');


        $view = view('toppage');

        
        $view->with('user', $user);
        

        return $view;
    }

    public function profile(Request $request)
    {
        $user = \Auth::user();
        if (!$user) {
            return redirect()->route('post.login');
        }
        $view = view('admin.post.profile');
        $view->with('user', $user);
        return $view;
    }
    public function postprofile(Request $request)
    {
        $search = new Search();
        $service = new InformationService();

        $ses_key = $this->session_key . '.serachpost';
        $users = User::select('users.*')->where('active', 1);

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
        // $service->user_id = \Auth::id();

        $def['publish'] = __('define.publish');
        $def['active'] = __('define.info.type');

        $rows = $service->getList($search_val);

        $view = view('admin.post.postprofile');

        $view->with('rows', $rows);
        $view->with('form', $form);
        $view->with('def', $def);
        $view->with('user', $users);

        return $view;
    }


    public function editProfile(Request $request)
    {
        $user = \Auth::user();

        $data = $request->except('icon_url');
        $fileName = null;
        //dd($request->file('icon_url'));
        //$imagefile = $request->file('icon_url');
        //storage/app/public/tempファイルに保存
        if ($request->has('icon_url')) {
            // date_default_timezone_set('Asia/Tokyo');
            // $originalName = $request->file('icon_url')->getClientOriginalName();
            // $fileName =  date("Ymd_His") . '.' . $originalName;
            // $temp_path = $request->file('icon_url')->storeAs('/public/temp', $fileName);
            // $read_temp_path = $user->id . '/' . str_replace('public/', 'storage/', $temp_path);

            $fileName = $this->saveAvatar($request->file('icon_url'));
            $user->icon_url = $fileName;
        }
        //dd($fileName);
        $data = array(
            'name' => $request->name,

            'icon_url' => $fileName,
        );

        $user->name = $data['name'];
        $user->icon_url = $data['icon_url'];
        $user->save();

        
            return redirect()->route('post.profile.complete');
    }

    public function saveAvatar(UploadedFile $file)
    {
        $tempPath = $this->makeTempPath();

        Image::make($file)->fit(200, 200)->save($tempPath);

        $filePath = Storage::disk('public')
            ->putFile('members', new File($tempPath));

        return basename($filePath);
    }

    /**
     * プロフィール：変更完了画面
     * @param Request $request
     * @return void
     */
    public function profile_complete(Request $request)
    {
        $view = view('sample.post_complete');

        $view->with('func_name', 'お知らせ管理');
        $view->with('mode_name', 'プロフィール変更');
        $view->with('back', route('post.home'));

        return $view;
    }

    /**
     * 一時的なファイルを生成してパスを返します。
     *
     * @return string ファイルパス
     */
    private function makeTempPath(): string
    {
        $tmp_fp = tmpfile();
        $meta   = stream_get_meta_data($tmp_fp);
        return $meta["uri"];
    }


    /**
     * 新規作成　入力画面
     * @param Request $request
     * @return void
     */
    public function regist(Request $request)
    {
        $form = new Form();
        $user = \Auth::user();
        if (!$user) {
            return redirect()->route('post.login');
        }

        $ses_key = $this->session_key . '.regist';

        $input = session()->get("{$ses_key}.input", []);

        $view = view('admin.post.regist');
        $view->with('form', $form->buildRegist($input));

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
        $service = new InformationService();
        $user = \Auth::id();

        $ses_key = "{$this->session_key}.regist";
        $read_temp_path = null;

        $data = $request->except('img');
        //dd($request->file('img'));
        //$imagefile = $request->file('img');
        //storage/app/public/tempファイルに保存
        if ($request->has('img')) {
            date_default_timezone_set('Asia/Tokyo');
            $originalName = $request->file('img')->getClientOriginalName();
            $fileName =  date("Ymd_His") . '.' . $originalName;
            $temp_path = $request->file('img')->storeAs('public/temp', $fileName);
            $read_temp_path = Url('') . '/' . str_replace('public/', 'storage/', $temp_path);
        }
        //dd($fileName);
        $data = array(
            'category_id' => $request->category_id,
            'content' => $request->content,
            'img' => $read_temp_path ?? '',
            'user_id' => $user,
            'active' => $request->active,
            'publish' => $request->publish,
        );
        //var_dump($data);
        //バリデーション
        // $request->validate($form->getRuleRegist($data));

        //dd($data);
        //セッションに保存
        session()->put("{$ses_key}.input", $data);
        //確認画面表示

        //データがない場合は入寮画面に戻る
        if (empty($data)) {
            return redirect()->back();
        }

        // //バリデーション
        $ret = SimpleForm::validation($data, $form->getRuleRegist($data));
        if ($ret !== true) {
            //入力画面にリダイレクト
            return redirect()->route('post.regist')->withErrors($ret);
        }



        //登録処理
        $service->regist($data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('post.regist.complete');
    }

    /**
     * 新規登録：完了画面
     * @param Request $request
     * @return void
     */
    public function regist_complete(Request $request)
    {
        $view = view('sample.post_complete');

        $view->with('func_name', 'お知らせ管理');
        $view->with('mode_name', '新規登録');
        $view->with('back', route('post.home'));

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
        $service = new InformationService();

        $ses_key = $this->session_key . '.update';
        $user = \Auth::user();
        if (!$user) {
            return redirect()->route('post.login');
        }

        if ($id) {
            $data = $service->get($id);
            session()->put("{$ses_key}.id", $id);
        }

        $input = session()->get("{$ses_key}.input", []);
        if (!$input) {
            $input = $data->toArray();
        }
        $view = view('admin.post.update');
        $view->with('form', $form->build($input));
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
        $service = new InformationService();

        $ses_key = "{$this->session_key}.update";

        $data = $request->all();

        //データがない場合は入寮画面に戻る
        if (empty($data)) {
            return redirect()->route('post.update');
        }

        //バリデーション
        $ret = SimpleForm::validation($data, $form->getRuleRegist($data));
        if ($ret !== true) {
            //入力画面にリダイレクト
            return redirect()->route('post.update')->withErrors($ret);
        }

        //登録処理
        $id = session()->get("{$ses_key}.id");
        $service->update($id, $data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('post.update.complete');
    }

    /**
     * 更新：完了画面
     * @param Request $request
     * @return void
     */
    public function update_complete(Request $request)
    {
        $view = view('sample.post_complete');

        $view->with('func_name', 'お知らせ管理');
        $view->with('mode_name', '更新');
        $view->with('back', route('post.home'));

        return $view;
    }


    /**
     * 削除：登録処理
     *
     * @param Request $request
     * @return void
     */
    public function delete_proc(Request $request, int $id)
    {
        $form = new Form();
        $service = new InformationService();

        $ses_key = "{$this->session_key}.delete";
        $data = $service->get($id);
        // dd($data);

        //データがない場合は入寮画面に戻る
        if (empty($data)) {
            return redirect()->route('post.home');
        }

        //削除処理
        $service->delete($id);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('post.delete.complete');
    }

    /**
     * 削除：完了画面
     * @param Request $request
     * @return void
     */
    public function delete_complete(Request $request)
    {
        $view = view('sample.post_complete');

        $view->with('func_name', 'お知らせ管理');
        $view->with('mode_name', '削除');
        $view->with('back', route('post.home'));

        return $view;
    }
}
