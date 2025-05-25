@extends('admin.layouts.main')
@section('page-title')
    <h3>Perbaikan</h3>
@endsection

@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.perbaikan.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    <div class="row mb-4">
    <div class="container mt-5" style="max-width: 600px;">
        <h2 class="mb-4 text-center">Form Perbaikan Data</h2>

        <form action="{{ route('admin.perbaikan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Perbaikan</label>
                <select name="jenis" class="form-control @error('jenis') is-invalid @enderror" id="jenis">
                    <option value="">-- Pilih Jenis --</option>
                    <option value="Pribadi" {{ old('jenis') == 'Pribadi' ? 'selected' : '' }}>Data Pribadi</option>
                    <option value="Kelas" {{ old('jenis') == 'Kelas' ? 'selected' : '' }}>Data Kelas</option>
                </select>
                @error('jenis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lampiran" class="form-label">Pilih Lampiran</label>
                <input class="form-control @error('lampiran') is-invalid @enderror" type="file" id="lampiran" name="lampiran" />
                @error('lampiran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" placeholder="Tulis deskripsi di sini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success w-100">Kirim Perbaikan</button>
        </form>
    </div>
    </div>

@endsection
