<?php

use App\Http\Controllers\Operate\Members\MembersController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

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

include 'web_sample.php';

//ログイン、新規登録を自作
Route::get('/loginForm', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // AuthRouteMethods.phpのルートを手動で記述
// //新規登録
// Route::get('members/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('members/register', 'Auth\RegisterController@register');

// //ログイン
// Route::get('members/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('members/login', 'Auth\LoginController@login');

// //ログアウト
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// //パスワードリセット
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// //メール認証も実装している場合は以下も追加
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
