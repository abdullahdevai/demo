<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

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
});

require __DIR__ . '/admin.php';
