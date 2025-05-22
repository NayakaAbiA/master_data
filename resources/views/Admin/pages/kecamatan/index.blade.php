@extends('admin.layouts.main')
@section('page-title')
    <h3>Kecamatan</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.kecamatan.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Kecamatan
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.kecamatan.create')}}"><i class="bi bi-plus"></i>Tambah</a>
        </div>
        <div class="card-body">
            @include('pesansuccess')
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kecamatan</th>
                        <th>Kabupaten</th>
                        <th  class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($kecamatan as $key => $d)
                    <tr>
                         <!-- iterasi untuk penomoran data di tabel -->
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $d['kecamatan']}}</td>
                        <td>{{ $d['kabupaten']['kabupaten'] ?? 'Tidak ada Kabupaten'}}</td>
                        <td>
                            <div class="buttons">
                                <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                <a class="btn icon btn-primary" href="{{ route('admin.kecamatan.edit', $d['id'] )}}"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.kecamatan.destroy',  $d['id'] )}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
    
                                    <button class ="btn icon btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $d['kecamatan']}} ?')"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection