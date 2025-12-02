<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Home routes
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/{id}', [HomeController::class, 'show']);
