@extends('admin.layouts.main')
@section('page-title')
    <h3>Nama Sekolah</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.sekolah.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Edit Nama Sekolah
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.sekolah.update' ,$sekolah['id'] )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">NPSN</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="npsn" class="form-control @error('npsn') is-invalid @enderror" name="npsn" value="{{ $sekolah['npsn']}}">
                                            @error('npsn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Nama Sekolah</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror" name="nama_sekolah" value="{{ $sekolah['nama_sekolah']}}">
                                            @error('nama_sekolah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Jenjang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="jenjang" class="form-control @error('jenjang') is-invalid @enderror" name="jenjang" value="{{ $sekolah['jenjang']}}">
                                            @error('jenjang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Edit</button>
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