@extends('layouts.app')
@section('title','Tambah data alternatif')
@section('heading','Tambah data alternatif')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('alternatif.index') }}'"><i class="fa fa-fw fa-arrow-left"></i></button>
            </div>
            <div class="card-body">
                <form action="{{ route('alternatif.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group row mt-3">
                        <label for="namabibit" class="col-md-2 col-form-label">Nama bibit</label>
                        <input type="text" name="namabibit" id="namabibit" class="col-md form-control">
                    </div>
                    <div class="form-group row mt-3">
                        <label for="detail" class="col-md-2 col-form-label">Detail</label>
                        <textarea name="detail" id="detail" cols="30" rows="10" class="col-md form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary form-control">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection