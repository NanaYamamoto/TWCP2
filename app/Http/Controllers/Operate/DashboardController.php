<?php
namespace App\Http\Controllers\Operate;

use App\Http\Controllers\Controller;
use App\Http\TakemiLibs\SimpleForm;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Member\Post\Form;
use App\Http\Controllers\Member\Post\PostService;
use App\Http\Controllers\Member\Post\Search;

class DashboardController extends Controller{

    protected $session_key = 'dashboard';

    public function index(Request $request)
    {
        $search = new Search();
        $service = new PostService();

        $ses_key = $this->session_key . '.serach';

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


        $view = view('operate.dashboard');

        $view->with('rows', $rows);
        $view->with('form', $form);
        $view->with('def', $def);
        $view->with('user', $user);
        $view->with('categories', $categories);

        return $view;
    }
}