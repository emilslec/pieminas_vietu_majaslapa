<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonumentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\TypeController;

Route::redirect('/', '/monuments');

Route::resource('/monuments', MonumentController::class);
Route::resource('/images', ImageController::class);
Route::resource('/types', TypeController::class);


Route::get('monuments/{id}/old-images', [MonumentController::class, 'showOldImages'])->name('monuments.show.oldImages');
Route::get('monuments/{id}/new-images', [MonumentController::class, 'showNewImages'])->name('monuments.show.newImages');

Route::get('monuments/edit/{id}/old-images', [MonumentController::class, 'editOldImages'])->name('monuments.edit.oldImages');
Route::get('monuments/edit/{id}/new-images', [MonumentController::class, 'editNewImages'])->name('monuments.edit.newImages');

Route::post('/images/storeOld/{monument_id}', [ImageController::class, 'storeNew'])->name('images.storeNew');
Route::post('/images/storeNew/{monument_id}', [ImageController::class, 'storeOld'])->name('images.storeOld');

Route::post('/images/destroyOld/{image_id}', [ImageController::class, 'destroyOld'])->name('images.destroyOld');
Route::post('/images/destroyNew/{image_id}', [ImageController::class, 'destroyNew'])->name('images.destroyNew');
