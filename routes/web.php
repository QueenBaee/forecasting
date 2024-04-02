<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembelianController;
use App\Models\Pembelian;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dataPembelian', [PembelianController::class, 'index']);
Route::get('dataPembelian/create',[PembelianController::class,'create']);
Route::post('dataPembelian/simpan',[PembelianController::class,'store'])->name('dataPembelian-simpan');
Route::get('dataPembelian/edit/{id}',[PembelianController::class,'edit']);

Route::get('dataPembelian/delete/{id}',[PembelianController::class,'destroy'])->name('dataPembelian-delete');