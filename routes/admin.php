<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\LocaleController;
use Illuminate\Support\Facades\Route;

/**
 * Dashboard Route list
 */
Route::middleware(['auth'])->controller(DashboardController::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('dashboard');
});

Route::middleware(['auth'])->controller(LocaleController::class)->prefix('lang')->group(function () {
    Route::get('/{locale}', 'change')->name('locale.change');
});

Route::middleware(['auth'])->controller(LanguageController::class)->prefix('admin/languages')->group(function () {
    Route::get('/', 'index')->name('languages.index');
    Route::get('/create', 'create')->name('languages.create');
    Route::post('/', 'store')->name('languages.store');
    Route::get('/{id}/edit', 'edit')->name('languages.edit');
    Route::put('/{id}', 'update')->name('languages.update');
    Route::delete('/{id}', 'destroy')->name('languages.destroy');
});

Route::middleware(['auth'])->controller(LanguageController::class)->prefix('admin/languages')->group(function () {
    Route::get('/', 'index')->name('languages.index');
    Route::get('/create', 'create')->name('languages.create');
    Route::post('/', 'store')->name('languages.store');
    Route::get('/{id}/edit', 'edit')->name('languages.edit');
    Route::put('/{id}', 'update')->name('languages.update');
    Route::delete('/{id}', 'destroy')->name('languages.destroy');
});
