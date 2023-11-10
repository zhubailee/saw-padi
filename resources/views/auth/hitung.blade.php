@extends('layouts.app')
@section('title','Input nilai matriks tiap alternatif')
@section('heading','Input nilai matriks')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('hitung.process') }}" method="post">
                @csrf
                @method('post')
                <div class="form-group row mt-3">
                    <label for="idalternatif" class="col-md-4 col-form-label">Nama bibit</label>
                    <select name="idalternatif" id="idalternatif" class="form-control col-md">
                        <option value="">--Pilih--</option>
                        @foreach ($alternatif as $item)
                        <option value="{{ $item->id }}">{{ $item->namabibit }}</option>
                        @endforeach
                    </select>
                    @error('idalternatif')
                    <div class="is-invalid">{{ $message }}</div>
                    @enderror
                </div>
                @foreach ($kriteria as $key => $value)
                @php
                    $key += 1
                @endphp
                <div class="form-group row mt-3">
                    <label for="kriteria{{ $key }}" class="col-md-4 col-form-label">{{ $value->namakriteria }}</label>
                    <select name="kriteria{{ $key }}" id="{{ $key }}" class="col-md form-control">
                        <option value="">--Pilih--</option>
                        @foreach ($subkriteria[$value->id] as $k => $v)
                            <option value="{{ $v->poin }}">{{ $v->subkriteria }}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach
                <button type="submit" class="btn btn-outline-primary form-control">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection