<?php

use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Guest;
use Illuminate\Support\Facades\Route;

Route::get('/laravel-info', function () {
    return view('welcome');
});

Route::prefix('a')->name('admin.')->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
});

Route::prefix('u')->name('user')->group(function () {
});

Route::get('/', [Guest::class, 'index']);
