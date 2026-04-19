<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Route for registration, login, forget-password
 */
Route::middleware('guest')->controller(AuthenticationController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('showRegister');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'showLogin')->name('showLogin');
    Route::post('/login', 'login')->name('login');

    /**
     * Route for reset password
     */
    Route::get('/forgot-password', 'showForgotPassword')->name('password.request');
    Route::post('/forgot-password', 'sendResetLink')->name('password.email');
    Route::get('/reset-password/{token}', 'showResetPassword')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->name('password.update');
});

Route::middleware('auth')->controller(AuthenticationController::class)->group(function(){
    Route::post('/logout','logout')->name('logout');
});

require __DIR__.'/admin.php';
