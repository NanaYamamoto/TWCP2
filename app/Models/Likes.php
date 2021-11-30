<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikesModel extends Model
{
    use HasFactory;

    // 参照させたいSQLのテーブル名を指定してあげる
    protected $table = 'likes';

    protected $fillable = [
        'post_id',
        'user_id',
    ];
    protected $primaryKey = ['post_id', 'user_id'];
    public $incrementing = false;
}
