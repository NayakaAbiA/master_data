@extends('admin.layouts.main')
@section('page-title')
    <h3>Kabupaten</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.kabupaten.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Kabupaten
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.kabupaten.create')}}"><i class="bi bi-plus"></i>Tambah</a>
        </div>
        <div class="card-body">
            @include('pesansuccess')
            <div  class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kabupaten</th>
                            <th>Ibu Kota</th>
                            <th>BSNI</th>
                            <th>Provinsi</th>
                            <th  class="no-sort">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($kabupaten as $key => $d)
                        <tr>
                             <!-- iterasi untuk penomoran data di tabel -->
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $d['kabupaten']}}</td>
                            <td>{{ $d['ibu_kota']}}</td>
                            <td>{{ $d['k_bsni']}}</td>
                            <td>{{ $d['provinsi']['provinsi'] ?? 'Tidak ada Provinsi'}}</td>
                            <td>
                                <div class="buttons d-flex gap-1">
                                    <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                    <a class="btn icon btn-primary" href="{{ route('admin.kabupaten.edit',  $d['id'] )}}"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('admin.kabupaten.destroy',  $d['id'] )}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
        
                                        <button class ="btn icon btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $d['kabupaten']}} ?')"><i class="bi bi-trash3"></i></button>
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