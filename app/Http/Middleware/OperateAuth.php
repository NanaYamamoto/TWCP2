<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class OperateAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //ログインチェック
        if (Auth::check() === false) {
            echo "not login";
            exit;
            //ログイン出来ていない場合は、ログイン画面に遷移
            return redirect('dashboard');
        }

        //ログインしているユーザーの取得
        $user = Auth::user();

        //管理者じゃなかったらログアウトしてリダイレクト
        if ($user->type != 1) {
            Auth::logout();
            return redirect('dashboard');
        }

        return $next($request);
    }
}
