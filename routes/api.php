<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controller yang lu punya
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BorrowController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\WishlistController;
// TAMBAHAN: Wajib ada buat halaman Explore/Pencarian Buku di Flutter
use App\Http\Controllers\api\BookController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// User Profile
// Diubah dikit return-nya pake ['data'] biar Flutter gak error parsing User.fromJson
Route::get('/user', function (Request $request) {
    return response()->json([
        'data' => $request->user()->load('roleData')
    ]);
});

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Home routes
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/{id}', [HomeController::class, 'show']);

// ============================================================
// TAMBAHAN PENTING (Biar Explore & Detail Buku Jalan)
// ============================================================
Route::get('/books', [BookController::class, 'index']); // Buat List Buku & Search
Route::get('/books/{id}', [BookController::class, 'show']); // Buat Detail Buku

// Borrow routes
Route::post('/borrow/{bc_id}', [BorrowController::class, 'borrowBook']);
Route::post('/return/{borrow_id}', [BorrowController::class, 'returnBook']);

// Wishlist routes
Route::post('/wishlist/add/{bc_id}', [WishlistController::class, 'addToWishlist']);
Route::delete('/wishlist/remove/{bc_id}', [WishlistController::class, 'removeFromWishlist']);
Route::get('/wishlist', [WishlistController::class, 'getWishlist']);
