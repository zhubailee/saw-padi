<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlternatifResource;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlternatifController extends Controller
{
    public function index(Alternatif $alternatif){
        $data = $alternatif->all();
        return new AlternatifResource(true,'Data Alternantif bibit padi',$data);
    }

    public function store(Request $request,Alternatif $alternatif){
        $validator = Validator::make($request->all(),[
            'namabibit' =>  'required',
            'detail'    =>  'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $tambah = $alternatif->factory()->create([
            'namabibit' =>  $request->namabibit,
            'detail'    =>  $request->detail
        ]);
        if($tambah){
            return new AlternatifResource(true,'Data berhasil ditambahkan',$tambah);
        }
        return new AlternatifResource(false,'Data gagal ditambahkan',$tambah);
    }

    public function update(Request $request,$id){
        $alternatif = new Alternatif();
        $alt = $alternatif->get_id($id);
        $validator = Validator::make($request->all(),[
            'namabibit' =>  'required',
            'detail'    =>  'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $edit = $alt->update([
            'namabibit' =>  $request->namabibit,
            'detail'    =>  $request->detail
        ]);

        if($edit){
            return new AlternatifResource(true,'Data berhasil diperbarui',$edit);
        }
        return new AlternatifResource(false,'Data gagal diperbarui',$edit);
    }

    public function destroy($id){
        $alternatif = new Alternatif();
        $alt = $alternatif->get_id($id);
        return new AlternatifResource(true,'Data berhasil dihapus',$alt->delete);
    }
}
