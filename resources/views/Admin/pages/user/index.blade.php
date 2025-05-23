@extends('admin.layouts.main')
@section('page-title')
    <h3>User</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index')}}">Index</a></li>
        </ol>
    </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Data User
            </h5>
            <a class="btn btn-primary" href="{{ route('admin.user.create')}}"><i class="bi bi-plus"></i>Tambah</a>
        </div>
        <!-- <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="card-title mb-0">Data User</h5>
                <a class="btn btn-primary mt-2" href="{{ route('admin.user.create') }}">
                    <i class="bi bi-plus"></i> Tambah
                </a>
            </div>
            <input type="search" id="customSearch" class="form-control form-control-sm w-auto" placeholder="Search...">
        </div> -->
        <div class="card-body">
            @include('pesansuccess')
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $key => $item)
                    <tr>
                         <!-- iterasi untuk penomoran data di tabel -->
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item['name']}}</td>
                        <td>{{ $item['email']}}</td>
                        <td>{{ $item['role']['role'] ?? 'Tidak ada Role'}}</td>
                        <td>
                            <div class="buttons">
                                <!-- parameter diambil berdasarkan route yang ada di web.php -->
                                <a class="btn icon btn-primary" href="{{ route('admin.user.edit',  $item['id'] )}}"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('admin.user.destroy',  $item['id'] )}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class ="btn icon btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $item['name']}} ?')"><i class="bi bi-trash3"></i></button>
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