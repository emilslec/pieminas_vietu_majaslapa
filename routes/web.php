<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonumentController;
use App\Http\Controllers\ImageController;

Route::redirect('/', '/monuments');



Route::middleware('auth')->group(function () {
    Route::resource('/images', ImageController::class);
    Route::resource('/monuments', MonumentController::class)->except(['index', 'show']);

    // Route::get('/monuments/create', [MonumentController::class, 'create'])->name('monuments.create');
    // Route::post('/monuments/store', [MonumentController::class, 'store'])->name('monuments.store');
    // Route::get('/monuments/{id}/edit', [MonumentController::class, 'edit'])->name('monuments.edit');
    // Route::put('/monuments/{id}/update', [MonumentController::class, 'update'])->name('monuments.update');

    // Route::delete('/monuments/{id}/destroy', [MonumentController::class, 'destroy'])->name('monuments.destroy');


    Route::get('/monuments/edit/{id}/old-images', [MonumentController::class, 'editOldImages'])->name('monuments.edit.oldImages');
    Route::get('/monuments/edit/{id}/new-images', [MonumentController::class, 'editNewImages'])->name('monuments.edit.newImages');
    Route::get('/monuments/edit/{id}/documents', [MonumentController::class, 'editDocuments'])->name('monuments.edit.documents');

    Route::post('/images/storeOld/{monument_id}', [ImageController::class, 'storeNew'])->name('images.storeNew');
    Route::post('/images/storeNew/{monument_id}', [ImageController::class, 'storeOld'])->name('images.storeOld');
    Route::post('/images/storeDocument/{monument_id}', [ImageController::class, 'storeDocument'])->name('images.storeDocument');

    Route::post('/images/destroyOld/{image_id}', [ImageController::class, 'destroyOld'])->name('images.destroyOld');
    Route::post('/images/destroyNew/{image_id}', [ImageController::class, 'destroyNew'])->name('images.destroyNew');
    Route::post('/images/destroyDocument/{image_id}', [ImageController::class, 'destroyDocument'])->name('images.destroyDocument');
});

Route::get('/monuments/pdf', [MonumentController::class, 'generatePdf'])->name('monuments.pdf');
Route::get('/monuments/{id}/old-images', [MonumentController::class, 'showOldImages'])->name('monuments.show.oldImages');
Route::get('/monuments/{id}/new-images', [MonumentController::class, 'showNewImages'])->name('monuments.show.newImages');
Route::get('/monuments/{id}/documents', [MonumentController::class, 'showDocuments'])->name('monuments.show.documents');
Route::get('/monuments', [MonumentController::class, 'index'])->name('monuments.index');
Route::get('/monuments/{id}', [MonumentController::class, 'show'])->name('monuments.show');

require __DIR__ . '/auth.php';
