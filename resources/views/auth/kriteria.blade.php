@extends('layouts.app')
@section('title','Kelola data kriteria bibit padi unggul')
@section('heading','Kelola data kriteria')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('kriteria.create') }}'"><i class="fa fa-fw fa-plus"></i>Tambah data kriteria</button>
            </div>
            <div class="card-body">
                @if (count($ktr) == 0)
                    <p class="alert alert-danger text-center">Belum ada data</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama kriteria</th>
                                    <th>Sifat</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @foreach ($ktr as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->namakriteria }}</td>
                                        <td>{{ $item->sifat }}</td>
                                        <td>{{ $item->bobot }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('kriteria.edit',$item->id) }}" class="btn btn-outline-info"><i class="fa fa-fw fa-edit"></i></a>
                                                <form action="{{ route('kriteria.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger"><i class="fa fa-fw fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $ktr->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection