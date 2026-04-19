<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


/**
 * Dashboard Route list
 */
Route::middleware(['auth'])->controller(DashboardController::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('dashboard');
});
