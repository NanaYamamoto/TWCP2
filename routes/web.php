<?php

use App\Http\Controllers\Operate\DashboardController;
use App\Http\Controllers\Operate\Members\MembersController;
use App\Http\Controllers\Operate\Administrator\AdministratorController;
use App\Http\Controllers\Operate\Category\CategoryController;
use App\Http\Controllers\Member\Archive\ArchiveController;
use App\Http\Controllers\Login\LoginController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Operate\Administrator\AdministratorsController;
use App\Http\Controllers\Member\Post\PostsController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
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

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('toppage');
});


//トップページ
Route::any('top', [PostsController::class, 'top'])->name('top');

//管理者ページ
Route::group(['middleware' => 'web_operate', 'prefix' => 'operate', 'as' => 'operate.'], function () {
    Route::any('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::any('members/regist', [MembersController::class, 'regist'])->name('members.regist');
    Route::post('members/regist/confirm', [MembersController::class, 'regist_confirm'])->name('members.regist.confirm');
    Route::post('members/regist/proc', [MembersController::class, 'regist_proc'])->name('members.regist.proc');
    Route::any('members/regist/complete', [MembersController::class, 'regist_complete'])->name('members.regist.complete');

    Route::post('members/update/confirm', [MembersController::class, 'update_confirm'])->name('members.update.confirm');
    Route::post('members/update/proc', [MembersController::class, 'update_proc'])->name('members.update.proc');
    Route::any('members/update/complete', [MembersController::class, 'update_complete'])->name('members.update.complete');
    Route::any('members/update/{id}', [MembersController::class, 'update'])->name('members.update');

    Route::post('members/delete/proc', [MembersController::class, 'delete_proc'])->name('members.delete.proc');
    Route::any('members/delete/complete', [MembersController::class, 'delete_complete'])->name('members.delete.complete');
    Route::any('members/delete/{id}', [MembersController::class, 'delete_confirm'])->name('members.delete.confirm');

    Route::any('members/{id}', [MembersController::class, 'detail'])->name('members.detail');

    Route::any('members', [MembersController::class, 'index'])->name('members');

    Route::any('admin/regist', [AdministratorController::class, 'regist'])->name('admin.regist');
    Route::post('admin/regist/confirm', [AdministratorController::class, 'regist_confirm'])->name('admin.regist.confirm');
    Route::post('admin/regist/proc', [AdministratorController::class, 'regist_proc'])->name('admin.regist.proc');
    Route::any('admin/regist/complete', [AdministratorController::class, 'regist_complete'])->name('admin.regist.complete');

    Route::post('admin/update/confirm', [AdministratorController::class, 'update_confirm'])->name('admin.update.confirm');
    Route::post('admin/update/proc', [AdministratorController::class, 'update_proc'])->name('admin.update.proc');
    Route::any('admin/update/complete', [AdministratorController::class, 'update_complete'])->name('admin.update.complete');
    Route::any('admin/update/{id}', [AdministratorController::class, 'update'])->name('admin.update');

    Route::post('admin/delete/proc', [AdministratorController::class, 'delete_proc'])->name('admin.delete.proc');
    Route::any('admin/delete/complete', [AdministratorController::class, 'delete_complete'])->name('admin.delete.complete');
    Route::any('admin/delete/{id}', [AdministratorController::class, 'delete_confirm'])->name('admin.delete.confirm');

    Route::any('admin/profile', [AdministratorController::class, 'profile'])->name('admin.profile');
    Route::any('admin/{id}', [AdministratorController::class, 'detail'])->name('admin.detail');
    Route::any('admin', [AdministratorController::class, 'index'])->name('admin');

    Route::any('category/regist', [CategoryController::class, 'regist'])->name('category.regist');
    Route::post('category/regist/confirm', [CategoryController::class, 'regist_confirm'])->name('category.regist.confirm');
    Route::post('category/regist/proc', [CategoryController::class, 'regist_proc'])->name('category.regist.proc');
    Route::any('category/regist/complete', [CategoryController::class, 'regist_complete'])->name('category.regist.complete');

    Route::post('category/update/confirm', [CategoryController::class, 'update_confirm'])->name('category.update.confirm');
    Route::post('category/update/proc', [CategoryController::class, 'update_proc'])->name('category.update.proc');
    Route::any('category/update/complete', [CategoryController::class, 'update_complete'])->name('category.update.complete');
    Route::any('category/update/{id}', [CategoryController::class, 'update'])->name('category.update')/*->where('id', '[0-9]+')*/;

    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::post('category/delete/proc', [CategoryController::class, 'delete_proc'])->name('category.delete.proc');
    Route::any('category/delete/complete', [CategoryController::class, 'delete_complete'])->name('category.delete.complete');
    Route::any('category/delete/{id}', [CategoryController::class, 'delete_confirm'])->name('category.delete.confirm')/*->where('id', '[0-9]+')*/;
    Route::get('category/{id}', [CategoryController::class, 'details'])->name('category.details');
    Route::any('category/delete/{id}', [CategoryController::class, 'delete_confirm'])->name('category.delete.confirm');
});

//管理者のログイン、新規登録
Route::get('login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::post('register/admin', [RegisterController::class, 'registerAdmin'])->name('admin.register');


//一般ユーザーログイン
Route::get('login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('login', [LoginController::class, 'login'])->name('login');
//一般ユーザー新規登録
Route::get('regist', [LoginController::class, 'showRegist'])->name('showRegist');
Route::post('regist/confirm', [LoginController::class, 'regist_confirm'])->name('regist.confirm');
Route::post('regist/precomplete', [LoginController::class, 'regist_pre_complete'])->name('regist.pre.complete');
Route::get('regist/verify/{token}', [LoginController::class, 'regist_complete'])->name('regist.complete');

// ログイン後マイページ（記事投稿）
Route::group(['prefix' => 'member', 'as' => 'member.'], function () {
    Route::any('mypage', [PostsController::class, 'index'])->name('mypage');
    Route::any('post/newpost', [PostsController::class, 'regist'])->name('post.regist');
    Route::post('post/newpost/proc', [PostsController::class, 'regist_proc'])->name('post.regist.proc');
    Route::any('post/newpost/complete', [PostsController::class, 'regist_complete'])->name('post.regist.complete');

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

    //アーカイブページ
    Route::any('archive', [ArchiveController::class, 'index'])->name('archive');
});



//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//ログアウト
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//メール認証も実装している場合は以下も追加
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


//いらない
// Route::get('post/login', [AuthLoginController::class, 'showLoginForm'])->name('post.login');
// Route::post('post/login', [AuthLoginController::class, 'postlogin'])->name('post.login');
// Route::get('post/register', [RegisterController::class, 'showPostRegisterForm'])->name('post.register');
// Route::post('post/register', [RegisterController::class, 'postregister'])->name('post.register');
