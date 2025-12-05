<?php

use Illuminate\Support\Facades\Route;

// --- Import Controllers (Sesuaikan dengan struktur folder kamu) ---

// Auth
use App\Http\Controllers\web\Master\Auth\AuthController;

// Dashboard
use App\Http\Controllers\web\Master\DashboardController;

// Master Data - Buku & Kategori
use App\Http\Controllers\web\Master\Book\BooklistController;
use App\Http\Controllers\web\Master\Book\BookParentController;
use App\Http\Controllers\web\Master\Book\BookChildController;
use App\Http\Controllers\web\Master\Category\CategoryController;

// Master Data - User
use App\Http\Controllers\web\Master\User\UserController;

// Transaksi (Peminjaman & Pengembalian)
use App\Http\Controllers\web\Master\BorrowController;
use App\Http\Controllers\web\Master\ReturnController;

// Laporan / Audit
use App\Http\Controllers\web\Master\AuditLogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// --- 1. PUBLIC ROUTES ---
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

// --- 2. AUTHENTICATION ROUTES (GUEST ONLY) ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// --- 3. PROTECTED ROUTES (MUST BE LOGGED IN) ---
Route::middleware('auth')->group(function () {
    
    // Logout (Harus post dan di dalam auth)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

    // --- Master Data Management ---
    
    // User Management
    Route::resource('user', UserController::class);

    // Category Management
    Route::resource('category', CategoryController::class);

    // Borrow management routes
    Route::get('/borrow', [\App\Http\Controllers\web\Master\BorrowController::class, 'index'])->name('borrow.index');
    Route::get('/borrow/{id}', [\App\Http\Controllers\web\Master\BorrowController::class, 'show'])->name('borrow.show');
    Route::post('/borrow/{borrow_id}/approve', [\App\Http\Controllers\web\Master\BorrowController::class, 'approveBorrow'])->name('borrow.approve');
    Route::post('/borrow/{borrow_id}/cancel', [\App\Http\Controllers\web\Master\BorrowController::class, 'cancelBorrow'])->name('borrow.cancel');
    Route::post('/borrow/{borrow_id}/return', [\App\Http\Controllers\web\Master\BorrowController::class, 'returnBook'])->name('borrow.return');
    Route::post('/borrow/{borrow_id}/approve-return', [\App\Http\Controllers\web\Master\BorrowController::class, 'approveReturn'])->name('borrow.approveReturn');

    // Return management routes
    Route::get('/return', [\App\Http\Controllers\web\Master\ReturnController::class, 'index'])->name('return.index');
    Route::get('/return/{id}', [\App\Http\Controllers\web\Master\ReturnController::class, 'show'])->name('return.show');
    Route::patch('/return/{borrow_id}/update-fine', [\App\Http\Controllers\web\Master\ReturnController::class, 'updateFine'])->name('return.updateFine');
    // Book Management
    Route::get('/booklist', [BooklistController::class, 'index'])->name('booklist');
    Route::resource('book-parent', BookParentController::class);
    Route::resource('book-child', BookChildController::class);

    // --- Transaction Management ---

    // 1. Peminjaman (Borrow)
    Route::prefix('borrow')->name('borrow.')->controller(BorrowController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{borrow_id}/approve', 'approveBorrow')->name('approve');
        Route::post('/{borrow_id}/cancel', 'cancelBorrow')->name('cancel');
        Route::post('/{borrow_id}/return', 'returnBook')->name('return'); // Aksi admin memproses pengembalian
    });

    // 2. Pengembalian (Return & Denda)
    Route::prefix('return')->name('return.')->controller(ReturnController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{borrow_id}/approve', 'approveReturn')->name('approve');
        Route::patch('/{borrow_id}/update-fine', 'updateFine')->name('updateFine');
    });

    // --- Audit & Logs ---
    Route::prefix('audit')->name('audit.')->controller(AuditLogController::class)->group(function() {
        Route::get('/books', 'books')->name('books');
        Route::get('/borrows', 'borrows')->name('borrows');
        Route::get('/returns', 'returns')->name('returns');
    });

});