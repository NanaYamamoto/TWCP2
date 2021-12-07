<?php

namespace App\Http\Controllers\Member\Archive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Validator;

class LikesController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->post_id = $request->post_id;
        $like->save();

        return redirect()->route('member.post.search');
    }

    public function delete(Request $request)
    {
        $like = Like::where('id', $request->like_id)->first();
        // 受け取ったHTTPリクエストからIDを判別し、指定のレコードを一つ取得
        $like->delete();
        return redirect()->route('member.post.search');
    }
}
