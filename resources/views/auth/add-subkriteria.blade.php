@extends('layouts.app')
@section('title','Tambah data subkriteria')
@section('heading','Tambah data subkriteria')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('subkriteria.index') }}'"><i class="fa fa-fw fa-arrow-left"></i></button>
            </div>
            <div class="card-body">
                <form action="{{ route('subkriteria.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group row mt-3">
                        <label for="idkriteria" class="col-md-2 col-form-label">Nama kriteria</label>
                        <select name="idkriteria" id="idkriteria" class="col-md form-control">
                            <option value="">--Pilih--</option>
                            @foreach ($kriteria as $item)
                                <option value="{{ $item->id }}">{{ $item->namakriteria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="subkriteria" class="col-md-2 col-form-label">Subkriteria</label>
                        <input type="text" name="subkriteria" id="subkriteria" class="col-md form-control">
                    </div>
                    <div class="form-group row mt-3">
                        <label for="keterangan" class="col-md-2 col-form-label">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="col-md form-control">
                    </div>
                    <div class="form-group row mt-3">
                        <label for="poin" class="col-md-2 col-form-label">Poin</label>
                        <select name="poin" id="poin" class="col-md form-control">
                            <option value="">--Pilih--</option>
                            @for ($i = 1; $i < 6; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary form-control">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection