<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        //ログインしているユーザーの取得
        $user = Auth::user();

        //管理者じゃなかったらログアウトしてリダイレクト
        if ($user->type != 1) {
            Auth::logout();
            return redirect('/login');
        }

        return $next($request);
    }
}
