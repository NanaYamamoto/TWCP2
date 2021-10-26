<?php

use App\Http\Controllers\Operate\Members\MembersController;
use App\Http\Controllers\Login\LoginController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\Administrator\AdministratorsController;
use App\Http\Controllers\Admin\Post\PostsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



// 山本さん作成のusersページ
Route::group(['middleware' => ['OperateAuth'], 'prefix' => 'operate', 'as' => 'operate.'], function () {
    Route::any('/members/regist', [MembersController::class, 'regist'])->name('members.regist');
    Route::post('/members/regist/confirm', [MembersController::class, 'regist_confirm'])->name('members.regist.confirm');
    Route::post('/members/regist/proc', [MembersController::class, 'regist_proc'])->name('members.regist.proc');
    Route::any('/members/regist/complete', [MembersController::class, 'regist_complete'])->name('members.regist.complete');

    Route::post('/members/update/confirm', [MembersController::class, 'update_confirm'])->name('members.update.confirm');
    Route::post('/members/update/proc', [MembersController::class, 'update_proc'])->name('members.update.proc');
    Route::any('/members/update/complete', [MembersController::class, 'update_complete'])->name('members.update.complete');
    Route::any('/members/update/{id}', [MembersController::class, 'update'])->name('members.update');

    Route::post('/members/delete/proc', [MembersController::class, 'delete_proc'])->name('members.delete.proc');
    Route::any('/members/delete/complete', [MembersController::class, 'delete_complete'])->name('members.delete.complete');
    Route::any('/members/delete/{id}', [MembersController::class, 'delete_confirm'])->name('members.delete.confirm');

    Route::any('/members/{id}', [MembersController::class, 'detail'])->name('members.detail');

    Route::any('/members', [MembersController::class, 'index'])->name('members');

    Route::any('admin/regist', [AdministratorsController::class, 'regist'])->name('user.regist');
    Route::post('admin/regist/confirm', [AdministratorsController::class, 'regist_confirm'])->name('user.regist.confirm');
    Route::post('admin/regist/proc', [AdministratorsController::class, 'regist_proc'])->name('user.regist.proc');
    Route::any('admin/regist/complete', [AdministratorsController::class, 'regist_complete'])->name('user.regist.complete');

    Route::post('admin/update/confirm', [AdministratorsController::class, 'update_confirm'])->name('user.update.confirm');
    Route::post('admin/update/proc', [AdministratorsController::class, 'update_proc'])->name('user.update.proc');
    Route::any('admin/update/complete', [AdministratorsController::class, 'update_complete'])->name('user.update.complete');
    Route::any('admin/update/{id}', [AdministratorsController::class, 'update'])->name('user.update');

    Route::post('admin/delete/proc', [AdministratorsController::class, 'delete_proc'])->name('user.delete.proc');
    Route::any('admin/delete/complete', [AdministratorsController::class, 'delete_complete'])->name('user.delete.complete');
    Route::any('admin/delete/{id}', [AdministratorsController::class, 'delete_confirm'])->name('user.delete.confirm');

    Route::any('admin/profile', [AdministratorsController::class, 'profile'])->name('user.profile');
    Route::any('admin/{id}', [AdministratorsController::class, 'detail'])->name('user.detail');
    Route::any('admin', [AdministratorsController::class, 'index'])->name('user');
});


//ログアウト
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//メール認証も実装している場合は以下も追加
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//管理者のログイン、新規登録
Route::get('login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('admin.login');;
Route::get('register/admin', [RegisterController::class, 'showAdminRegisterForm']);

Route::post('login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
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
});
Route::any('', [PostsController::class, 'index'])->name('post.home');

Route::get('post/login', [App\Http\Controllers\Auth\LoginController::class, 'showPostLoginForm'])->name('post.login');
Route::post('post/login', [App\Http\Controllers\Auth\LoginController::class, 'postlogin'])->name('post.login');
Route::get('post/register', [RegisterController::class, 'showPostRegisterForm'])->name('post.register');
Route::post('post/register', [RegisterController::class, 'postregister'])->name('post.register');


//一般ユーザーログイン
Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//一般ユーザー新規登録
Route::get('/regist', [LoginController::class, 'showRegist'])->name('showRegist');
Route::post('/regist/confirm', [LoginController::class, 'regist_confirm'])->name('regist.confirm');
Route::post('/regist/precomplete', [LoginController::class, 'regist_pre_complete'])->name('regist.pre.complete');
Route::get('regist/verify/{token}', [LoginController::class, 'regist_complete'])->name('regist.complete');

//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
