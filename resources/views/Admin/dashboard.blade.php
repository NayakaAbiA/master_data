@extends('admin.layouts.main')
@section('content')

<h2>Hallo {{ auth()->user()->name }}!</h2>

<div class="row mb-4">
    <!-- Card 1: Jumlah Guru -->
    @if (auth()->user()->role->role === 'superAdmin')
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Pegawai</h5>
                <p class="fs-3">{{ $jumlahGuru }}</p>
                <a href="{{ route('admin.pegawai.index') }}" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Siswa</h5>
                <p class="fs-3">{{ $jumlahSiswa }}</p>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-sm btn-outline-success">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Rombel</h5>
                <p class="fs-3">{{ $jumlahRombel }}</p>
                <a href="{{ route('admin.rombel.index') }}" class="btn btn-sm btn-outline-warning">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Jurusan</h5>
                <p class="fs-3">{{ $jumlahJurusan }}</p>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-sm btn-outline-danger">Selengkapnya</a>
            </div>
        </div>
    </div>
    @elseif (auth()->user()->role->role === 'adminSiswa')
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Siswa</h5>
                <p class="fs-3">{{ $jumlahSiswa }}</p>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-sm btn-outline-success">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Rombel</h5>
                <p class="fs-3">{{ $jumlahRombel }}</p>
                <a href="{{ route('admin.rombel.index') }}" class="btn btn-sm btn-outline-warning">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Jurusan</h5>
                <p class="fs-3">{{ $jumlahJurusan }}</p>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-sm btn-outline-danger">Selengkapnya</a>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Pegawai</h5>
                <p class="fs-3">{{ $jumlahGuru }}</p>
                <a href="{{ route('admin.pegawai.index') }}" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
