<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\bahanBakuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Controller;
use App\Models\bahanBaku;
use App\Models\Pembelian;

Route::get('/',[LoginController::class,'index']);

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin',[LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('dashboard',[PembelianController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::get('actionlogout',[LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('dataPembelian', [PembelianController::class, 'index']);
Route::get('dataPembelian/create',[PembelianController::class,'create']);
Route::post('dataPembelian/simpan',[PembelianController::class,'store'])->name('dataPembelian-simpan');
Route::get('dataPembelian/edit/{id}',[PembelianController::class,'edit']);
Route::put('dataPembelian/update/{id}',[PembelianController::class,'update'])->name('dataPembelian-update');
Route::get('dataPembelian/export_excel',[PembelianController::class,'export_excel']);
Route::get('dataPembelian/delete/{id}',[PembelianController::class,'destroy'])->name('dataPembelian-delete');


Route::get('bahanBaku',[bahanBakuController::class,'index']);
Route::get('bahanBaku/create',[bahanBakuController::class,'create']);
Route::post('bahanBaku/simpan',[bahanBakuController::class,'store'])->name('bahanBaku-simpan');
Route::get('bahanBaku/edit/{id}',[bahanBakuController::class,'edit']);
Route::put('bahanBaku/update/{id}',[bahanBakuController::class,'update'])->name('bahanBaku-update');
Route::get('bahanBaku/delete/{id}',[bahanBakuController::class,'destroy'])->name('bahanBaku-delete');