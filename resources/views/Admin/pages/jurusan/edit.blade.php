@extends('admin.layouts.main')
@section('page-title')
    <h3>Jurusan</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.jurusan.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Edit Jurusan
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.jurusan.update' , ['jurusan' => $jurusan->id] )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                  <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="jurusan">Jurusan</label>
                                        </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ $jurusan->nama_jur }}" class="form-control" name="nama_jur"
                                                placeholder="Masukkan Nama jurusan">
                                                @error('jurusan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="id_ptk_kakom">Pilih Ketua Program keahlian</label>
                                        </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                        <div class="col-md-8 form-group">
                                          <select name="id_ptk_kakom" class="choices form-select @error('id_ptk_kakom') is-invalid @enderror" id="id_ptk_kakom">
                                            @foreach ($ptk as $pegawai)
                                                <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                                            @endforeach
                                          </select>
                                            @error('id_ptk_kakom')
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