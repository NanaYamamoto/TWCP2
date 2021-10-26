<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * 認証を処理する
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証に成功した
            return redirect()->intended('dashboard');
        }
    }

    public function showPostLoginForm()
    {
        return view('admin.post.login');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);



        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('post')->attempt(['email' => $request->email, 'password' => $request->password, 'type' => [1], 'active' => [1]], $request->get('remember'))) {
            return redirect()->intended('/post');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return back()->withInput($request->only('email', 'remember'));
    }

    /**
     * 管理者ログイン用
     */
    public function showAdminLoginForm()
    {
        return view('auth.adminlogin', ['authgroup' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'type' => [2], 'active' => [1]], $request->get('remember'))) {
            return redirect()->intended('/admin');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return back()->withInput($request->only('email', 'remember'));
    }


    /**
     * ユーザーを探す条件を指定する
     *
     * @param  \Illuminate\Http\Request $request
     * @return Response
     */
    protected function credentials(Request $request)
    {
        return array_merge(
            $request->only($this->username(), 'password'), // 標準の条件
            ['type' => 1], // 追加条件
            ['active' => 1] // 追加条件
        );
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:post')->except('logout');
    }
}
