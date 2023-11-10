@extends('layouts.app')
@section('title','Edit data kriteria bibit padi unggul')
@section('heading','Edit data kriteria')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('kriteria.index') }}'"><i class="fa fa-fw fa-arrow-left"></i></button>
            </div>
            <div class="card-body">
                <form action="{{ route('kriteria.update',$ktr->id) }}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group row mt-3">
                        <label for="namakriteria" class="col-md-2 col-form-label">Nama kriteria</label>
                        <input type="text" name="namakriteria" id="namakriteria" class="col-md form-control" value="{{ $ktr->namakriteria }}">
                    </div>
                    <div class="form-group row mt-3">
                        <label for="sifat" class="col-md-2 col-form-label">Sifat</label>
                        <select name="sifat" id="sifat" class="col-md form-control">
                            <option value="{{ $ktr->sifat }}">{{ $ktr->sifat }}</option>
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                        </select>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="bobot" class="col-md-2 col-form-label">bobot</label>
                        <select name="bobot" id="bobot" class="col-md form-control">
                            <option value="{{ $ktr->bobot }}">{{ $ktr->bobot }}</option>
                            @for ($i = 1; $i < 6; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor 
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary form-control">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection