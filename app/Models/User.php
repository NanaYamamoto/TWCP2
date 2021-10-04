<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $guard = 'admin';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'active',
        'icon_url',
        'publish_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts()
{
    return $this->hasMany('App\Models\Post');
}

    public function myContent($user_id){
        $user = \Request::query('users');
        // タグがなければ、その人が持っているメモを全て取得
        if(empty($user)){
            return $this::select('posts.*')->where('user_id', $user_id)->where('active', 1)->get();      
        }else{
        // もしタグの指定があればタグで絞る ->wher(userがクエリパラメーターで取得したものに一致)
        $posts = $this::select('posts.*')
            ->leftJoin('users', 'users.id', '=','posts.user_id')
            ->where('users.name', $user)
            // ->where('users.user_id', $user_id)
            ->where('posts.user_id', $user_id)
            ->where('active', 1)
            ->get();
        return $posts;
        }
    }
}
