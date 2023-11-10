<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Hitung;
use App\Models\Kriteria;
use App\Models\subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HitungController extends Controller
{
    public function hitung(){
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        foreach ($kriteria as $key => $value) {
            $subkriteria[$value->id] = subkriteria::where('idkriteria',$value->id)->get();
        }
        return view('auth.hitung',compact('kriteria','alternatif','subkriteria'));
    }

    public function hitungProcess(Request $request, Hitung $hitung){
        $jmlk = Kriteria::count();
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $i = 1;
        $cek = Alternatif::find($request->input('idalternatif'));
        if($cek != null){
            DB ::table('hitungs')->where('idalternatif', $request->idalternatif)->delete();
        }
        // dd($cek != null);
        $j = 1;
        foreach ($kriteria as $kri) {
            $request->validate([
                'idalternatif'  =>  'required',
                'idkriteria'.$j =>  'required'
            ]);
            $tambah = $hitung->factory()->create([
                'idalternatif'  =>  $request->idalternatif,
                'idkriteria'    =>  $kri->id,
                'nilai'         =>  request('kriteria'.$i)
            ]);
            $i++;
        }
        if($tambah){
            return redirect(route('hasil'))->with('success','Nilai berhasil diinput');
        }
        return back()->withErrors('Data gegal diinput');
    }

    public function hasil(Hitung $hitung){
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
                    $normalisasi[$key][$k] = $sifat[$k]=='benefit'?$item/($maks[$k][0]):($mins[$k][0]/$item);
                }
            }
        }

        // matriks terbobot
        foreach ($normalisasi as $key => $value) {
            foreach ($normalisasi[$key] as $k => $v) {
                $terbobot[$key][$k] = $v*($bobot[$k]);
            }
            $hasil[$key] = array_sum($terbobot[$key]);
        }
        arsort($hasil);
        // dd(array_sum($terbobot['Sibereh']));
        return view('auth.hasil',compact('kriteria','alternatif','evaluasi','normalisasi','hasil'));
    }
}
