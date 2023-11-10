@extends('layouts.app')
@section('title','Kelola data alternatif')
@section('heading','Kelola data alternatif')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-outline-primary"
                onclick="window.location='{{ route('alternatif.create') }}'"><i class="fa fa-fw fa-plus"></i>Tambah data
                alternatif</button>
        </div>
        <div class="card-body">
        @if(count($alt) != 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama bibit</th>
                            <th>Detail</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1
                        @endphp
                        @foreach ($alt as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->namabibit }}</td>
                            <td>{{ $item->detail }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('alternatif.edit',$item->id) }}" class="btn btn-outline-info"><i class="fa fa-fw fa-edit"></i></a>
                                    <form action="{{ route('alternatif.destroy',$item->id) }}" method="post">
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
                {{ $alt->links() }}
            </div>
        @else
            <p class="alert alert-danger text-center">Bekum ada data</p>
        @endif
        </div>
    </div>
</div>
@endsection