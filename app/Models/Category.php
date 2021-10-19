<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    // 参照させたいSQLのテーブル名を指定してあげる
    protected $table = 'categorie';
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

    protected $categorie = [
        'id',
        'name',
        'active',
        'img',
        'updated_at',
        'created_at'
    ];

    public static $rules = [
        'id' => 'required',
        'name' => 'required|max: 30',
        'active' => 'required',
        'img' => 'image','file','mimes:jpeg,png,jpg,bmb',
        'updated_at' => 'required|date',
        'created_at' => 'required|date',
    ];

    /*
    *DBから情報取得
    */

    public function getData()
    {
        $data = DB::table($this->table)->get();

        return $data;
    }
}

