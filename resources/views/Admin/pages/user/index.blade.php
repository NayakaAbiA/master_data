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
        <div class="card-body">
            @include('pesansuccess')
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>
                            <div class="form-check">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-danger form-check-glow" checked name="customCheck" id="checkboxGlow4">
                                </div>
                            </div>
                            </th>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Pegawai</th>
                            <th class="no-sort">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $key => $item)
                        <tr>
                            <td>
                            <div class="form-check">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-danger form-check-glow" checked name="customCheck" id="checkboxGlow4">
                                </div>
                            </div>
                            </td>

                            <!-- iterasi untuk penomoran data di tabel -->
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item['name']}}</td>
                            <td>{{ $item['email']}}</td>
                            <td>{{ $item['role']['role'] ?? 'Tidak ada Role'}}</td>
                            <td>{{ $item['ptk']['nama'] ?? '-'}}</td>
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
    </div>
@endsection