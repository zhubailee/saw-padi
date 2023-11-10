@extends('layouts.app')
@section('title','Tabel matriks perhitungan metode saw')
@section('heading','Matriks perhitungan')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title">Matriks evaluasi</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="align-middle" rowspan="2">#</th>
                            <th class="align-middle" rowspan="2">Nama bibit</th>
                            <th colspan="{{ count($kriteria) }}">Kriteria</th>
                        </tr>
                        <tr>
                            @foreach ($kriteria as $item)
                            <th>{{ $item->namakriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1
                        @endphp
                        @foreach ($evaluasi as $key => $value)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $key }}</td>
                            @foreach ($evaluasi[$key] as $k => $v)
                            @foreach ($evaluasi[$key][$k] as $item)
                            <td>{{ $item }}</td>
                            @endforeach
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title">Matriks normalisasi</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="align-middle" rowspan="2">#</th>
                            <th class="align-middle" rowspan="2">Nama bibit</th>
                            <th colspan="{{ count($kriteria) }}">Kriteria</th>
                        </tr>
                        <tr>
                            @foreach ($kriteria as $item)
                            <th>{{ $item->namakriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1
                        @endphp
                        @foreach ($normalisasi as $key => $value)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $key }}</td>
                            @foreach ($normalisasi[$key] as $k => $v)
                            <td>{{ $v }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title">Hasil akhir</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Nama bibit</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1
                        @endphp
                        @foreach ($hasil as $key => $value)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection