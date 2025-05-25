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

            @if ($perbaikan->isEmpty())
                <div class="alert alert-primary text-center">Belum ada pengajuan perbaikan.</div>
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
                                @if(auth()->user()->role->role === 'adminPegawai' || auth()->user()->role->role === 'adminSiswa' || auth()->user()->role->role === 'superAdmin')
                                    <th class="no-sort">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perbaikan as $item)
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
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <img src="{{ asset('storage/' . $item['lampiran']) }}" alt="">
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
                                    @if(auth()->user()->role->role === 'adminPegawai' || auth()->user()->role->role === 'adminSiswa' || auth()->user()->role->role === 'superAdmin')
                                      <td>
                                          @if(
                                            (auth()->user()->role->role === 'adminPegawai' && $item['jenis'] == 'Pribadi') ||
                                            (auth()->user()->role->role === 'adminSiswa' && $item['jenis'] == 'Kelas') ||
                                            auth()->user()->role->role === 'superAdmin'
                                          )
                                              <a href="{{ route('admin.perbaikan.edit', $item['id']) }}" class="btn btn-sm btn-primary">Validasi</a>
                                          @endif
                                      </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
