<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Like extends Model

{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = [
        'post_id',
        'user_id',

    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function myCategoryHasNumber($category_id)
    {
        return DB::table('likes')->join('posts', 'post_id', 'posts.id')

            ->where('likes.user_id', Auth::id())->where('category_id', $category_id)->count();
    }
}
