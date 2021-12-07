<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;

    // 参照させたいSQLのテーブル名を指定してあげる
    protected $table = 'likes';

    protected $fillable = [
        'post_id',
        'user_id',
    ];
    
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
