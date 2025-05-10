@extends('admin.layouts.main')
@section('page-title')
    <h3>Nama Sekolah</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.sekolah.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Nama Sekolah
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.sekolah.create')}}"><i class="bi bi-plus"></i>Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPSN</th>
                        <th>Nama Sekolah</th>
                        <th>Jenjang</th>
                        <th class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($sekolah as $d)
                    <tr>
                         <!-- iterasi untuk penomoran data di tabel -->
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $d->npsn}}</td>
                        <td>{{ $d->nama_sekolah}}</td>
                        <td>{{ $d->jenjang}}</td>
                        <td>
                            <div class="buttons">
                                <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                <a class="btn icon btn-primary" href="{{ route('admin.sekolah.edit',  ['sekolah' => $d->id ] )}}"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.sekolah.destroy',  ['sekolah' => $d->id ] )}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
    
                                    <button class ="btn icon btn-primary" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $d->sekolah}} ?')"><i class="bi bi-trash3"></i></button>
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