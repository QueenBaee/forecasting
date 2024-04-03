<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahanBaku extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['nama_bahanBaku', 'jenis'];
    public $timestamps = false;
}
