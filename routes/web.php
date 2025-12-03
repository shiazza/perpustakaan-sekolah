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
    Route::post('/borrow/{borrow_id}/approve', [\App\Http\Controllers\web\Master\BorrowController::class, 'approveBorrow'])->name('borrow.approve');
    Route::post('/borrow/{borrow_id}/cancel', [\App\Http\Controllers\web\Master\BorrowController::class, 'cancelBorrow'])->name('borrow.cancel');
    Route::post('/borrow/{borrow_id}/return', [\App\Http\Controllers\web\Master\BorrowController::class, 'returnBook'])->name('borrow.return');

    // Return management routes
    Route::get('/return', [\App\Http\Controllers\web\Master\ReturnController::class, 'index'])->name('return.index');
    Route::get('/return/{id}', [\App\Http\Controllers\web\Master\ReturnController::class, 'show'])->name('return.show');
    Route::post('/return/{borrow_id}/approve', [\App\Http\Controllers\web\Master\ReturnController::class, 'approveReturn'])->name('return.approve');

    // Audit log routes
    Route::get('/audit/books', [\App\Http\Controllers\web\Master\AuditLogController::class, 'books'])->name('audit.books');
    Route::get('/audit/borrows', [\App\Http\Controllers\web\Master\AuditLogController::class, 'borrows'])->name('audit.borrows');
    Route::get('/audit/returns', [\App\Http\Controllers\web\Master\AuditLogController::class, 'returns'])->name('audit.returns');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
