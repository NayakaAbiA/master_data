@extends('admin.layouts.main')
@section('page-title')
    <h3>Role</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.role.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data Role
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.role.create')}}"><i class="bi bi-plus"></i>Tambah</a>
        </div>
        @include('Admin.pesan') {{-- untuk menampilkan pesan benar atau salah --}}
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Role</th>
                        <th class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($role as $item)
                    <tr>
                         <!-- iterasi untuk penomoran data di tabel -->
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->role}}</td>
                        <td>
                            <div class="buttons">
                                <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                <a class="btn icon btn-primary" href="{{ route('admin.role.edit',  ['role' => $item->id ] )}}"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.role.destroy',  ['role' => $item->id ] )}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
    
                                    <button class ="btn icon btn-primary" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $item->role}} ?')"><i class="bi bi-trash3"></i></button>
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