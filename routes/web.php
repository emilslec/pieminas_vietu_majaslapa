<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonumentController;

Route::redirect('/', '/monuments');

Route::resource('/monuments', MonumentController::class);
