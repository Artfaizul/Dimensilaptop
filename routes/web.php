<?php

use App\Http\Controllers\KatalogController;

Route::get('/', function () {
    return redirect()->route('katalog.index');
});

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::get('/katalog/semua', [KatalogController::class, 'all'])->name('katalog.all');