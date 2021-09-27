<?php

use App\Http\Controllers\Admin\Information\InformationController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Administrator\AdministratorsController;
use App\Http\Controllers\Admin\Post\PostsController;

use Illuminate\Support\Facades\Route;

//お知らせ管理
Route::any('admin/info/regist', [InformationController::class, 'regist'])->name('admin.information.regist');
Route::post('admin/info/regist/confirm', [InformationController::class, 'regist_confirm'])->name('admin.information.regist.confirm');
Route::post('admin/info/regist/proc', [InformationController::class, 'regist_proc'])->name('admin.information.regist.proc');
Route::any('admin/info/regist/complete', [InformationController::class, 'regist_complete'])->name('admin.information.regist.complete');

Route::post('admin/info/update/confirm', [InformationController::class, 'update_confirm'])->name('admin.information.update.confirm');
Route::post('admin/info/update/proc', [InformationController::class, 'update_proc'])->name('admin.information.update.proc');
Route::any('admin/info/update/complete', [InformationController::class, 'update_complete'])->name('admin.information.update.complete');
Route::any('admin/info/update/{id}', [InformationController::class, 'update'])->name('admin.information.update');

Route::post('admin/info/delete/proc', [InformationController::class, 'delete_proc'])->name('admin.information.delete.proc');
Route::any('admin/info/delete/complete', [InformationController::class, 'delete_complete'])->name('admin.information.delete.complete');
Route::any('admin/info/delete/{id}', [InformationController::class, 'delete_confirm'])->name('admin.information.delete.confirm');

Route::any('admin/info/{id}', [InformationController::class, 'detail'])->name('admin.information.detail');

Route::any('admin/info', [InformationController::class, 'index'])->name('admin.information');

//ユーザー管理
// Route::group(['middleware' => ['auth:user']], function () {
    Route::any('admin/user/regist', [UserController::class, 'regist'])->name('admin.user.regist');
    Route::post('admin/user/regist/confirm', [UserController::class, 'regist_confirm'])->name('admin.user.regist.confirm');
    Route::post('admin/user/regist/proc', [UserController::class, 'regist_proc'])->name('admin.user.regist.proc');
    Route::any('admin/user/regist/complete', [UserController::class, 'regist_complete'])->name('admin.user.regist.complete');

    Route::post('admin/user/update/confirm', [UserController::class, 'update_confirm'])->name('admin.user.update.confirm');
    Route::post('admin/user/update/proc', [UserController::class, 'update_proc'])->name('admin.user.update.proc');
    Route::any('admin/user/update/complete', [UserController::class, 'update_complete'])->name('admin.user.update.complete');
    Route::any('admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');

    Route::post('admin/user/delete/proc', [UserController::class, 'delete_proc'])->name('admin.user.delete.proc');
    Route::any('admin/user/delete/complete', [UserController::class, 'delete_complete'])->name('admin.user.delete.complete');
    Route::any('admin/user/delete/{id}', [UserController::class, 'delete_confirm'])->name('admin.user.delete.confirm');

    Route::any('admin/user/{id}', [UserController::class, 'detail'])->name('admin.user.detail');

    Route::any('admin/user', [UserController::class, 'index'])->name('admin.user');
// });

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
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm']);

Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'registerAdmin'])->name('admin-register');

Route::view('/admin', 'admin')->middleware('auth:admin')->name('admin-home');


// Posts //確認画面なし
Route::group(['middleware' => 'auth','prefix' => 'member'], function () {
// Route::group(['prefix' => 'member'], function () {
    Route::any('newpost', [PostsController::class, 'regist'])->name('post.regist');
    Route::post('newpost/proc', [PostsController::class, 'regist_proc'])->name('post.regist.proc');
    Route::any('newpost/complete', [PostsController::class, 'regist_complete'])->name('post.regist.complete');

    Route::post('post/update/proc', [PostsController::class, 'update_proc'])->name('post.update.proc');
    Route::any('post/update/complete', [PostsController::class, 'update_complete'])->name('post.update.complete');
    Route::any('post/update/{id}', [PostsController::class, 'update'])->name('post.update');

    Route::any('post/delete/proc/{id}', [PostsController::class, 'delete_proc'])->name('post.delete.proc');
    Route::any('post/delete/complete', [PostsController::class, 'delete_complete'])->name('post.delete.complete');
    // Route::any('post/delete/{id}', [PostsController::class, 'delete_confirm'])->name('post.delete.confirm');
});
Route::group(['prefix' => 'member'], function () {
    Route::any('post/login', [PostsController::class, 'login'])->name('post.login');
    
    Route::any('post/profile', [PostsController::class, 'profile'])->name('post.profile');
    Route::post('post/profile/edit', [PostsController::class, 'editProfile'])->name('post.editProfile');
    // Route::any('post/postprofile', [PostsController::class, 'postprofile'])->name('post.postprofile');
    Route::any('post/{id}', [PostsController::class, 'detail'])->name('post.detail');
    
    Route::any('post', [PostsController::class, 'index'])->name('post.home');

});
