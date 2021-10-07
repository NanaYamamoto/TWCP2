<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
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
}
