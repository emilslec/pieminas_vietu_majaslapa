<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonumentController;
use App\Http\Controllers\ImageController;

Route::redirect('/', '/monuments');

Route::resource('/monuments', MonumentController::class);
Route::resource('/images', ImageController::class);


Route::get('monuments/{id}/old-images', [MonumentController::class, 'showOldImages'])->name('monuments.show.oldImages');
Route::get('monuments/{id}/new-images', [MonumentController::class, 'showNewImages'])->name('monuments.show.newImages');

Route::post('/images/store/{monument_id}', [ImageController::class, 'store'])->name('images.store');
Route::post('/images/destroyOld/{image_id}', [ImageController::class, 'destroyOld'])->name('images.destroyOld');
Route::post('/images/destroyNew/{image_id}', [ImageController::class, 'destroyNew'])->name('images.destroyNew');
