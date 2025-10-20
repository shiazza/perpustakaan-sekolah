<?php

use App\Http\Controllers\AddbookController;
use App\Http\Controllers\BooklistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\AuthController;

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('/booklist', [BooklistController::class, 'index'])->name('booklist');
    Route::get('/addbook', [AddbookController::class, 'index'])->name('addbook');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});