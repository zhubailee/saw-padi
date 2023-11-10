<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kriteria $kriteria)
    {
        $ktr = $kriteria->latest()->paginate(5);
        return view('auth.kriteria',compact('ktr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.add-kriteria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'namakriteria'  =>  'required',
            'sifat'         =>  'required',
            'bobot'         =>  'required'
        ]);
        $tambah = $kriteria->factory()->create([
            'namakriteria'  =>  $request->namakriteria,
            'sifat'  =>  $request->sifat,
            'bobot'  =>  $request->bobot,
        ]);
        if($tambah){
            return redirect(route('kriteria.index'))->with('success','Data berhasil ditambahkan');
        }
        return back()->withErrors('Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria,$id)
    {
        $ktr = $kriteria->findOrFail($id);
        return view('auth.edit-kriteria', compact('ktr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria,$id)
    {
        $ktr = $kriteria->findOrFail($id);
        $request->validate([
            'namakriteria'  =>  'required',
            'sifat'         =>  'required',
            'bobot'         =>  'required'
        ]);
        $edit = $ktr->update([
            'namakriteria'  =>  $request->namakriteria,
            'sifat'  =>  $request->sifat,
            'bobot'  =>  $request->bobot,
        ]);
        if($edit){
            return redirect(route('kriteria.index'))->with('success','Data telah diperbarui');
        }
        return back()->withErrors('Data gagal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria,$id)
    {
        $ktr = $kriteria->findOrFail($id);
        $ktr->delete();
        return redirect(route('kriteria.index'))->with('success','Data telah dihapus');
    }
}
