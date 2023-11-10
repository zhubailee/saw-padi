@extends('layouts.app')
@section('title','Kelola data subkriteria')
@section('heading','Kelola data subkriteria')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary" onclick="window.location='{{ route('subkriteria.create') }}'"><i class="fa fa-fw fa-plus"></i>Tambah data subkriteria</button>
            </div>
            <div class="card-body">
                @if (count($sub) == 0)
                    <p class="alert alert-danger text-center">Belum ada data</p>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama kriteria</th>
                                <th>Subkriteria</th>
                                <th>Keterangan</th>
                                <th>Poin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1
                            @endphp
                            @foreach ($sub as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->namakriteria }}</td>
                                    <td>{{ $item->subkriteria }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->poin }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('subkriteria.edit',$item->id) }}" class="btn btn-outline-info"><i class="fa fa-fw fa-edit"></i></a>
                                            <form action="{{ route('subkriteria.destroy', $item->id) }}" method="post">
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
                    {{ $sub->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection