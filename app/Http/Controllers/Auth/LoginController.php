<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected function credentials(Request $request)
    {
        $temporary = $request->only($this->username(), 'password');
        $temporary['active'] = 1;

        return $temporary;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        // ログイン時に入力されたメールアドレスからユーザーを探す
        $user = ModelsUser::where('email', $request->email)->first();
        // もし該当するユーザーが存在すれば
        if ($user) {
            // ユーザーがアカウント停止状態なら
            if ($user->active == 2) {
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.stop_active')],
                ]);
                // アカウント停止状態ではないのなら（パスワード打ち間違い）
            } else {
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.failed')],
                ]);
            }
            // 該当するユーザーがいないのなら（メールアドレス打ち間違い）    
        } else {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'operate/members';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
