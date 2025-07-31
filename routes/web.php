<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/1', function () {
    return view('welcome');
});

 Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.view');
 Route::get('/', [DashboardController::class, 'index2'])->name('login.view');

