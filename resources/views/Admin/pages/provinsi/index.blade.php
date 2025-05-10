@extends('admin.layouts.main')
@section('page-title')
    <h3>Provinsi</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.provinsi.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Provinsi
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.provinsi.create')}}"><i class="bi bi-plus"></i>Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Provinsi</th>
                        <th>Ibu Kota</th>
                        <th>BSNI</th>
                        <th class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($provinsi as $d)
                    <tr>
                         <!-- iterasi untuk penomoran data di tabel -->
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $d->provinsi}}</td>
                        <td>{{ $d->ibu_kota}}</td>
                        <td>{{ $d->p_bsni}}</td>
                        <td>
                            <div class="buttons">
                                <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                <a class="btn icon btn-primary" href="{{ route('admin.provinsi.edit',  ['provinsi' => $d->id ] )}}"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.provinsi.destroy',  ['provinsi' => $d->id ] )}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
    
                                    <button class ="btn icon btn-primary" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $d->statkawins}} ?')"><i class="bi bi-trash3"></i></button>
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