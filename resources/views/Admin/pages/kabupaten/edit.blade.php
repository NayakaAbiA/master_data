@extends('admin.layouts.main')
@section('page-title')
    <h3>Kabupaten</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.kabupaten.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Edit Kabupaten
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.kabupaten.update' , $kabupaten['id'] )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kabupaten</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" value="{{ old('kabupaten') ?? $kabupaten['kabupaten'] }}">
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
                                            <input type="text" id="ibu_kota" class="form-control @error('ibu_kota') is-invalid @enderror" name="ibu_kota" value="{{ old('kabupaten') ?? $kabupaten['ibu_kota']}}">
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
                                            <input type="text" id="k_bsni" class="form-control @error('k_bsni') is-invalid @enderror" name="k_bsni" value="{{ old('kabupaten') ?? $kabupaten['k_bsni']}}">
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
                                                <select name="id_provinsi" class="choices form-select @error('id_provinsi') is-invalid @enderror" id="provinsi">
                                                    @foreach ($provinsi as $p)
                                                        <option value="{{ $p->id }}" 
                                                            {{ (old('id_provinsi', $kabupaten['id_provinsi']) == $p->id) ? 'selected' : '' }}>
                                                            {{ $p->provinsi }}
                                                        </option>
                                                    @endforeach
                                                </select>                                                
                                            </div>
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