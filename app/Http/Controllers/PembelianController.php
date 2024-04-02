<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
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
        $request->validate([
            'nama' => 'required',
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
    public function edit($id){
        $bahan = Pembelian::all();
        $bahan = Pembelian::find($id);
        return view('dataPembelian.edit', compact('bahan'),['bahan'=>$bahan]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'tanggal_beli' =>'required',
            'vendor' => 'required',
            'gambar' => 'file|image|mimes:jpeg,png,jpg:max:2048'
        ]);

        $bahan = Pembelian::find($id);
        $bahan -> nama_bahanBaku = $request ->nama_bahanBaku;
        $bahan -> harga = $request -> harga;
        $bahan -> tanggal_beli = $request->tanggal_beli;
        $bahan -> vendor = $request->vendor;
        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar');
            $nama_gambar = time()."_".$gambar->getClientOriginalName();
            $simpan_gambar = 'img_produk';
            $gambar->move($simpan_gambar, $nama_gambar); 
            $gambar = $nama_gambar;
        }
    }

    public function destroy($id){
        $bahan = Pembelian::find($id);
        $bahan -> delete();
        return back();
    }
}  
