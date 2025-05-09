@extends('admin.layouts.main')
@section('page-title')
    <h3>Siswa</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.siswa.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Siswa
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.siswa.create')}}"><i class="bi bi-plus"></i>Tambah</a>
            <a href="{{ url('/export-siswa') }}">exposrt data ke Excel</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Rombel</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($siswa as $s)
                    <tr>
                        <!-- iterasi untuk penomoran data di tabel -->
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $s->nama}}</td>
                        <td>{{ $s->nisn}}</td>
                        <td>{{ $s->rombel->nama_rombel }}</td>
                        <td>{{ $s->jurusan->nama_jur }}</td>
                        <td>
                            <div class="buttons">
                                <div class="me-1 mb-1 d-inline-block">
                                    <!-- Tombol untuk memuat halaman detail data | #modalSiswa{{ $s->id }} ditambahkan agar setiap data menampilkan modal siswanya sendiri  -->
                                    <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalSiswa{{ $s->id }}"><i class="bi bi-eye-fill"></i></button>
                                    
                                    @include('admin.pages.siswa.show-detil')
                                </div>
                                <!-- <a class="btn icon btn-primary" href=""><i class="bi bi-eye-fill"></i></a> -->
                                <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                <a class="btn icon btn-primary" href="{{ route('admin.siswa.edit',  ['siswa' => $s->id ] )}}"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.siswa.destroy',  ['siswa' => $s->id ] )}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
        
                                    <button class ="btn icon btn-primary" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $s->nama}} ?')"><i class="bi bi-trash3"></i></button>
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