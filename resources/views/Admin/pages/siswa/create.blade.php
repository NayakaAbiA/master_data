@extends('admin.layouts.main')
@section('page-title')
    <h3>Siswa</h3>
@endsection
@section('content')
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
            <li class="breadcrumb-item"><a href="{{ route('admin.siswa.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <h5 class="card-title mb-0">Tambah Siswa</h5>

                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#inlineFormPegawai">Import Data</button>

                <a href="{{ route('admin.siswa.downloadTemplate') }}" class="btn btn-success">Unduh Template Excel</a>
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
                    <form action="{{ route('admin.siswa.import') }}" method="POST" enctype="multipart/form-data">
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
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.siswa.store')}}" method="POST" enctype="multipart/form-data">
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
                                        <a class="nav-link" id="ortuwali-tab" data-bs-toggle="tab" href="#ortuwali" role="tab"
                                            aria-controls="ortuwali" aria-selected="false">Orang Tua/Wali</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="lainnya-tab" data-bs-toggle="tab" href="#lainnya" role="tab"
                                            aria-controls="lainnya" aria-selected="false">Lainnya</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="identitas" role="tabpanel" aria-labelledby="identitas-tab">
                                       @include('admin.pages.siswa.tab-identitas')
                                    </div>
                                    <div class="tab-pane fade" id="domisili" role="tabpanel" aria-labelledby="domisili-tab">
                                        @include('admin.pages.siswa.tab-domisili')
                                    </div>
                                    <div class="tab-pane fade" id="ortuwali" role="tabpanel" aria-labelledby="ortuwali-tab">
                                        @include('admin.pages.siswa.tab-ortuwali')
                                    </div>
                                    <div class="tab-pane fade" id="lainnya" role="tabpanel" aria-labelledby="lainnya-tab">
                                        @include('admin.pages.siswa.tab-lainnya')
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