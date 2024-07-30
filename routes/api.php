<?php

use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\KategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
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

Route::apiResource('kategori', KategoriController::class);
Route::apiResource('tag', TagController::class);
Route::apiResource('user', UserController::class);