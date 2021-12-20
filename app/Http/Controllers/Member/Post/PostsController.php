<?php

namespace App\Http\Controllers\Member\Post;

use App\Http\Controllers\Controller;
use App\Http\TakemiLibs\SimpleForm;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    protected $session_key = 'post';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * マイページ画面
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $search = new Search();
        $service = new PostService();

        $ses_key = $this->session_key . '.mypage';

        $user = Auth::user();
        $categories = Category::select('id', 'name')->get()->pluck('name', 'id');

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

        $def['active'] = __('define.info.type');

        $rows = $service->myPostGet($search_val);

        $view = view('top');

        $view->with('rows', $rows);
        $view->with('form', $form);
        $view->with('def', $def);
        $view->with('user', $user);
        $view->with('categories', $categories);

        return $view;
    }

    public function toppage(Request $request)
    {
        $user = Auth::user();
        $data = new Category();  // "Category"の全データ取得
        
        //$categories = Category::select('id','name')->get()->pluck('name','id');

        //$data = Category::where('category_id',1) ->orderBy('created_at','DESC') ->get); //->get();
        //$name = Category::find([1,2,3]);

        //各カテゴリの記事を一件表示したい
        $posts = Category::where('active',1)->get();
        //dd( $posts );
        $data = [];
        foreach( $posts as $post ){
            $data[$post->id] = Post::where('category_id', $post->id)
                                ->where('active',1)
                                ->orderby('created_at','DESC')
                                ->first();
        }
        //dd($data);

        //各カテゴリを表示したい
        $cats = Post::where('active',1)->get();
        //dd( $cats );
        $posts_data = [];
        foreach( $cats as $cat ){
            $posts_data[$cat->id] = Category::where('id', $cat->id)
                                ->where('active',1)
                                ->orderby('created_at','DESC')
                                ->first();
        }
        //dd($posts_data);
            
        //記事の値を取得
        $post_title = Post::select('title')
            ->orderBy('created_at' ,'DESC')
            ->get();  
        $post_title = json_decode($post_title,true);

        $post_img = Post::select('img')
            ->orderBy('created_at' ,'DESC')
            ->get();  
        $post_img= json_decode($post_img,true);
        //画像パスを変更
        $post_img = str_replace('public/', '', $post_img);
        
        $post_category = Post::select('category_id')
            ->orderBy('created_at' ,'DESC')
            ->get();
        $post_category = json_decode($post_category,true);
        //dd($post_category);
        //記事を配列化
        $post_array = array('title'=>$post_title ,'img'=>$post_img ,'category'=>$post_category);
        //dd($post_array);

        //配列を分解
        $post_title = array_column($post_title, 'title');
        $post_img = array_column($post_img, 'img');
        $post_category = array_column($post_category, 'category_id');
        //dd($post_title);
        
        //カテゴリーの値を取得
        $category_name = Category::select('name')
            ->orderBy('created_at' ,'DESC') 
            ->get();
        $category_name = json_decode($category_name,true);

        $category_img = Category::select('img')
            ->orderBy('created_at' ,'DESC') 
            ->get();  
        $category_img = json_decode($category_img,true);
        //画像パスを変更
        //dd($category_img);

        //カテゴリーを配列化
        $category_array = array('name'=>$category_name ,'img'=>$category_img);
        //dd($category_array);

        //配列を分解
        $category_name = array_column($category_name, 'name');
        $category_img = array_column($category_img, 'img');
        //dd($category_name);

        $categories = Category::select('id', 'name')->get()->pluck('name', 'id');
        $view = view('toppage');
        $view->with('user', $user);

        $view->with('post_title',$post_title);
        $view->with('post_img',$post_img);
        $view->with('post_category',$post_category);
        $view->with('category_name',$category_name);
        $view->with('category_img',$category_img);

        $view->with('categories', $cats );
        $view->with('data', $data );

        return $view;
    }

    /**
     * 検索一覧画面
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $search = new Search();
        $service = new PostService();

        $ses_key = $this->session_key . '.search';

        $user = Auth::user();
        $categories = Category::select('id', 'name')->get()->pluck('name', 'id');

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

        $def['active'] = __('define.info.type');

        $rows = $service->getList($search_val);

        $view = view('member.post.search');

        $view->with('rows', $rows);
        $view->with('form', $form);
        $view->with('def', $def);
        $view->with('user', $user);
        $view->with('categories', $categories);

        return $view;
    }

    public function detail(Request $request, int $id)
    {
        $form = new Form();
        $service = new PostService();
        $data = $service->get($id);
        //dd($data);
        $user = Auth::user();

        if (!$data) {
            return redirect()->route('member.mypage');
        }
        $rows = $service->myPostGet($data);
        $view = view('member.post.detail');
        $view->with('form', $form->getHtml($data->toArray()));
        //dd($form->getHtml($data->toArray()));
        $view->with('rows', $rows);
        $view->with('user', $user);

        return $view;
    }

    public function detail_other(Request $request, int $id)
    {
        $form = new Form();
        $service = new PostService();
        $data = $service->get($id);
        //dd($data);
        $user = Auth::user();

        if (!$data) {
            return redirect()->route('member.post.search');
        }
        $rows = $service->getList($data);
        $view = view('member.post.detail_other');
        $view->with('form', $form->getHtml($data->toArray()));
        //dd($form->getHtml($data->toArray()));
        $view->with('rows', $rows);
        $view->with('user', $user);

        return $view;
    }

    public function profile(Request $request)
    {
        $search = new Search();
        $service = new PostService();

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $db = Post::all()->where('user_id',\Auth::id())->count();
        $arcive = Like::query()->where('user_id',\Auth::id())->count();
        
        $view = view('member.post.profile');
        $view->with('user', $user);
        $view->with('db', $db);
        $view->with('arcive', $arcive);
        return $view;
    }

    public function profile_edit(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $view = view('member.post.profile_edit');
        $view->with('user', $user);
        return $view;
    }


    public function profile_proc(Request $request)
    {
        $user = Auth::user();

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


        return redirect()->route('member.post.profile.complete');
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
        $view->with('back', route('member.mypage'));

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
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $ses_key = $this->session_key . '.regist';

        $input = session()->get("{$ses_key}.input", []);

        $view = view('member.post.regist');
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
        $service = new POstService();
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
            'title' => $request->title,
            'content' => $request->content,
            'img' => $read_temp_path ?? '',
            'user_id' => $user,
            'active' => $request->active,
        );
        //var_dump($data);
        //バリデーション
        // $request->validate($form->getRuleRegist($data));

        //dd($data);
        //セッションに保存
        session()->put("{$ses_key}.input", $data);
        //確認画面表示

        //データがない場合は入力画面に戻る
        if (empty($data)) {
            return redirect()->back();
        }

        // バリデーション
        // $ret = SimpleForm::validation($data, $form->getRuleRegist($data));
        // if ($ret !== true) {
        //     //入力画面にリダイレクト
        //     return redirect()->route('member.post.regist')->withErrors($ret);
        // }
        $form->getRuleRegist($data);



        //登録処理
        $service->regist($data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('member.post.regist.complete');
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
        $view->with('back', route('member.mypage'));

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
        $service = new PostService();

        $ses_key = $this->session_key . '.update';
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        if ($id) {
            $data = $service->get($id);
            session()->put("{$ses_key}.id", $id);
        }

        $input = session()->get("{$ses_key}.input", []);
        if (!$input) {
            $input = $data->toArray();
        }
        $view = view('member.post.update');
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
        $service = new PostService();

        $ses_key = "{$this->session_key}.update";

        $data = $request->all();

        //データがない場合は入力画面に戻る
        if (empty($data)) {
            return redirect()->route('post.update');
        }

        $read_temp_path = null;

        $data['img'] = $request->except('img');
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

        $data['img'] = $read_temp_path ?? '';

        //バリデーション
        $ret = SimpleForm::validation($data, $form->getRuleRegist($data));
        if ($ret !== true) {
            //入力画面にリダイレクト
            return redirect()->back()->withErrors($ret);
        }

        //登録処理
        $id = session()->get("{$ses_key}.id");
        $service->update($id, $data);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('member.post.update.complete');
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
        $view->with('back', route('member.mypage'));

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
        $service = new PostService();

        $ses_key = "{$this->session_key}.delete";
        $data = $service->get($id);
        // dd($data);

        //データがない場合は入力画面に戻る
        if (empty($data)) {
            return redirect()->route('member.mypage');
        }

        //削除処理
        $service->delete($id);

        //セッション削除
        session()->forget("{$ses_key}");

        return redirect()->route('member.post.delete.complete');
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
        $view->with('back', route('member.mypage'));

        return $view;
    }
}
