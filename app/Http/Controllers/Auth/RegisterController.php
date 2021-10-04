<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Registered; //追加

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:post');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'icon_url' => ['file', 'mimes:jpeg,png,jpg,bmb', 'nullable']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $temp_path = $data['icon_url']; //画像を送信せず$temp_pathがなかった時のため
        
        if(!empty($data['icon_url'])){
        date_default_timezone_set('Asia/Tokyo');
        $originalName = request()->file('icon_url')->getClientOriginalName();
        $fileName =  date("Ymd_His") . '.' . $originalName;
        $temp_path = request()->file('icon_url')->storeAs('public/members/' . $data['name'], $fileName);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'icon_url' => $temp_path,
            'active' => 1,
        ]);
    }


    /**
     * 管理者ログイン用
     */
    protected function adminValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'icon_url' => ['nullable', 'file','mimes:jpeg,png,jpg,bmb','max:2048']
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register', ['authgroup' => 'admin']);
    }

    public function registerAdmin(Request $request)
    {
        $this->adminValidator($request->all())->validate();

        event(new Registered($user = $this->createAdmin($request->all())));

        Auth::guard('admin')->login($user);

        if ($response = $this->registerAdmin($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect(RouteServiceProvider::ADMINHOME);
    }

    protected function createAdmin(array $data)
    {
        date_default_timezone_set('Asia/Tokyo');
        $originalName = request()->file('icon_url')->getClientOriginalName();
        $fileName =  date("Ymd_His") . '.' . $originalName;
        $temp_path = request()->file('icon_url')->storeAs('public/members/' . $data['name'], $fileName);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type'] = 2,
            'icon_url' => $temp_path,
            'active' => 1,
        ]);
    }

    protected function registeredAdmin(Request $request, $user)
    {
        //
    }

    /**
     * ポストからのログイン用
     */
    public function showPostRegisterForm()
    {
        return view('admin.post.register');
    }

    public function postregister(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Auth::guard('post')->login($user);

        if ($response = $this->registeredPost($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect(RouteServiceProvider::POSTHOME);
    }

    protected function registeredPost(Request $request, $user)
    {
        //
    }

}
