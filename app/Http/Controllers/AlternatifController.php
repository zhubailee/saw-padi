<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Alternatif $alternatif)
    {
        $alt = $alternatif->get_alternatif();
        return view('auth.alternatif', compact('alt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.add-alternatif');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'namabibit' =>  'required',
            'detail'    =>  'required'
        ]);
        $tambah = $alternatif->factory()->create([
            'namabibit' =>  $request->namabibit,
            'detail'    =>  $request->detail
        ]);
        if($tambah){
            return redirect(route('alternatif.index'))->with('success','Data berhasil ditambahkan');
        }
        return back()->withErrors('Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = new Alternatif();
        $alt = $alternatif->get_id($id);
        return view('auth.edit-alternatif',compact('alt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $alternatif = new Alternatif();
        $alt = $alternatif->get_id($id);
        $request->validate([
            'namabibit' => 'required',
            'detail'    =>  'required'
        ]);
        $edit = $alt->update([
            'namabibit' =>  $request->namabibit,
            'detail'    =>  $request->detail
        ]);
        if($edit){
            return redirect(route('alternatif.index'))->with('success','Data telah diperbarui');
        }
        return back()->withErrors('Data gagal diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternatif = new Alternatif();
        $alt = $alternatif->get_id($id);
        $hapus = $alt->delete();
        return redirect(route('alternatif.index'))->with('success','Data berhasil dihapus');
    }
}
