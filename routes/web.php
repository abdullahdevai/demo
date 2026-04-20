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

/**
 * Logout Route
 */
Route::middleware('auth')->controller(AuthenticationController::class)->group(function () {
    Route::post('/logout', 'logout')->name('logout');
});

/**
 * Route for verify email
 */
Route::controller(AuthenticationController::class)->group(function () {
    Route::get('email/verify', 'verifyPage')->middleware('auth')->name('verification.notice');
    Route::post('/email/verification-notification', 'verifyLinkSend')->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    Route::get('/email/verify/{id}/{hash}', 'verifyEmail')->middleware(['auth', 'signed'])->name('verification.verify');
});

require __DIR__ . '/admin.php';
