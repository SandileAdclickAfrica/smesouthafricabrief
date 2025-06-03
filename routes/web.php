<?php

use App\Http\Controllers\BeehiiveController;
use Illuminate\Support\Facades\Route;

Route::controller(BeehiiveController::class)->group(function () {
    Route::match(['get', 'post'],'/', 'index');
//    Route::post('/subscribe', 'subscribe')->name('subscribe');
//    Route::get('/about', 'about');
});


//Route::post('/api/form-submit', [BeehiiveController::class, 'subscribe']);
