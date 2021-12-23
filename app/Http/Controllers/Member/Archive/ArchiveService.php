<?php

namespace App\Http\Controllers\Member\Archive;

use App\Http\TakemiLibs\CommonService;
use App\Models\User;
use App\Models\Like;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ArchiveService extends CommonService
{

    /**
     * アーカイブ処理
     * @param $user
     * @return $ret object
     */
    public function getLikes($user)
    {

        $ret = [];
        $categories = Category::where('active', 1)->get(); //active=1の全てのカテゴリーを取得
        foreach ($categories as $cat) {

            $data = Like::query()
                ->leftjoin('posts', 'likes.post_id', '=', 'posts.id')
                ->where('posts.category_id', $cat->id)
                ->where('likes.user_id', $user->id)
                ->orderBy('created_at', 'DESC')
                ->first();

            $ret[$cat->id] = $data;
        }

        return $ret;
    }


    /**
     * カテゴリーの全データを取得
     * @param integer $id
     * @return object
     */
    public function get(int $id)
    {
        //ログインユーザーのidを取得
        $user_id = Auth::id();

        $data = Like::query()
            ->leftjoin('posts', 'likes.post_id', '=', 'posts.id')
            ->where('posts.category_id', $id)
            ->where('likes.user_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return $data;
    }

    /**
     * 1件のデータ取得
     * @param integer $id
     * @return object
     */
    public function getArticle(int $id)
    {
        $post = Post::find($id);

        return $post;
    }
}
