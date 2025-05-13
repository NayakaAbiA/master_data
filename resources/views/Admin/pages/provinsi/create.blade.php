@extends('admin.layouts.main')
@section('page-title')
    <h3>Provinsi</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.provinsi.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Tambah Provinsi
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.provinsi.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Provinsi</label>
                                        </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                        <div class="col-md-8 form-group">
                                            <input type="text" required id="provinsi" name="provinsi"
                                                class="form-control @error('provinsi') is-invalid @enderror" placeholder="Masukkan Provinsi">
                                            @error('provinsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Ibu Kota</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" required id="ibu_kota" name="ibu_kota"
                                                class="form-control @error('ibu_kota') is-invalid @enderror"  placeholder="Masukkan Ibu Kota">
                                            @error('ibu_kota')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">BSNI</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" required id="p_bsni" name="p_bsni"
                                                class="form-control @error('p_bsni') is-invalid @enderror" placeholder="Masukkan BSNI">
                                            @error('p_bsni')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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