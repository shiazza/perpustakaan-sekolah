<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BorrowController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Home routes
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/{id}', [HomeController::class, 'show']);

// Borrow routes
Route::post('/borrow/{bc_id}', [BorrowController::class, 'borrowBook']);
Route::post('/return/{borrow_id}', [BorrowController::class, 'returnBook']);

// Wishlist routes
Route::post('/wishlist/add/{bc_id}', [WishlistController::class, 'addToWishlist']);
Route::delete('/wishlist/remove/{bc_id}', [WishlistController::class, 'removeFromWishlist']);
Route::get('/wishlist', [WishlistController::class, 'getWishlist']);
