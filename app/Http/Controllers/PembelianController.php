<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembelian;
use file;

class PembelianController extends Controller
{
    //
    public function index(){
        $bahan = Pembelian::get();
        return view ('dataPembelian.index',['bahan'=> $bahan]);
    }

    public function create (){
        return view ('dataPembelian.input');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_bahanBaku' => 'required',
            'harga' => 'required',
            'tanggal_beli' =>'required',
            'vendor' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg:max:2048'
        ]);

        $gambar= $request->file('gambar');
        $nama_gambar = time()."_".$gambar->getClientOriginalName();
        $simpan_gambar = 'img_bukti';
        $gambar->move($simpan_gambar,$nama_gambar);

        Pembelian::create([
            'nama_bahanBaku' => $request->nama,
            'harga'=> $request->harga,
            'tanggal_beli'=> $request->tanggal_beli,
            'vendor' => $request->vendor,
            'gambar'=> $nama_gambar
        ]);
    return redirect ('/dataPembelian');
    }
}  
