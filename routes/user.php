<?php

use App\Http\Controllers\TypingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;

Route::middleware(['project.visibility'])->group(function(){
    Route::controller(WelcomeController::class)->group(function () {
        Route::get('/user/dashboard', 'dashboard')->name('user.dashboard');
        Route::post('/writing/store', 'store')->name('writing.store');
        Route::post('/get-passage', 'getPassage')->name('get.passage');
        Route::post('/typing-results', 'calculateResult')->name('calculate.result');
    });

    Route::controller(TypingController::class)->group(function(){
        Route::prefix('/typing')->name('typing.')->group(function(){
            Route::get('/type/{type}', 'create')->name('type');
        });
    });
});
