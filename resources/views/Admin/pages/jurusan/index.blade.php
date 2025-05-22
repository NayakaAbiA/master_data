@extends('admin.layouts.main')
@section('page-title')
    <h3>Jurusan</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.jenistggl.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Jurusan
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.jurusan.create')}}"><i class="bi bi-plus"></i>Tambah</a>
        </div>
        @include('Admin.pesan')  {{-- untuk menampilkan benar atau salah --}}
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jurusan</th>
                        <th>Ketua Program Keahlian</th>
                        <th  class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($jurusan as $item)
                    <tr>
                         <!-- iterasi untuk penomoran data di tabel -->
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama_jur'] }}</td>
                        <td>{{ $item['pegawai']['nama'] ?? '-' }}</td>
                        <td>
                            <div class="buttons">
                                <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                <a class="btn icon btn-primary" href="{{ route('admin.jurusan.edit',$item['id']) }}"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.jurusan.destroy', $item['id']) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
    
                                    <button class ="btn icon btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $item['nama_jur'] }} ? pada siswa akan hilang!')"><i class="bi bi-trash3"></i></button>
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