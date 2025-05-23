@extends('admin.layouts.main')
@section('page-title')
    <h3>Kartu Bantuan</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.krtbantuan.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Tambah Kartu Bantuan
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.krtbantuan.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">No Kartu Bantuan</label>
                                        </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="no_krtbantuan" value="{{ old('no_krtbantuan') }}" class="form-control @error('no_krtbantuan') is-invalid @enderror" name="no_krtbantuan"
                                                placeholder="Masukkan No Kartu Bantuan">
                                            @error('no_krtbantuan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Nama Kartu Bantuan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_krtbantuan" value="{{ old('nama_krtbantuan') }}" class="form-control @error('nama_krtbantuan') is-invalid @enderror" name="nama_krtbantuan"
                                                placeholder="Masukkan Nama Kartu Bantuan">
                                            @error('nama_krtbantuan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Pendiri Kartu Bantuan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_pdkrt" value="{{ old('nama_pdkrt') }}" class="form-control @error('nama_pdkrt') is-invalid @enderror" name="nama_pdkrt"
                                                placeholder="Masukkan Nama Pendiri Kartu Bantuan">
                                            @error('nama_pdkrt')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
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