<?php

use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TypingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;

Route::middleware(['project.visibility'])->group(function(){
    Route::controller(WelcomeController::class)->group(function () {
        Route::post('/writing/store', 'store')->name('writing.store');
        Route::post('/get-passage', 'getPassage')->name('get.passage');
        Route::post('/typing-results', 'calculateResult')->name('calculate.result');
    });

    Route::controller(PrivacyController::class)->group(function(){
        Route::get('/privacy/policy','create')->name('privacy.policy');
    });

    Route::controller(TypingController::class)->group(function(){
        Route::prefix('/typing')->name('typing.')->group(function(){
            Route::get('/type/{type}', 'create')->name('type');
        });
    });

    Route::get('/get-student-by-id', [TypingController::class, 'getStdId'])->name('get-student-by-id');
});
