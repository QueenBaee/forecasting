<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'data_pembelian';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['nama_bahanBaku', 'harga', 'tanggal_beli', 'vendor', 'gambar'];
}
