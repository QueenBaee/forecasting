<?php

namespace App\Http\Controllers;

use App\Exports\PembelianExport;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pembelian;
use App\Models\bahanBaku;
use Illuminate\Support\Facades\DB;
use file;

class PembelianController extends Controller
{
    //
    public function dashboard() {
        $bahanbaku = bahanBaku::count();
        $beli = Pembelian::count();
        $total = Pembelian::get('harga');
        return view ('dashboard',['beli'=>$beli], ['bahanBaku'=> $bahanbaku], ['total'=>$total]);
    }
    public function index(){
        $beli = Pembelian::paginate(20);
        return view ('dataPembelian.index',['beli'=> $beli]);
    }

    public function create (){
        $bahan = bahanBaku::get();
        return view ('dataPembelian.input',['bhn'=>$bahan]);
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'bulan' =>'required',
        ]);


        Pembelian::create([
            'nama_bahanBaku' => $request->nama,
            'harga'=> $request->harga,
            'bulan'=> $request->bulan,
        ]);
    return redirect ('/dataPembelian');
    }
    public function edit($id){
        $beli = Pembelian::all();
        $beli = Pembelian::find($id);
        $bahan = bahanBaku::get();
        return view('dataPembelian.edit', compact('beli'),['bhn'=>$bahan]);
    }
    public function update(Request $request, $id){
        //dd($request->all());
        $request->validate([
            'nama_bahanBaku' => 'required',
            'harga' => 'required',
            'bulan' =>'required',
        ]);

        $beli = Pembelian::find($id);
        $beli -> nama_bahanBaku = $request ->nama_bahanBaku;
        $beli -> harga = $request -> harga;
        $beli -> bulan = $request->bulan;
        //dd($beli);
        $beli->save();
        return redirect('/dataPembelian');
    }

    public function destroy($id){
        $beli = Pembelian::find($id);
        $beli -> delete();
        return back();
    }
    public function export_excel(){
        return Excel::download(new PembelianExport,'DataPembelian.xlsx');
    }
}  
