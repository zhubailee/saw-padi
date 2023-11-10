<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HasilResource;
use App\Models\Alternatif;
use App\Models\Hitung;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilController extends Controller
{
    public function index(Hitung $hitung){
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $bobot = $kriteria->pluck('bobot','namakriteria');
        $sifat = $kriteria->pluck('sifat','namakriteria');
        
        // matriks evaluasi
        foreach ($alternatif as $key => $value) {
            foreach ($kriteria as $k => $v) {
                $evaluasi[$value->namabibit][$v->namakriteria] = $hitung::where('idalternatif',$value->id)->where('idkriteria',$v->id)->pluck('nilai');
                $maks[$v->namakriteria] = $hitung->select(DB::raw('max(nilai) as maks','sifat'))->where('idkriteria',$v->id)->where('sifat','benefit')->join('kriterias','idkriteria','=','kriterias.id')->pluck('maks');
                $mins[$v->namakriteria] = $hitung->select(DB::raw('min(nilai) as mins','sifat'))->where('idkriteria',$v->id)->where('sifat','cost')->join('kriterias','idkriteria','=','kriterias.id')->pluck('mins');
                
            }
        }
// dd($mins);
        // matriks normalisasi
        foreach ($evaluasi as $key => $value) {
            foreach ($evaluasi[$key] as $k => $v) {
                foreach ($evaluasi[$key][$k] as $item) {
                    $normalisasi[$key][$k] = $sifat[$k]=='benefit'?round($item/($maks[$k][0]),4):round($mins[$k][0]/$item,3);
                }
            }
        }

        // matriks terbobot
        foreach ($normalisasi as $key => $value) {
            foreach ($normalisasi[$key] as $k => $v) {
                $terbobot[$key][$k] = round($v*($bobot[$k]),3);
            }
            $hasil[$key] = round(array_sum($terbobot[$key]),3);
        }
        arsort($hasil);
        // return new HasilResource(true,['Matriks evaluasi','matriks normalisasi','Hasil perhitungan metode saw'],[$evaluasi,$normalisasi,$hasil]);
        $response = [
            'Matriks evaluasi'  =>  $evaluasi,
            'Matriks normalisasi'  =>  $normalisasi,
            'Matriks hasil'  =>  $hasil,
        ];
        return response()->json($response);
    }
}
