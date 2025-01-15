<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PassageController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::controller(WelcomeController::class)->group(function () {
        Route::get('/', 'welcome')->name('welcome');
        Route::post('/writing/store', 'store')->name('writing.store');
        Route::post('/get-passage', 'getPassage')->name('get.passage');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store')->name('login.store');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/home', 'index')->name('dashboard');
    });

    Route::controller(PassageController::class)->group(function () {
        Route::prefix('passage')->name('passage.')->group(function () {
            Route::get('/list', 'index')->name('list');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::delete('/destroy{id}', 'destroy')->name('destroy');
        });
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
