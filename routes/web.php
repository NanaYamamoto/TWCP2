<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Operate\Members\MembersController;
use App\Http\Controllers\Admin\Administrator\AdministratorsController;
use App\Http\Controllers\Admin\Post\PostsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



include 'web_sample.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});


// 山本さん作成のusersページ
Route::group(['middleware' => ['auth']], function () {
    Route::any('operate/members/regist', [MembersController::class, 'regist'])->name('operate.members.regist');
    Route::post('operate/members/regist/confirm', [MembersController::class, 'regist_confirm'])->name('operate.members.regist.confirm');
    Route::post('operate/members/regist/proc', [MembersController::class, 'regist_proc'])->name('operate.members.regist.proc');
    Route::any('operate/members/regist/complete', [MembersController::class, 'regist_complete'])->name('operate.members.regist.complete');

    Route::post('operate/members/update/confirm', [MembersController::class, 'update_confirm'])->name('operate.members.update.confirm');
    Route::post('operate/members/update/proc', [MembersController::class, 'update_proc'])->name('operate.members.update.proc');
    Route::any('operate/members/update/complete', [MembersController::class, 'update_complete'])->name('operate.members.update.complete');
    Route::any('operate/members/update/{id}', [MembersController::class, 'update'])->name('operate.members.update');

    Route::post('operate/members/delete/proc', [MembersController::class, 'delete_proc'])->name('operate.members.delete.proc');
    Route::any('operate/members/delete/complete', [MembersController::class, 'delete_complete'])->name('operate.members.delete.complete');
    Route::any('operate/members/delete/{id}', [MembersController::class, 'delete_confirm'])->name('operate.members.delete.confirm');

    Route::any('operate/members/{id}', [MembersController::class, 'detail'])->name('operate.members.detail');

    Route::any('operate/members', [MembersController::class, 'index'])->name('operate.members');
});

// AuthRouteMethods.phpのルートを手動で記述
//新規登録
Route::get('members/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('members/register', [RegisterController::class, 'register']);
//ログイン
Route::get('members/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('members/login', [LoginController::class, 'login']);

// //ログアウト
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//メール認証も実装している場合は以下も追加
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


// Admin ログイン後
Route::group(['middleware' => ['auth:admin'], 'prefix' => 'operate'], function () {
    // Route::group(['prefix' => 'operate'], function () {
    Route::any('admin/regist', [AdministratorsController::class, 'regist'])->name('operate.user.regist');
    Route::post('admin/regist/confirm', [AdministratorsController::class, 'regist_confirm'])->name('operate.user.regist.confirm');
    Route::post('admin/regist/proc', [AdministratorsController::class, 'regist_proc'])->name('operate.user.regist.proc');
    Route::any('admin/regist/complete', [AdministratorsController::class, 'regist_complete'])->name('operate.user.regist.complete');

    Route::post('admin/update/confirm', [AdministratorsController::class, 'update_confirm'])->name('operate.user.update.confirm');
    Route::post('admin/update/proc', [AdministratorsController::class, 'update_proc'])->name('operate.user.update.proc');
    Route::any('admin/update/complete', [AdministratorsController::class, 'update_complete'])->name('operate.user.update.complete');
    Route::any('admin/update/{id}', [AdministratorsController::class, 'update'])->name('operate.user.update');

    Route::post('admin/delete/proc', [AdministratorsController::class, 'delete_proc'])->name('operate.user.delete.proc');
    Route::any('admin/delete/complete', [AdministratorsController::class, 'delete_complete'])->name('operate.user.delete.complete');
    Route::any('admin/delete/{id}', [AdministratorsController::class, 'delete_confirm'])->name('operate.user.delete.confirm');
    
    Route::any('admin/profile', [AdministratorsController::class, 'profile'])->name('operate.user.profile');
    Route::any('admin/{id}', [AdministratorsController::class, 'detail'])->name('operate.user.detail');
    Route::any('admin', [AdministratorsController::class, 'index'])->name('operate.user');
});
Route::get('login/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');;
Route::get('register/admin', [RegisterController::class, 'showAdminRegisterForm']);

Route::post('login/admin', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::post('register/admin', [RegisterController::class, 'registerAdmin'])->name('admin.register');




// Posts //確認画面なし

Route::group(['prefix' => 'member'], function () {
    Route::any('newpost', [PostsController::class, 'regist'])->name('post.regist');
    Route::post('newpost/proc', [PostsController::class, 'regist_proc'])->name('post.regist.proc');
    Route::any('newpost/complete', [PostsController::class, 'regist_complete'])->name('post.regist.complete');

    Route::post('post/update/proc', [PostsController::class, 'update_proc'])->name('post.update.proc');
    Route::any('post/update/complete', [PostsController::class, 'update_complete'])->name('post.update.complete');
    Route::any('post/update/{id}', [PostsController::class, 'update'])->name('post.update');

    Route::any('post/delete/proc/{id}', [PostsController::class, 'delete_proc'])->name('post.delete.proc');
    Route::any('post/delete/complete', [PostsController::class, 'delete_complete'])->name('post.delete.complete');
    // Route::any('post/delete/{id}', [PostsController::class, 'delete_confirm'])->name('post.delete.confirm');

    Route::any('post/profile', [PostsController::class, 'profile'])->name('post.profile');
    Route::post('post/profile/edit', [PostsController::class, 'editProfile'])->name('post.editProfile');
    Route::any('post/profile/complete', [PostsController::class, 'profile_complete'])->name('post.profile.complete');
    // Route::post('post/postprofile', [PostsController::class, 'postprofile'])->name('post.postprofile');
    Route::any('post/{id}', [PostsController::class, 'detail'])->name('post.detail');

    Route::any('post', [PostsController::class, 'index'])->name('post.home');
});
Route::get('post/login', [LoginController::class, 'showPostLoginForm'])->name('post.login');
Route::post('post/login', [LoginController::class, 'postlogin'])->name('post.login');
Route::get('post/register', [RegisterController::class, 'showPostRegisterForm'])->name('post.register');
Route::post('post/register', [RegisterController::class, 'postregister'])->name('post.register');
