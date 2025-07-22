@extends('admin.layouts.main')

@section('page-title')
    <h3>Pegawai</h3>
@endsection

@section('content')
    <section>
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
                                <option value="{{ $status['id'] }}" {{ request('stat_peg') == $status['stat_peg'] ? 'selected' : '' }}>
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
                <div class="table-responsive">
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
                                            @php
                                                $dokIdentitas = [
                                                    'NIP' => ['label' => 'NIP', 'value' => $p['NIP'] ?? ''],
                                                    'NIK' => ['label' => 'NIK', 'value' => $p['NIK'] ?? ''],
                                                    'NUPTK' => ['label' => 'NUPTK', 'value' => $p['NUPTK'] ?? ''],
                                                    'No.KK' => ['label' => 'No Kartu Keluarga', 'value' => $p['no_kk'] ?? ''],
                                                    'NPWP' => ['label' => 'NPWP', 'value' => $p['no_npwp'] ?? ''],
                                                ];
                                                $dokKepegawaian = [
                                                    'StatKep' => ['label' => 'Status Kepegawaian', 'value' => $p['status_pegawai'] ?? ''],
                                                    'Pangkat' => ['label' => 'Pangkat', 'value' => $p['pangkat']['nama_pangkat'] ?? ''],
                                                    'SK CPNS' => ['label' => 'SK CPNS', 'value' => $p['sk_cpns'] ?? ''],
                                                    
                                                ];
                                                $dokumenPegawai = $dokumenList[$p->id] ?? collect();
                                            @endphp
                                            
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
        </div>
    </section>
    @if (Auth::user()->role->role !== 'pegawai')
        
    @else
    <section id="input-file-browser">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Upload File Pendukung</h4>
                        <p><small class="text-muted">Hanya PDF. Maksimal 2MB.</small></p>
                    </div>
                    @foreach ($pegawai as $p)
                        @php
                            $jenisDokumen = [
                                'NIP' => 'NIP',
                                'Kartu Tanda Penduduk' => 'NIK',
                                'NUPTK' => 'NUPTK',
                                'No.KK' => 'Kartu Keluarga',
                                'NPWP' => 'NPWP',
                                'StatKep' => 'Bukti Status Kepegawaian',
                                'Pangkat' => 'Bukti Pangkat',
                                'SK CPNS' => 'Bukti SK CPNS',
                            ];
                            $dokumenPegawai = $dokumenList[$p->id] ?? collect();
                        @endphp
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($jenisDokumen as $kode => $label)
                                        @php
                                            $uploaded = $dokumenPegawai->firstWhere('jenis_file', $kode);
                                        @endphp
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                @if ($uploaded)
                                                    <label class="form-label">{{ $label }} | <span class="text-success">Uploaded: {{ $uploaded->nama_asli_file }}</span></label>
                                                @else
                                                    <label class="form-label">{{ $label }}</label>
                                                @endif
                                                @if (auth()->user()->ptk_id == $p->id)
                                                <form action="{{ route('admin.dokumen.upload.pegawai') }}" method="post" enctype="multipart/form-data">
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
