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
    <section>
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
                                                @php
                                                    $dokIdentitas = [
                                                        'No.KK' => ['label' => 'No Kartu Keluarga', 'value' => $s['no_kk'] ?? ''],
                                                        'No.RegAktaLahir' => ['label' => 'No Registrasi Akta Lahir', 'value' => $s['no_reg_aktlhr'] ?? ''],
                                                        'NIPD' => ['label' => 'NIPD', 'value' => $s['nipd'] ?? ''],
                                                    ];
                                                    $dokLainnya = [
                                                        'No SKHUN' => ['label' => 'No SKHUN', 'value' => $s['no_skhun'] ?? ''],
                                                        'No KIP' => ['label' => 'No KIP', 'value' => $s['nokip']['no_krtbantuan'] ?? ''],
                                                        'No KPS' => ['label' => 'No KPS', 'value' => $s['nokps']['no_krtbantuan'] ?? ''],
                                                        'No KKS' => ['label' => 'No KKS', 'value' => $s['nokks']['no_krtbantuan'] ?? ''],
                                                    ];
                                                    $dokumenSiswa = $dokumenList[$s['id']] ?? collect();
                                                @endphp
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
                                                @php
                                                    $dokIdentitas = [
                                                        'No.KK' => ['label' => 'No Kartu Keluarga', 'value' => $s['no_kk'] ?? ''],
                                                        'No.RegAktaLahir' => ['label' => 'No Registrasi Akta Lahir', 'value' => $s['no_reg_aktlhr'] ?? ''],
                                                        'NIPD' => ['label' => 'NIPD', 'value' => $s['nipd'] ?? ''],
                                                    ];
                                                    $dokLainnya = [
                                                        'No SKHUN' => ['label' => 'No SKHUN', 'value' => $s['no_skhun'] ?? ''],
                                                        'No KIP' => ['label' => 'No KIP', 'value' => $s['nokip']['no_krtbantuan'] ?? ''],
                                                        'No KPS' => ['label' => 'No KPS', 'value' => $s['nokps']['no_krtbantuan'] ?? ''],
                                                        'No KKS' => ['label' => 'No KKS', 'value' => $s['nokks']['no_krtbantuan'] ?? ''],
                                                    ];
                                                    $dokumenSiswa = $dokumenList[$s['id']] ?? collect();
                                                @endphp
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
                                        <div class="buttons d-flex gap-1"> 
                                            <div class="me-1 mb-1 d-inline-block">
                                                @php
                                                    $dokIdentitas = [
                                                        'No.KK' => ['label' => 'No Kartu Keluarga', 'value' => $s['no_kk'] ?? ''],
                                                        'No.RegAktaLahir' => ['label' => 'No Registrasi Akta Lahir', 'value' => $s['no_reg_aktlhr'] ?? ''],
                                                        'NIPD' => ['label' => 'NIPD', 'value' => $s['nipd'] ?? ''],
                                                    ];
                                                    $dokLainnya = [
                                                        'No SKHUN' => ['label' => 'No SKHUN', 'value' => $s['no_skhun'] ?? ''],
                                                        'No KIP' => ['label' => 'No KIP', 'value' => $s['nokip']['no_krtbantuan'] ?? ''],
                                                        'No KPS' => ['label' => 'No KPS', 'value' => $s['nokps']['no_krtbantuan'] ?? ''],
                                                        'No KKS' => ['label' => 'No KKS', 'value' => $s['nokks']['no_krtbantuan'] ?? ''],
                                                    ];
                                                    $dokumenSiswa = $dokumenList[$s['id']] ?? collect();
                                                @endphp
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
    </section>
    @if (Auth::user()->role->role !== 'siswa')
        
    @else
    <section id="input-file-browser">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upload File Pendukung</h4>
                        <p><small class="text-muted">Hanya PDF. Maksimal 2MB.</small></p>
                    </div>
                        @php
                            $jenisDokumen = [
                                'No.KK' => 'Kartu Keluarga',
                                'No.RegAktaLahir' => 'Akta Kelahiran',
                                'NIPD' => 'Kartu Siswa',
                                'NIK Wali' => 'KTP Wali',
                                'No SKHUN' => 'SKHUN',
                                'No KIP' => 'Kartu KIP',
                                'No KPS' => 'Kartu KPS',
                                'No KKS' => 'Kartu KKS',
                            ];
                            $dokumenSiswa = $dokumenList[$s['id']] ?? collect();
                        @endphp
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($jenisDokumen as $kode => $label)
                                        @php
                                            $uploaded = $dokumenSiswa->firstWhere('jenis_file', $kode);
                                        @endphp
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                @if ($uploaded)
                                                    <label class="form-label">{{ $label }} | <span class="text-success">Uploaded: {{ $uploaded->nama_asli_file }}</span></label>
                                                @else
                                                    <label class="form-label">{{ $label }}</label>
                                                @endif
                                                @if(auth()->user()->siswa_id == $s->id)
                                                <form action="{{ route('admin.dokumen.upload.siswa') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="jenis_file" value="{{ $kode }}">
                                                    <div class="input-group">
                                                        <input type="file" name="file" class="form-control form-control-sm" required>
                                                        <button class="btn btn-sm btn-outline-success" type="submit">
                                                            <i class="bi bi-upload"></i> Upload
                                                        </button>
                                                    </div>
                                                </form>
                                                @endif
                                                <p><small class="text-muted">Upload bukti pendukung untuk kolom {{ $label }}.</small></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
