@extends('admin.layouts.main')
@section('page-title')
    <h3>Nama Agama</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.agama.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Data Nama Agama
                </h5>
                <a class="btn btn-primary" href="{{ route('admin.agama.create')}}"><i class="bi bi-plus"></i>Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Agama</th>
                                <th class="no-sort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($agama as $d)
                            <tr>
                                 <!-- iterasi untuk penomoran data di tabel -->
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $d->nama_agama}}</td>
                                <td>
                                    <div class="buttons">
                                        <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                        <a class="btn icon btn-primary" href="{{ route('admin.agama.edit',  ['agama' => $d->id ] )}}"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('admin.agama.destroy',  ['agama' => $d->id ] )}}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
            
                                            <button class ="btn icon btn-primary" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $d->agama}} ?')"><i class="bi bi-trash3"></i></button>
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
    </section>
@endsection