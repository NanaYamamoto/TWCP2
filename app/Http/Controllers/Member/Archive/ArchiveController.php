<?php

namespace App\Http\Controllers\Member\Archive;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\Archive\ArchiveService;
use App\Http\TakemiLibs\SimpleForm;
use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    /**
     * アーカイブページを表示
     * return view
     */
    public function index()
    {
        $service = new ArchiveService();

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $data = $service->getLikes($user);

        $num = $service->countLikes($user); //カテゴリーごとのarchive記事数を取得

        $view = view('member.archive.archive');
        $view->with('datas', $data);
        $view->with('nums', $num);
        return $view;
    }

    /**
     * カテゴリーごとの記事表示
     * @param int $id //カテゴリーidを取得
     * return view
     */
    public function category(Request $request, int $id)
    {
        $service = new ArchiveService();

        $data = $service->get($id);

        $view = view('member.archive.category');
        $view->with('datas', $data);
        return $view;
    }

    /**
     * 記事表示
     * @param int $id //記事idを取得
     * return view
     */
    public function article(Request $request, int $id)
    {
        $form = new Form();
        $service = new ArchiveService();

        $post = $service->getArticle($id);
        //dd($post->img);
        $data = $form->getHtml($post->toArray());
        $view = view('member.archive.article');
        $view->with('post', $post);
        $view->with('row', $data);
        //$view->with('form', $form->getHtml($post->toArray()));
        return $view;
    }
}
