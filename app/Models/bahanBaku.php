<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembelian;

class bahanBaku extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id_bahan';
    public $incrementing = true;
    protected $fillable = ['nama_bahanBaku', 'jenis'];
    public $timestamps = false;
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'id_bahan');
    }
}
