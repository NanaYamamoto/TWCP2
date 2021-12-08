<?php

namespace App\Http\Controllers\Member\Archive;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * アーカイブページを表示
     * 
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
        //dd($data);
        $view = view('member.archive.archive');
        $view->with('likes', $data);
        return $view;
    }

    /**
     * カテゴリーごとの記事表示
     * @param int $id //カテゴリーidを取得
     * return view
     */
    public function detail(Request $request, int $id)
    {
        // dd($id);
        $service = new ArchiveService();

        $data = $service->get($id);

        $view = view('member.archive.detail');
        $view->with('datas', $data);

        return $view;
    }
}
