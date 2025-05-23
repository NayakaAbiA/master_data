@extends('admin.layouts.main')
@section('page-title')
    <h3>Rombel</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.provinsi.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Edit Rombel
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.rombel.update' ,$rombel['id'] )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="rombel">Nama Rombel</label>
                                        </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                        <div class="col-md-8 form-group">
                                            <input type="text" value="{{ $rombel['nama_rombel'] }}" id="rombel" class="form-control @error('nama_rombel') is-invalid @enderror" name="nama_rombel"
                                                placeholder="Masukkan Nama Rombel">
                                                @error('nama_rombel')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Wali Kelas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="id_ptk_walas" id="ptk_walas" class="form-control">
                                                @foreach ($ptk_walas as $walas)
                                                  <option value="{{ $walas['id'] }}"
                                                    {{ old('id_ptk_walas', $rombel['id_ptk_walas']) == $walas['id'] ? 'selected' : '' }}>
                                                    {{ $walas['nama'] }}
                                                  </option>
                                                @endforeach
                                              </select>                                              
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