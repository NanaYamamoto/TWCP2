<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'content',
        'img',
        'user_id',
        'publish',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Likes');
    }

    public function likedBy($user)
    {
        return Likes::where('user_id', $user->id)->where('post_id', $this->id);
    }

    public function myContent($data)
    {
        $user = \Request::query('user');
        // keywordがなければ、contentを全て取得
        if (empty($data)) {
            return $this::select('posts.*')->where('active', 1)->get();
        } else {
            $hits = $this::select('posts.*')
                ->leftJoin('users', 'users.id', '=', 'posts.user_id')
                ->leftJoin('categories', 'categories.id', '=', 'posts.category_id')

                ->where('users.name', 'LIKE', "%{$data}%")
                ->orwhere('categories.name', 'LIKE', "%{$data}%")
                ->orwhere('posts.title', 'LIKE', "%{$data}%")
                ->orwhere('posts.content', 'LIKE', "%{$data}%")
                ->where('posts.active', 1) // activeカラムは最後に記述しないとうまくいかないのでここに入力
                ->orderby('posts.id','DESC')
                ->get();

            return $hits;
        }
    }
}
