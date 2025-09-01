<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddbookController;
use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\LandingController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BooklistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\DashboardController;

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

Route::get('/addbook', [AddbookController::class, 'index'])->name('addbook');
Route::get('/category', [CategoryController::class, 'index'])->name('category');

Route::get('/category', [CategoryContoller::class, 'index'])->name('category.index');
Route::get('/landing_page', [LandingController::class, 'index'])->name('landing_page');

