<?php

use App\Http\Controllers\BeehiiveController;
use Illuminate\Support\Facades\Route;

Route::controller(BeehiiveController::class)->group(function () {
    Route::get('/', 'index');
//    Route::get('/about', 'about');
});
