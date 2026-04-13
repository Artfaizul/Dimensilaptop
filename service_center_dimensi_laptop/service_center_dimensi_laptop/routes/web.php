<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController; // Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes - Dimensi Laptop System
|--------------------------------------------------------------------------
*/

// Redirect halaman utama ke login biar gak 404
Route::get('/', function () {
    return redirect()->route('login');
});

// Semua rute di bawah ini harus LOGIN dulu (Middleware Auth)
Route::middleware(['auth'])->group(function () {

    // Dashboard Utama
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // --- FITUR ADMIN (PENTING: Sudah pakai Controller) ---
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::put('/admin/update', [AdminController::class, 'update'])->name('admin.update');

    // Fitur Stok Laptop
    Route::view('/stok-laptop', 'stok-laptop')->name('stok-laptop');

    // --- FITUR SPAREPART (Dropdown System) ---
    Route::view('/sparepart/laptop', 'sparepart.laptop')->name('sparepart.laptop');
    Route::view('/sparepart/hp', 'sparepart.hp')->name('sparepart.hp');
    
});

// --- AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');