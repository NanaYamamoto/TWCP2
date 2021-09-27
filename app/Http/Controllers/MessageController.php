<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Tag;


class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = \Auth::user();
        $messages = Message::where('user_id', $user['id'])->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        // dd($message);
        return view('managements/management', compact('user', 'messages'));
    }

    public function create()
    {
        $user = \Auth::user();
        return view('managements/create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // 同じタグがあるか確認
        $exist_tag = Tag::where('name', $data['tag'])->where('user_id', $data['user_id'])->first();
        // dd($is_exist);
        if (empty($exist_tag['id'])) {
            // 先にタグをインサート
            $tag_id = Tag::insertGetId(['name' => $data['tag'], 'user_id' => $data['user_id']]);
        } else {
            $tag_id = $exist_tag['id'];
        }

        $message_id = Message::insertGetId([
            'message' => $data['message'],
            'user_id' => $data['user_id'],
            'tag_id' => $tag_id,
            'status' => 1
        ]);

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $message = Message::where('status', 1)->where('id', $id)->where('user_id', $user['id'])->first();
        $messages = Message::where('user_id', $user['id'])->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        //->first(); 条件に該当したものを１行取得
        // dd($message);
        $tags = Tag::where('user_id', $user['id'])->get();
        return view('managements/edit', compact('message', 'user', 'messages', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        Message::where('id', $id)->update(['message' => $inputs['message'], 'tag_id' => $inputs['tag_id']]);

        return redirect()->route('home');
    }

    public function delete(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        Message::where('id', $id)->update(['status' => 2]);
        // 一応物理削除も！！！
        // Message::where('id', $id)->delete();

        return redirect()->route('home')->with('success', '削除が完了しました');
    }
}
