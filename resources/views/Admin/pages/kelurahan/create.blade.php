@extends('admin.layouts.main')
@section('page-title')
    <h3>Kelurahan</h3>
@endsection
@section('content')
    <!-- session untuk menampilkan error, jika import gagal -->
    @if (session('failures'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
            <ul>
                @foreach (session('failures') as $failure)
                    <li>
                        Baris {{ $failure->row() }}:
                        @foreach ($failure->errors() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.kelurahan.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <h5 class="card-title mb-0">Tambah Kelurahan</h5>

                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#inlineFormPegawai">Import Data</button>

                <a href="{{ route('admin.kelurahan.downloadTemplate') }}" class="btn btn-success">Unduh Template Excel</a>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-left" id="inlineFormPegawai" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Input Import Data</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="{{ route('admin.kelurahan.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="file">File : </label>
                            <div class="form-group">
                                <input id="file" type="file" name="file" class="form-control" required>
                                <p><small class="text-muted">Masukkan file dengan format xls, xlsx.</small></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                <span class="d-none d-sm-block">Import</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.kelurahan.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kelurahan</label>
                                        </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                        <div class="col-md-8 form-group">
                                            <input type="text" value="{{ old('kelurahan') }}" id="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan"
                                                placeholder="Masukkan kelurahan">
                                            @error('kelurahan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kode Pos</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" value="{{ old('kode_pos') }}" id="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                                                placeholder="Masukkan kode pos">
                                            @error('kode_pos')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kecamatan</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                            <select class="choices form-select @error('id_kecamatan') is-invalid @enderror" id="id_kecamatan" name="id_kecamatan">
                                                <option value="">Pilih Kecamatan</option>
                                                @foreach ($kecamatan as $k)
                                                    <option value="{{ $k->id }}">{{ $k->kecamatan }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kecamatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <section id="basic-horizontal-layouts">
            
        </section> --}}
    </div>
@endsection