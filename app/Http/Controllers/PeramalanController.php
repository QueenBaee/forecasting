<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bahanBaku;
use App\Models\Pembelian;

class PeramalanController extends Controller
{
    public function index(){
        $bahan=bahanBaku::with(['pembelian'])->get();
        $pembelian = Pembelian::all();
        return view ('peramalan.index',['bhn'=>$bahan,  'pembelian' => $pembelian]);
    }

    public function hitung(Request $request, $id){

      $bulandepan = $request->input('bulanPrediksi');
      $bahan_terpilih = bahanBaku::findOrFail($id);
        $bahan_get = bahanBaku::with(['pembelian'])->get();
 
      function limitArraySum($array, $limit, $start){
        $sum =0;
        $i=1;

        foreach($array as $element){
            if ($i >= $start){
                $sum += $element;
                if($i == $limit ){
                    break;
                }
            }
            $i++;
        }
        return $sum;
        
      } 
      
      

      $totalBulanPrediksi = count($bahan_terpilih->pembelian);
      // dd($totalBulanPrediksi);
      $y = [];
      $x = [];
      foreach($bahan_terpilih->pembelian as $pembelian){
        $y[] = $pembelian -> harga;
        $x[] = $pembelian -> Bulan;
      }
    
      $nBulanPrediksi = count($x);
      // hapus coment
      function regresiLinear($x, $y, $n, $t){
          $nBulanPrediksi = count($x);
          //   $t = $nBulanPrediksi;
          $t = $nBulanPrediksi;

            $jumlahXiYi = 0;
            $jumlahXiKuadrat = 0;          
            $countStart = (($t - ($n - 1)) - 1);
            $p = 0;
            
            for($i = $countStart; $i<$t; $i++){
                $x[$i] = $p+1;
                $jumlahXiYi += (($x[$i]) * $y [$i]);
                $jumlahXiKuadrat += (($x[$i])* ($x [$i]));
                $p++;
            }
            
            $jumlahX = limitArraySum($x, $p, $countStart);
            $jumlahY = limitArraySum($y, $p, $countStart);
            
            $avgY = $jumlahY / count ($y);
            $avgX = $jumlahX / count ($x);

            $b = (($p * $jumlahXiYi)- ($jumlahX * $jumlahY)) / (($p * $jumlahXiKuadrat) - ($jumlahX * $jumlahX));
            $a = ($avgY - $b * $avgX);
            
            return ['b' => $b, 'a' => $a ];
            
      }

      $trend = regresiLinear($x, $y, $nBulanPrediksi, $totalBulanPrediksi );
      
      $ramalanHarga = ['trend' =>[]];
      $bulandepan = ($nBulanPrediksi+1);
      for ($i = 1; $i < $bulandepan; $i++) {
        $ramalanHarga['trend'][$i] = $trend['a'] + $trend['b'] * ($nBulanPrediksi + $i);
    }
      // hapus coment
      // $ramalanHarga['trend'][$i] = $trend['a'] + $trend['b'] * $bulandepan;

     $ramalanPenjualan = [];
        for ($i = 0; $i < $nBulanPrediksi; $i++) {

            $ramalanPenjualan['trend'][$i] = $trend['a'] + $trend['b'] * $x[$i] + $i;

        }

        // $ramalanPenjualan['trend'][$i] = $trend['a'] + $trend['b'] * $nBulanPrediksi;
// dd($ramalanHarga);

// dd($ramalanPenjualan);
      $bulan_tertentu = $bahan_terpilih->pembelian()->limit(3)->get();
      $y3 = [];
      $x3 = [];
      foreach($bulan_tertentu as $bl){
        $y3[]=$bl ->harga;
        $x3[]=$bl ->bulan;
      }
      $avgtertentu = array_sum($y3) / count($y3);
      $avgHarga = array_sum($y) / count($y);

      $indeks_moment = $avgtertentu / $avgHarga;

      $ramalanHasil = [];
      foreach ($ramalanHarga['trend'] as $harga){
        $ramalanHasil[] =  $indeks_moment * $harga;
      }
      $ramalanSebelumnya =[];
      foreach ($ramalanPenjualan ['trend'] as $sebelumnya) {
        $ramalanSebelumnya[] = $indeks_moment * $sebelumnya;
      }
      // dd($ramalanSebelumnya);
        
      return view('peramalan.hasil', [
        'id' => $id,
        'bahan_terpilih' => $bahan_terpilih,
        'ramalanHasil' => $ramalanHasil,
        'totalBulanPrediksi' => $totalBulanPrediksi,
        'nBulanPrediksi' => $nBulanPrediksi,
        'ramalanSebelumnya' => $ramalanSebelumnya,
        'x' => $x,
        'y' => $y
    ]);
    }   
}
