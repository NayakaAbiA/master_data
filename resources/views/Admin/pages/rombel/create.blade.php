@extends('admin.layouts.main')
@section('page-title')
    <h3>Rombel</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.rombel.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Tambah Rombel
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.rombel.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="rombel">Nama Rombel</label>
                                        </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                        <div class="col-md-8 form-group">
                                            <input required type="text" id="rombel" class="form-control" name="nama_rombel"
                                                placeholder="Masukkan Nama Rombel">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Wali Kelas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                          <select name="id_ptk_walas" id="ptk_walas" class="form-control">
                                            @foreach ($ptk_walas as $walas)
                                            <option value="{{ $walas->id }}">{{ $walas->nama }}</option>
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