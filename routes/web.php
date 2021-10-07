<?php

use App\Http\Controllers\Operate\Members\MembersController;
use App\Http\Controllers\Login\LoginController;
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

//ログイン
Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//新規登録
Route::get('/regist', [LoginController::class, 'showRegist'])->name('showRegist');
Route::post('/regist/confirm', [LoginController::class, 'regist_confirm'])->name('regist.confirm');
Route::post('/regist/precomplete', [LoginController::class, 'regist_pre_complete'])->name('regist.pre.complete');

Route::get('regist/verify/{token}', [LoginController::class, 'regist_complete'])->name('regist.complete');
