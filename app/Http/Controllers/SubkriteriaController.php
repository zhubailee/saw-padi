<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\subkriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(subkriteria $subkriteria)
    {
        $sub = $subkriteria->select('subkriterias.*','kriterias.namakriteria','kriterias.id as idkriteria')->join('kriterias','idkriteria','=','kriterias.id')->orderBy('kriterias.id')->paginate(5);
        return view('auth.subkriteria',compact('sub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        return view('auth.add-subkriteria',compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,subkriteria $subkriteria)
    {
        $request->validate([
            'idkriteria'    =>  'required',
            'subkriteria'   =>  'required',
            'keterangan'    =>  'required',
            'poin'          =>  'required'
        ]);
        $tambah = $subkriteria->factory()->create([
            'idkriteria'    =>  $request->idkriteria,
            'subkriteria'   =>  $request->subkriteria,
            'keterangan'    =>  $request->keterangan,
            'poin'          =>  $request->poin
        ]);
        if($tambah){
            return redirect(route('subkriteria.index'))->with('success','Data telah ditambahkan');
        }
        return back()->withErrors('Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(subkriteria $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(subkriteria $subkriteria,$id)
    {
        $sub = $subkriteria->findOrFail($id);
        $nama = Kriteria::where('id', $sub->idkriteria)->get();
        foreach ($nama as $nm) {
            $nama = $nm;
        }
        // dd($sub);
        $kriteria = Kriteria::all();
        return view('auth.edit-subkriteria',compact('sub','kriteria','nama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subkriteria $subkriteria,$id)
    {
        $sub = $subkriteria->findOrFail($id);
        $request->validate([
            'idkriteria'    =>  'required',
            'subkriteria'   =>  'required',
            'keterangan'    =>  'required',
            'poin'          =>  'required'
        ]);
        $edit = $sub->update([
            'idkriteria'    =>  $request->idkriteria,
            'subkriteria'   =>  $request->subkriteria,
            'keterangan'    =>  $request->keterangan,
            'poin'          =>  $request->poin
        ]);
        if($edit){
            return redirect(route('subkriteria.index'))->with('success','Data berhasil diperbarui');
        }
        return back()->withErrors('Data gagal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(subkriteria $subkriteria,$id)
    {
        $sub = $subkriteria->findOrFail($id);
        $sub->delete();
        return redirect(route('subkriteria.index'))->with('success','Data telah dihapus');
    }
}
