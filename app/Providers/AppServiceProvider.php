<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Message;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //全てのメソッドが全てのメソッドがよばれる前に先に呼ぶメソッド
        // 前処理ができるイメージ
        view()->composer('*', function ($view) {
            // get the current user
            $user = \Auth::user();
            // インスタンス化
            $messageModel = new Message();
            $messages = $messageModel->myMessage(\Auth::id());

            // タグに取得
            $tagModel = new Tag();
            $tags = $tagModel->where('user_id', \Auth::id())->get();

            $view->with('user', $user)->with('messages', $messages)->with('tags', $tags);
        });
    }
}
