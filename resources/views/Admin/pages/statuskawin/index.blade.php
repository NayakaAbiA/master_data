@extends('admin.layouts.main')
@section('page-title')
    <h3>Status Kawin</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.statkawin.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Status Pegawai
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.statkawin.create')}}"><i class="bi bi-plus"></i>Tambah</a>
        </div>
        <div class="card-body">
            @include('pesansuccess')
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th class="no-sort">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($statkawin as $item)
                        <tr>
                             <!-- iterasi untuk penomoran data di tabel -->
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item['status_kawin']}}</td>
                            <td>
                                <div class="buttons">
                                    <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                    <a class="btn icon btn-primary" href="{{ route('admin.statkawin.edit',  $item['id'] )}}"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('admin.statkawin.destroy',  $item['id'] )}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
        
                                        <button class ="btn icon btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $item['status_kawin']}} ?')"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection