<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user/profile', function (Request $request) {
    return $request->user();
});

// KATEGORI
// Route::get('kategori', [KategoriController::class, 'index']);
// Route::post('kategori', [KategoriController::class, 'store']);
// Route::get('kategori/{id}', [KategoriController::class, 'show']);
// Route::put('kategori/{id}', [KategoriController::class, 'update']);
// Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);

// Route::get('tag', [TagController::class, 'index']);
// Route::post('tag', [TagController::class, 'store']);
// Route::get('tag/{id}', [TagController::class, 'show']);
// Route::put('tag/{id}', [TagController::class, 'update']);
// Route::delete('tag/{id}', [TagController::class, 'destroy']);
// Route::resource('kategori', KategoriController::class)->except(['edit', 'create']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('kategori', KategoriController::class)->except(['edit', 'create']);
    Route::apiResource('tag', TagController::class)->except(['edit', 'create']);
    Route::apiResource('user', UserController::class)->except(['edit', 'create']);
    Route::apiResource('berita', BeritaController::class)->except(['edit', 'create']);

    
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
