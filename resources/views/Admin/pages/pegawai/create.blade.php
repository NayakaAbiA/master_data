@extends('admin.layouts.main')
@section('page-title')
    <h3>Pegawai</h3>
@endsection
@section('content')
    <!-- session untuk menampilkan error, jika import gagal -->
    @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(session('failures'))
            <div class="alert alert-warning">
                <p>Beberapa baris gagal diimpor:</p>
                <ul>
                    @foreach (session('failures') as $failure)
                        <li>
                            Baris {{ $failure->row() }} - Kolom: {{ $failure->attribute() }} - 
                            Pesan: {{ implode(', ', $failure->errors()) }}
                        </li>
                    @endforeach
                </ul>
            </div>
    @endif
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.pegawai.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 style="display: inline;" class="card-title align-items-center">
                Tambah Pegawai
            </h5>
            <button type="button" style="margin-left: 10px;" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#inlineFormPegawai"></i>Import Data</button>
            <div class="form-group">
                <!--Modal Input File -->
                <div class="modal fade text-left" id="inlineFormPegawai" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">Input Import Data</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="{{ route('admin.pegawai.import') }}" method="POST" enctype="multipart/form-data">
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
            </div>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.pegawai.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="identitas-tab" data-bs-toggle="tab" href="#identitas" role="tab"
                                            aria-controls="identitas" aria-selected="true">Identitas</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="domisili-tab" data-bs-toggle="tab" href="#domisili" role="tab"
                                            aria-controls="domisili" aria-selected="false">Domisili</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="kepegawaian-tab" data-bs-toggle="tab" href="#kepegawaian" role="tab"
                                            aria-controls="kepegawaian" aria-selected="false">Kepegawaian</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="identitas" role="tabpanel" aria-labelledby="identitas-tab">
                                       @include('admin.pages.pegawai.tab-identitas')
                                    </div>
                                    <div class="tab-pane fade" id="domisili" role="tabpanel" aria-labelledby="domisili-tab">
                                        @include('admin.pages.pegawai.tab-domisili')
                                    </div>
                                    <div class="tab-pane fade" id="kepegawaian" role="tabpanel" aria-labelledby="kepegawaian-tab">
                                        @include('admin.pages.pegawai.tab-kepegawaian')
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