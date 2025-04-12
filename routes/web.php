<?php

use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'welcome']);

// Move the language change route outside the auth middleware
Route::get('/language/{locale}', [LanguageController::class, 'changeLanguage'])->name('language.change');

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('login', [AuthController::class, 'view_login'])->name('view_login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'view_register'])->name('view_register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
    Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('forgot-password.submit');
    // Add these to your auth group
    Route::post('reset-password', [AuthController::class, 'resetPassword'])
        ->name('password.update');
    Route::get('forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
    Route::get('/reset-password/{token}', [AuthController::class, 'view_resetPassword'])->name('password.reset');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('edit', [ProfileController::class, 'edit'])->name('edit');
        Route::post('update', [ProfileController::class, 'update'])->name('update');
        Route::post('delete', [ProfileController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update');
        Route::post('delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'languages', 'as' => 'languages.'], function () {
        Route::get('', [LanguageController::class, 'index'])->name('index');
        Route::get('create', [LanguageController::class, 'create'])->name('create');
        Route::post('store', [LanguageController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LanguageController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LanguageController::class, 'update'])->name('update');
        Route::post('destroy/{id}', [LanguageController::class, 'destroy'])->name('destroy');
    });
});
