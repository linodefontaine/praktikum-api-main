<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Endpoint Auth (Untuk bikin akun dan login admin)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Endpoint Publik (Semua orang bisa lihat merchandise)
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Endpoint Protected (Wajib pakai Token Login untuk Tambah/Edit/Hapus)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    
    // Opsional: Endpoint untuk mengecek profil user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// blogs : untuk menampikan semua data blogs (GET)
// blogs : untuk menambahkan data blog baru (POST)
// blog/{id} : untuk menampilkan data blog berdasarkan id (GET)
// blog/{id} : untuk mengupdate data blog berdasarkan id (PUT)
// blog/{id} : untuk menghapus data blog berdasarkan id (DELETE)
