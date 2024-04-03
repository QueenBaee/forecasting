<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bahanBaku;
use Illuminate\Support\Facades\Redis;

class bahanBakuController extends Controller
{
    public function index(){
        $bahanBaku = bahanBaku::get();
        return view('bahanBaku.index',['bahanBaku' => $bahanBaku]);
    }
    
    public function create(){
        return view('bahanBaku.input');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'jenis'=> 'required'
        ]);
        bahanBaku::create([
            'nama_bahanBaku'=>$request->nama,
            'jenis' =>$request->jenis
        ]);
        return redirect('/bahanBaku');
    }

    public function edit($id) {
        $bahanBaku=bahanBaku::all();
        $bahanBaku=bahanBaku::findorfail($id);
        return view('bahanBaku.edit',compact('bahanBaku'),['bahanBaku'=>$bahanBaku]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama'=>'required',
            'jenis'=>'required'
        ]);
        $bahanBaku=bahanBaku::find($id);
        $bahanBaku -> nama_bahanBaku = $request ->nama;
        $bahanBaku -> jenis = $request ->jenis;
        $bahanBaku ->save();
        return redirect('/bahanBaku');
    }
    public function destroy($id){
        $bahanBaku=bahanBaku::findorfail($id);
        $bahanBaku->delete();
        //redirect to index
        return redirect('/bahanBaku')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
