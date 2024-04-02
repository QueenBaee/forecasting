<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembelianController;
Route::get('/', function () {
    return view('dashboard');
});

Route::get('dataPembelian', [PembelianController::class, 'index']);
Route::get('dataPembelian/create',[PembelianController::class,'create']);
Route::get('dataPembelian/simpan',[PembelianController::class,'store'])->name('dataPembelian-simpan');