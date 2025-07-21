@extends('admin.layouts.main')
@section('page-title')
    <h3>Siswa</h3>
@endsection
@section('content')
    <div class="card-body">
        @if (Auth::user()->role->role !== 'siswa')
            <form action="{{ route('admin.siswa.naikKelas') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin memproses kenaikan kelas seluruh siswa?');">
                @csrf
                @if (Auth::user()->role->role !== 'pegawai')
                    <button type="submit" class="btn btn-primary">
                        Proses Kenaikan Kelas
                    </button>
                @endif
            </form>
        @endif

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

            @if (Auth::user()->role->role !== 'siswa' && Auth::user()->role->role !== 'pegawai')
                <a class="btn btn-primary" href="{{ route('admin.siswa.create')}}"><i class="bi bi-plus"></i>Tambah</a>
                <a class="btn btn-success" href="{{ url('/export-siswa') }}">Export data ke Excel</a>
                <div class="mt-3">
                    <form method="GET" action="{{ route('admin.siswa.index') }}" class="row g-2">
                        <div class="col-md-3">
                            <select name="nama_rombel" class="form-select">
                                <option value="">-- Filter rombel --</option>
                                @foreach ($rombel as $q)
                                    <option value="{{ $q['nama_rombel'] }}" {{ request('nama_rombel') == $q['nama_rombel'] ? 'selected' : '' }}>
                                        {{ $q['nama_rombel'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="nama_jur" class="form-select">
                                <option value="">-- Filter jurusan --</option>
                                @foreach ($jurusan as $p)
                                    <option value="{{ $p['nama_jur'] }}" {{ request('nama_jur') == $p['nama_jur'] ? 'selected' : '' }}>
                                        {{ $p['nama_jur'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 d-flex gap-2">
                            <button class="btn btn-primary" type="submit">Filter</button>
                            <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>
                </div>
            @endif
        </div>

        <div class="card-body">
            @include('pesansuccess')
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Rombel</th>
                            <th>Jurusan</th>
                            <th class="no-sort">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (Auth::user()->role->role === 'siswa')
                        <tr>
                            <td>1</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->nisn }}</td>
                            <td>{{ $s->rombel->nama_rombel ?? '-' }}</td>
                            <td>{{ $s->jurusan->nama_jur ?? '-' }}</td>
                            <td>
                                <div class="buttons">
                                    <div class="me-1 mb-1 d-inline-block">
                                        <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalSiswa{{ $s->id }}">
                                            Lihat Detail Data
                                        </button>
                                        @include('admin.pages.siswa.show-detil')
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @elseif (Auth::user()->role->role === 'pegawai')
                        @foreach ($siswas as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->nisn }}</td>
                                <td>{{ $s->rombel->nama_rombel ?? '-' }}</td>
                                <td>{{ $s->jurusan->nama_jur ?? '-' }}</td>
                                <td>
                                    <div class="buttons">
                                        <div class="me-1 mb-1 d-inline-block">
                                            <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalSiswa{{ $s->id }}">
                                                Lihat Detail Data
                                            </button>
                                            @include('admin.pages.siswa.show-detil')
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s['nama'] }}</td>
                                <td>{{ $s['nisn'] }}</td>
                                <td>{{ $s['rombel']['nama_rombel'] ?? '-' }}</td>
                                <td>{{ $s['jurusan']['nama_jur'] ?? '-' }}</td>
                                <td>
                                    <div class="buttons">
                                        <div class="me-1 mb-1 d-inline-block">
                                            <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalSiswa{{ $s['id'] }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                            @include('admin.pages.siswa.show-detil')
                                        </div>
                                        <a class="btn icon btn-primary" href="{{ route('admin.siswa.edit', $s['id']) }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.siswa.destroy', $s['id']) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn icon btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $s['nama'] }} ?')">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
