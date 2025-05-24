@extends('admin.layouts.main')

@section('page-title')
    <h3>Pegawai</h3>
@endsection

@section('content')
    <div class="card-body">
        <nav aria-label="breadcrumb" class="d-flex justify-content-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.pegawai.index') }}">Index</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Pegawai</h5>
           
            @if(Auth::user()->role->role !== 'pegawai')
            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary" href="{{ route('admin.pegawai.create') }}">
                    <i class="bi bi-plus"></i> Tambah
                </a>
                <a class="btn btn-success" href="{{ url('/export-pegawai') }}">
                    Export data ke Excel
                </a>
            </div>

            {{-- Filter Form --}}
            <div class="mt-3">
                <form method="GET" action="{{ route('admin.pegawai.index') }}" class="row g-2">
                    <div class="col-md-3">
                        <select name="jenis_kelamin" class="form-select">
                            <option value="">-- Filter Jenis Kelamin --</option>
                            <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>

                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="stat_peg" class="form-select">
                            <option value="">-- Filter Status Pegawai --</option>
                            @foreach ($statpeg as $status)
                            <option value="{{ $status['stat_peg'] }}" {{ request('stat_peg') == $status['stat_peg'] ? 'selected' : '' }}>
                                {{ $status['stat_peg'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button class="btn btn-primary" type="submit">Filter</button>
                        <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </form>
            </div>
        </div>
            @else
                
            @endif
            

        <div class="card-body">
            @include('pesansuccess')

            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Kepegawaian</th>
                        <th  class="no-sort">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p['NIP'] }}</td>
                            <td>{{ $p['nama'] }}</td>
                            <td>{{ $p['jenis_kelamin'] ?? '-' }}</td>
                            <td>{{ $p['statpegawai']['stat_peg'] ?? '-' }}</td>
                            <td>
                                <div class="buttons d-flex gap-1">
                                    {{-- Lihat Detail --}}
                                    @if(Auth::user()->role->role !== 'pegawai')
                                    <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalPegawai{{ $p['id'] }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                    @include('admin.pages.pegawai.show-detil')
                                    @else
                                    <button type="button" class="btn icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalPegawai{{ $p['id'] }}">
                                        Lihat detail data
                                    </button>
                                    @include('admin.pages.pegawai.show-detil')
                                    @endif


                                    {{-- Edit --}}
                                    @if(Auth::user()->role->role !== 'pegawai')
                                    <a class="btn icon btn-primary" href="{{ route('admin.pegawai.edit', $p['id']) }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('admin.pegawai.destroy', $p['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn icon btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $p['nama'] }} ?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                    @else
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
