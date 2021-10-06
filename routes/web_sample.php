<?php

use App\Http\Controllers\Admin\Information\InformationController;
use Illuminate\Support\Facades\Route;

//お知らせ管理
//新規登録
Route::any('admin/info/regist', [InformationController::class, 'regist'])->name('admin.information.regist');
Route::post('admin/info/regist/confirm', [InformationController::class, 'regist_confirm'])->name('admin.information.regist.confirm');
Route::post('admin/info/regist/proc', [InformationController::class, 'regist_proc'])->name('admin.information.regist.proc');
Route::any('admin/info/regist/complete', [InformationController::class, 'regist_complete'])->name('admin.information.regist.complete');
//変更
Route::post('admin/info/update/confirm', [InformationController::class, 'update_confirm'])->name('admin.information.update.confirm');
Route::post('admin/info/update/proc', [InformationController::class, 'update_proc'])->name('admin.information.update.proc');
Route::any('admin/info/update/complete', [InformationController::class, 'update_complete'])->name('admin.information.update.complete');
Route::any('admin/info/update/{id}', [InformationController::class, 'update'])->name('admin.information.update');
//削除
Route::post('admin/info/delete/proc', [InformationController::class, 'delete_proc'])->name('admin.information.delete.proc');
Route::any('admin/info/delete/complete', [InformationController::class, 'delete_complete'])->name('admin.information.delete.complete');
Route::any('admin/info/delete/{id}', [InformationController::class, 'delete_confirm'])->name('admin.information.delete.confirm');
//詳細
Route::any('admin/info/{id}', [InformationController::class, 'detail'])->name('admin.information.detail');

Route::any('admin/info', [InformationController::class, 'index'])->name('admin.information');

//ユーザー管理
Route::any('admin/users/regist', [UsersController::class, 'regist'])->name('admin.users.regist');
Route::post('admin/users/regist/confirm', [UsersController::class, 'regist_confirm'])->name('admin.users.regist.confirm');
Route::post('admin/users/regist/proc', [UsersController::class, 'regist_proc'])->name('admin.users.regist.proc');
Route::any('admin/users/regist/complete', [UsersController::class, 'regist_complete'])->name('admin.users.regist.complete');

Route::post('admin/users/update/confirm', [UsersController::class, 'update_confirm'])->name('admin.users.update.confirm');
Route::post('admin/users/update/proc', [UsersController::class, 'update_proc'])->name('admin.users.update.proc');
Route::any('admin/users/update/complete', [UsersController::class, 'update_complete'])->name('admin.users.update.complete');
Route::any('admin/users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');

Route::post('admin/users/delete/proc', [UsersController::class, 'delete_proc'])->name('admin.users.delete.proc');
Route::any('admin/users/delete/complete', [UsersController::class, 'delete_complete'])->name('admin.users.delete.complete');
Route::any('admin/users/delete/{id}', [UsersController::class, 'delete_confirm'])->name('admin.users.delete.confirm');

Route::any('admin/users/{id}', [UsersController::class, 'detail'])->name('admin.users.detail');

Route::any('admin/users', [UsersController::class, 'index'])->name('admin.users');
