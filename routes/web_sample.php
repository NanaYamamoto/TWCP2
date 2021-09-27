<?php

use App\Http\Controllers\Admin\Information\InformationController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

//お知らせ管理
Route::any ('admin/info/regist', [InformationController::class, 'regist'])->name('admin.information.regist');
Route::post('admin/info/regist/confirm', [InformationController::class, 'regist_confirm'])->name('admin.information.regist.confirm');
Route::post('admin/info/regist/proc', [InformationController::class, 'regist_proc'])->name('admin.information.regist.proc');
Route::any ('admin/info/regist/complete', [InformationController::class, 'regist_complete'])->name('admin.information.regist.complete');

Route::post('admin/info/update/confirm', [InformationController::class, 'update_confirm'])->name('admin.information.update.confirm');
Route::post('admin/info/update/proc', [InformationController::class, 'update_proc'])->name('admin.information.update.proc');
Route::any ('admin/info/update/complete', [InformationController::class, 'update_complete'])->name('admin.information.update.complete');
Route::any ('admin/info/update/{id}', [InformationController::class, 'update'])->name('admin.information.update')/*->where('id', '[0-9]+')*/ ;

Route::post('admin/info/delete/proc', [InformationController::class, 'delete_proc'])->name('admin.information.delete.proc');
Route::any ('admin/info/delete/complete', [InformationController::class, 'delete_complete'])->name('admin.information.delete.complete');
Route::any ('admin/info/delete/{id}', [InformationController::class, 'delete_confirm'])->name('admin.information.delete.confirm')/*->where('id', '[0-9]+')*/ ;

Route::any ('admin/info/{id}', [InformationController::class, 'detail'])->name('admin.information.detail')/*->where('id', '[0-9]+')*/ ;

Route::any ('admin/info', [InformationController::class, 'index'])->name('admin.information');

//ユーザー管理
Route::any ('admin/user/regist', [UserController::class, 'regist'])->name('admin.user.regist');
Route::post('admin/user/regist/confirm', [UserController::class, 'regist_confirm'])->name('admin.user.regist.confirm');
Route::post('admin/user/regist/proc', [UserController::class, 'regist_proc'])->name('admin.user.regist.proc');
Route::any ('admin/user/regist/complete', [UserController::class, 'regist_complete'])->name('admin.user.regist.complete');

Route::post('admin/user/update/confirm', [UserController::class, 'update_confirm'])->name('admin.user.update.confirm');
Route::post('admin/user/update/proc', [UserController::class, 'update_proc'])->name('admin.user.update.proc');
Route::any ('admin/user/update/complete', [UserController::class, 'update_complete'])->name('admin.user.update.complete');
Route::any ('admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update')/*->where('id', '[0-9]+')*/ ;

Route::post('admin/user/delete/proc', [UserController::class, 'delete_proc'])->name('admin.user.delete.proc');
Route::any ('admin/user/delete/complete', [UserController::class, 'delete_complete'])->name('admin.user.delete.complete');
Route::any ('admin/user/delete/{id}', [UserController::class, 'delete_confirm'])->name('admin.user.delete.confirm')/*->where('id', '[0-9]+')*/ ;

Route::any ('admin/user/{id}', [UserController::class, 'detail'])->name('admin.user.detail')/*->where('id', '[0-9]+')*/ ;

Route::any ('admin/user', [UserController::class, 'index'])->name('admin.user');

//林が作成した部分
Route::prefix('management')->group(function() {
    Route::get('/', [MessageController::class, 'index'])->name('home');
    Route::get('/create', [MessageController::class, 'create'])->name('create');
    Route::post('/store', [MessageController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MessageController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [MessageController::class, 'update'])->name('update')/*->where('id', '[0-9]+')*/ ;
    Route::post('/delete/{id}', [MessageController::class, 'delete'])->name('delete')/*->where('id', '[0-9]+')*/ ;
});

//カテゴリー
Route::any ('admin/category/regist', [CategoryController::class, 'regist'])->name('admin.category.regist');
Route::post('admin/category/regist/confirm', [CategoryController::class, 'regist_confirm'])->name('admin.category.regist.confirm');
Route::post('admin/category/regist/proc', [CategoryController::class, 'regist_proc'])->name('admin.category.regist.proc');
Route::any ('admin/category/regist/complete', [CategoryController::class, 'regist_complete'])->name('admin.category.regist.complete');

Route::post('admin/category/update/confirm', [CategoryController::class, 'update_confirm'])->name('admin.category.update.confirm');
Route::post('admin/category/update/proc', [CategoryController::class, 'update_proc'])->name('admin.category.update.proc');
Route::any ('admin/category/update/complete', [CategoryController::class, 'update_complete'])->name('admin.category.update.complete');
Route::any ('admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update')/*->where('id', '[0-9]+')*/ ;

Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
Route::post('admin/category/delete/proc', [CategoryController::class, 'delete_proc'])->name('admin.category.delete.proc');
Route::any ('admin/category/delete/complete', [CategoryController::class, 'delete_complete'])->name('admin.category.delete.complete');
Route::any ('admin/category/delete/{id}', [CategoryController::class, 'delete_confirm'])->name('admin.category.delete.confirm')/*->where('id', '[0-9]+')*/ ;
Route::get('admin/category/{id}', [CategoryController::class, 'details'])->name('admin.category.details');
Route::any('admin/category/delete/{id}', [CategoryController::class, 'delete_confirm'])->name('admin.category.delete.confirm');
//Route::any ('admin/category/delete/{id}', [CategoryController::class, 'delete_confirm'])->name('admin.category.delete.confirm')/*->where('id', '[0-9]+')*/ ;