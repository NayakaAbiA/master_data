@extends('admin.layouts.main')
@section('page-title')
    <h3>Pegawai</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.pegawai.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Pegawai
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.pegawai.create')}}"><i class="bi bi-plus"></i>Tambah</a>
            <a href="{{ url('/export-pegawai') }}">export data ke Excel</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenis PTK</th>
                        <th  class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pegawai as $p)
                    <tr>
                        <!-- iterasi untuk penomoran data di tabel -->
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $p->NIP}}</td>
                        <td>{{ $p->nama}}</td>
                        <td>{{ $p->jenis_kelamin}}</td>
                        <td>{{ $p->statpegawai->stat_peg}}</td>
                        <td>
                            <div class="buttons">
                                <div class="me-1 mb-1 d-inline-block">
                                    <!-- Tombol untuk memuat halaman detail data | #modalPegawai{{ $p->id }} ditambahkan agar setiap data menampilkan modal pegawainya sendiri  -->
                                    <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalPegawai{{ $p->id }}"><i class="bi bi-eye-fill"></i></button>
                                    
                                    @include('admin.pages.pegawai.show-detil')
                                </div>
                                <!-- <a class="btn icon btn-primary" href=""><i class="bi bi-eye-fill"></i></a> -->
                                <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                <a class="btn icon btn-primary" href="{{ route('admin.pegawai.edit',  ['pegawai' => $p->id ] )}}"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.pegawai.destroy',  ['pegawai' => $p->id ] )}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
        
                                    <button class ="btn icon btn-primary" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $p->nama}} ?')"><i class="bi bi-trash3"></i></button>
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