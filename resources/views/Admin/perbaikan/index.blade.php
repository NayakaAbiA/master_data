@extends('admin.layouts.main')

@section('page-title')
    <h3>Perbaikan</h3>
@endsection

@section('content')
    <div class="card-body">
        <nav aria-label="breadcrumb" class="d-flex justify-content-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.perbaikan.index') }}">Index</a></li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar Pengajuan Perbaikan</h5>
            @if(auth()->user()->role->role === 'pegawai')
                <a href="{{ route('admin.perbaikan.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Pengajuan
                </a>
            @endif
        </div>

        <div class="card-body">
            @include('pesansuccess')

            @php
                $filteredPerbaikan = $perbaikan->filter(function ($item) {
                    $role = auth()->user()->role->role;
                    $jenis = strtolower($item['jenis'] ?? '');
                    return ($jenis === 'pribadi' && in_array($role, ['superAdmin', 'adminPegawai'])) ||
                        ($jenis === 'kelas' && in_array($role, ['superAdmin', 'adminSiswa']));
                });
            @endphp


            @if ($filteredPerbaikan->isEmpty())
                <div class="alert alert-primary text-center">Belum ada pengajuan perbaikan yang dapat ditampilkan.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="no-sort">Nama Pegawai</th>
                                <th>Jenis</th>
                                <th class="no-sort">Deskripsi</th>
                                <th class="no-sort">Lampiran</th>
                                <th>Status</th>
                                @if(in_array(auth()->user()->role->role, ['adminPegawai', 'adminSiswa', 'superAdmin']))
                                    <th class="no-sort">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($perbaikan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['user']['name'] ?? '-' }}</td>
                                    <td>{{ ucfirst($item['jenis']) }}</td>
                                    <td>{{ $item['deskripsi'] }}</td>
                                    <td>
                                        @if ($item['lampiran'])
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalPerbaikan{{ $item['id'] }}" class="btn btn-sm btn-primary">Lihat</button>
                                            <div class="modal fade text-left" id="modalPerbaikan{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modalPerbaikan{{ $item['id'] }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel17">Lampiran Perbaikan</h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('storage/' . $item['lampiran']) }}" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge 
                                            {{ $item['status'] == 'Menunggu' ? 'bg-warning' : 
                                                ($item['status'] == 'Disetujui' ? 'bg-success' : 'bg-danger') }}">
                                            {{ $item['status'] }}
                                        </span>
                                    </td>
                                    @if(in_array(auth()->user()->role->role, ['adminPegawai', 'adminSiswa', 'superAdmin']))
                                        <td>
                                            <a href="{{ route('admin.perbaikan.edit', $item['id']) }}" class="btn btn-sm btn-primary">Validasi</a>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada pengajuan perbaikan yang dapat ditampilkan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
