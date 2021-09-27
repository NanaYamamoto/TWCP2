<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public function myMessage($user_id){
        $tag = \Request::query('tag');
        // タグがなければ、その人が持っているメモを全て取得
        if(empty($tag)){
            return $this::select('messages.*')->where('user_id', $user_id)->where('status', 1)->get();      
        }else{
        // もしタグの指定があればタグで絞る ->wher(tagがクエリパラメーターで取得したものに一致)
        $messages = $this::select('messages.*')
            ->leftJoin('tags', 'tags.id', '=','messages.tag_id')
            ->where('tags.name', $tag)
            ->where('tags.user_id', $user_id)
            ->where('messages.user_id', $user_id)
            ->where('status', 1)
            ->get();
        return $messages;
        }
    }
}
