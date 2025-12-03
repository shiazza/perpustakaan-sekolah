<?php

use App\Http\Controllers\AddbookController;
use App\Http\Controllers\web\Master\Auth\AuthController;
use App\Http\Controllers\web\Master\Book\BookChildController;
use App\Http\Controllers\web\Master\Book\BooklistController;
use App\Http\Controllers\web\Master\Book\BookParentController;
use App\Http\Controllers\web\Master\Category\CategoryController;
use App\Http\Controllers\web\Master\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');


// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
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

    // Borrow management routes
    Route::get('/borrow', [\App\Http\Controllers\web\Master\BorrowController::class, 'index'])->name('borrow.index');
    Route::get('/borrow/{id}', [\App\Http\Controllers\web\Master\BorrowController::class, 'show'])->name('borrow.show');
    Route::post('/borrow/{borrow_id}/return', [\App\Http\Controllers\web\Master\BorrowController::class, 'returnBook'])->name('borrow.return');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
