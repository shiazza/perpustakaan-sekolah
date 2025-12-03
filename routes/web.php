<?php

use App\Http\Controllers\AddbookController;
use App\Http\Controllers\web\Master\Auth\AuthController;
use App\Http\Controllers\web\Master\Book\BookChildController;
use App\Http\Controllers\web\Master\Book\BooklistController;
use App\Http\Controllers\web\Master\Book\BookParentController;
use App\Http\Controllers\web\Master\Category\CategoryController;
use App\Http\Controllers\web\Master\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});
// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('/booklist', [BooklistController::class, 'index'])->name('booklist');
    // Route::get('/addbook', [AddbookController::class, 'index'])->name('addbook');

    // Book Parent CRUD routes
    Route::resource('book-parent', BookParentController::class);

    // Book Child CRUD routes
    Route::resource('book-child', BookChildController::class);

    // User CRUD routes
    Route::resource('user', \App\Http\Controllers\web\Master\User\UserController::class);

    // Category CRUD routes
    Route::resource('category', CategoryController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
