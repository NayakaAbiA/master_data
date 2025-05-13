@extends('admin.layouts.main')
@section('page-title')
    <h3>Kabupaten</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.kabupaten.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Tambah Kabupaten
            </h5>
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
                                            <input type="text" id="kabupaten" required class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten"
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
                                            <input type="text" required id="ibu_kota" class="form-control @error('ibu_kota') is-invalid @enderror" name="ibu_kota"
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
                                            <input type="text" required id="k_bsni" class="form-control @error('k_bsni') is-invalid @enderror" name="k_bsni"
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