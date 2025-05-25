@extends('admin.layouts.main')
@section('page-title')
    <h3>Perbaikan</h3>
@endsection
@section('content')
<div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.perbaikan.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
</div>
<div class="row mb-4">
    <div class="container mt-5" style="max-width: 600px;">
        <h2 class="mb-4 text-center">Form Perbaikan Data</h2>

        <form action="{{ route('admin.perbaikan.update', $perbaikan['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <select name="jenis" class="form-control @error('jenis') is-invalid @enderror" required>
                    <option value="pribadi" {{ old('jenis', $perbaikan['jenis']) == 'pribadi' ? 'selected' : '' }}>Pribadi</option>
                    <option value="kelas" {{ old('jenis', $perbaikan['jenis']) == 'kelas' ? 'selected' : '' }}>Kelas</option>
                </select>
                @error('jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" required>{{ old('deskripsi', $perbaikan['deskripsi']) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if($perbaikan['lampiran'])
            <div class="mb-3">
                <label class="form-label">Lampiran Saat Ini : </label>

                <button type="button" data-bs-toggle="modal" data-bs-target="#modalPerbaikan{{ $perbaikan['id'] }}" class="btn btn-sm btn-primary">Lihat</button>
                <div class="modal fade text-left" id="modalPerbaikan{{ $perbaikan['id'] }}" tabindex="-1" role="dialog" aria-labelledby="modalPerbaikan{{ $perbaikan['id'] }}" aria-hidden="true">
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
                                <img src="{{ asset('storage/' . $perbaikan['lampiran']) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                    <option value="Menunggu" {{ old('status', $perbaikan['status']) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Disetujui" {{ old('status', $perbaikan['status']) == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Ditolak" {{ old('status', $perbaikan['status']) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lampiran" class="form-label">Ganti Lampiran (opsional)</label>
                <input type="file" name="lampiran" class="form-control @error('lampiran') is-invalid @enderror" id="lampiran">
                @error('lampiran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </form>

    </div>
</div>

@endsection
