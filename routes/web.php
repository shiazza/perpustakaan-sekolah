<?php

use App\Http\Controllers\BooklistController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\AuthController;

// Dummy route for test view
Route::get('/1', function () {
    return view('welcome');
});

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.view');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
});
Route::get('/booklist', [BooklistController::class, 'index'])->name('booklist');

