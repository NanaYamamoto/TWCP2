<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    // 参照させたいSQLのテーブル名を指定してあげる
    protected $table = 'categories';
    //主キーを設定
    protected $guarded = array('id');
    //タイムスタンプ
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'active',
        'img',
        'updated_at',
        'created_at'
    ];

    protected $categories = [
        'id',
        'name',
        'active',
        'img',
        'updated_at',
        'created_at'
    ];

    /*
    *DBから情報取得
    */

    public function getData()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }

    public function post()
{
    return $this->belongsTo('App\Models\Post');
}
}