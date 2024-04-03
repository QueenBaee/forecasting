<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\bahanBakuController;
use App\Models\bahanBaku;
use App\Models\Pembelian;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dataPembelian', [PembelianController::class, 'index']);
Route::get('dataPembelian/create',[PembelianController::class,'create']);
Route::post('dataPembelian/simpan',[PembelianController::class,'store'])->name('dataPembelian-simpan');
Route::get('dataPembelian/edit/{id}',[PembelianController::class,'edit']);

Route::get('dataPembelian/delete/{id}',[PembelianController::class,'destroy'])->name('dataPembelian-delete');


Route::get('bahanBaku',[bahanBakuController::class,'index']);
Route::get('bahanBaku/create',[bahanBakuController::class,'create']);
Route::post('bahanBaku/simpan',[bahanBakuController::class,'store'])->name('bahanBaku-simpan');
Route::get('bahanBaku/edit/{id}',[bahanBakuController::class,'edit']);
Route::put('bahanBaku/update/{id}',[bahanBakuController::class,'update'])->name('bahanBaku-update');
Route::get('bahanBaku/delete/{id}',[bahanBakuController::class,'destroy'])->name('bahanBaku-delete');