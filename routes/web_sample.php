<?php


//カテゴリー
Route::any('admin/category/regist', [CategoryController::class, 'regist'])->name('admin.category.regist');
Route::post('admin/category/regist/confirm', [CategoryController::class, 'regist_confirm'])->name('admin.category.regist.confirm');
Route::post('admin/category/regist/proc', [CategoryController::class, 'regist_proc'])->name('admin.category.regist.proc');
Route::any('admin/category/regist/complete', [CategoryController::class, 'regist_complete'])->name('admin.category.regist.complete');

Route::post('admin/category/update/confirm', [CategoryController::class, 'update_confirm'])->name('admin.category.update.confirm');
Route::post('admin/category/update/proc', [CategoryController::class, 'update_proc'])->name('admin.category.update.proc');
Route::any('admin/category/update/complete', [CategoryController::class, 'update_complete'])->name('admin.category.update.complete');
Route::any('admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update')/*->where('id', '[0-9]+')*/;

Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
Route::post('admin/category/delete/proc', [CategoryController::class, 'delete_proc'])->name('admin.category.delete.proc');
Route::any('admin/category/delete/complete', [CategoryController::class, 'delete_complete'])->name('admin.category.delete.complete');
Route::any('admin/category/delete/{id}', [CategoryController::class, 'delete_confirm'])->name('admin.category.delete.confirm')/*->where('id', '[0-9]+')*/;
Route::get('admin/category/{id}', [CategoryController::class, 'details'])->name('admin.category.details');
Route::any('admin/category/delete/{id}', [CategoryController::class, 'delete_confirm'])->name('admin.category.delete.confirm');
