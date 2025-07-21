@extends('admin.layouts.main')
@section('content')

<h2>Hallo {{ auth()->user()->name }}!</h2>

<div class="row mb-4">
    <!-- Card 1: Jumlah Guru -->
    <div class="col-12 mb-4">
        <hr>
        <h4 class="fw-bold text-uppercase text-primary">Statistik Pegawai</h4>
    </div>
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
                <h5 class="card-title">Laki laki</h5>
                <p class="fs-3">{{ $jumlahLaki_peg }}</p>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-sm btn-outline-danger">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Perempuan</h5>
                <p class="fs-3">{{ $jumlahPerempuan_peg }}</p>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-sm btn-outline-danger">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">PNS</h5>
                <p class="fs-3">{{ $jumlahPNS }}</p>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-sm btn-outline-danger">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">PPPK</h5>
                <p class="fs-3">{{ $jumlahPPPK }}</p>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-sm btn-outline-danger">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Honorer</h5>
                <p class="fs-3">{{ $jumlahHonorer }}</p>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-sm btn-outline-danger">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-12 mb-4">
        <hr>
        <h4 class="fw-bold text-uppercase text-primary">Statistik Siswa</h4>
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
                <h5 class="card-title">Jumlah Laki-laki</h5>
                <p class="fs-3">{{ $jumlahLaki_sis }}</p>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-sm btn-outline-success">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Perempuan</h5>
                <p class="fs-3">{{ $jumlahPerempuan_sis }}</p>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-sm btn-outline-success">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Kelas 10</h5>
                <p class="fs-3">{{ $jumlahKelasX }}</p>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-sm btn-outline-success">Selengkapnya</a>
            </div>
        </div>
    </div>
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kelas 11</h5>
                    <p class="fs-3">{{ $jumlahKelasXI }}</p>
                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-sm btn-outline-success">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kelas 12</h5>
                    <p class="fs-3">{{ $jumlahKelasXII }}</p>
                    <a href="{{ route('admin.siswa.index') }}" class="btn btn-sm btn-outline-success">Selengkapnya</a>
                </div>
            </div>
        </div>
        <hr>
        <h4 class="fw-bold text-uppercase text-primary">Statistik Lainnya</h4>
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
    @elseif (auth()->user()->role->role === 'adminPegawai')
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Jumlah Pegawai</h5>
                <p class="fs-3">{{ $jumlahGuru }}</p>
                <a href="{{ route('admin.pegawai.index') }}" class="btn btn-sm btn-outline-primary">Selengkapnya</a>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-3">
        <div class="card shadow">
            {{-- @if ($rombels->where('id_ptk_walas', Auth::user()->id_ptk)->isNotEmpty())
        
        @else
        <a href="{{ url('admin/dashboard') }}" class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="bi bi-pencil-square"></i>
            <span>Pengajuan</span>
        </a>
        @endif --}}
        </div>
    </div>
    @endif
</div>

@endsection
