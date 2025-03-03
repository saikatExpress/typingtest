<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PassageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\BannerController;

Route::middleware(['auth', 'admin', 'check.status'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/home', 'index')->name('dashboard');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/list', 'index')->name('list');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
        });
    });

    Route::prefix('admin')->name('profile.')->group(function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'show')->name('show');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/update', 'update')->name('update');
        });
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

    Route::controller(BannerController::class)->group(function () {
        Route::prefix('banner')->name('banner.')->group(function () {
            Route::get('/list', 'index')->name('list');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
        });
    });

    Route::delete('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

    Route::controller(SettingController::class)->group(function () {
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/project', 'projectSetting')->name('project');
            Route::post('/project/update', 'update')->name('project_update');
        });
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});