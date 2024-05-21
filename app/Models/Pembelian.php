<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\bahanBaku;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'data_pembelian';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['id_bahan', 'harga', 'bulan', 'tahun'];
    public $timestamps = false;
    
    public function bahanBaku()
    {
        return $this->belongsTo(bahanBaku::class, 'id_bahan');
    }
}
