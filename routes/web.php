<?php

use App\Http\Controllers\BeehiiveController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::controller(BeehiiveController::class)->group(function () {
    Route::match(['get', 'post'],'/', 'index');
//    Route::post('/subscribe', 'subscribe')->name('subscribe');
//    Route::get('/about', 'about');
});


//Route::post('/api/form-submit', [BeehiiveController::class, 'subscribe']);


//Route::get('/movies/authentication', [MovieController::class, 'authentication']);
//Route::get('/movies/search', [MovieController::class, 'search']);
//Route::get('/movies/{id}', [MovieController::class, 'show']);
//Route::get('/movies/trending', [MovieController::class, 'trending']);
