@extends('admin.layouts.main')
@section('page-title')
    <h3>Kabupaten</h3>
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
            <li class="breadcrumb-item"><a href="{{ route('admin.kabupaten.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <h5 class="card-title mb-0">Tambah Kabupaten</h5>

                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#inlineFormPegawai">Import Data</button>

                <a href="{{ route('admin.kabupaten.downloadTemplate') }}" class="btn btn-success">Unduh Template Excel</a>
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
                    <form action="{{ route('admin.kabupaten.import') }}" method="POST" enctype="multipart/form-data">
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
                            <form class="form form-horizontal" action="{{ route('admin.kabupaten.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kabupaten</label>
                                        </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                         <div class="col-md-8 form-group">
                                            <input type="text" id="kabupaten" value="{{ old('kabupaten') }}" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten"
                                                placeholder="Masukkan kabupaten">
                                            @error('kabupaten')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Ibu Kota</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" value="{{ old('ibu_kota') }}" id="ibu_kota" class="form-control @error('ibu_kota') is-invalid @enderror" name="ibu_kota"
                                                placeholder="Masukkan Ibu Kota">
                                            @error('ibu_kota')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">BSNI</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" value="{{ old('k_bsni') }}" id="k_bsni" class="form-control @error('k_bsni') is-invalid @enderror" name="k_bsni"
                                                placeholder="Masukkan BSNI">
                                            @error('k_bsni')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Provinsi</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                            <select class="choices form-select @error('id_provinsi') is-invalid @enderror" id="id_provinsi" name="id_provinsi">
                                                <option value="">Pilih Provinsi</option>
                                                @foreach ($provinsi as $p)
                                                    <option value="{{ $p->id }}">{{ $p->provinsi }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_provinsi')
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