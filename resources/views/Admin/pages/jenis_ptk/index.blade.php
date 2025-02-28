@extends('layouts.main')
@section('page-title')
    <h3>Jenis PTK</h3>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Jenis PTK
            </h5>
            <a href="{{ route('admin.jenisptk.create')}}">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($jenisptk as $d)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $d->jenis_ptk}}</td>
                        <td>
                            <a href="{{ route('admin.jenisptk.edit',  ['id' => $d->id ] )}}">Edit</a>
                            <a href="">Hapus</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection