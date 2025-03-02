@extends('admin.layouts.main')
@section('page-title')
    <h3>Kelurahan</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.kelurahan.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Edit Kelurahan
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.kelurahan.update' , ['kelurahan' => $kelurahan->id] )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kelurahan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kelurahan" class="form-control" name="kelurahan" value="{{ old('kelurahan') ?? $kelurahan->kelurahan }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kode Pos</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kode_pos" class="form-control" name="kode_pos" value="{{ old('kode_pos') ?? $kelurahan->kode_pos }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kecamatan</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <select class="choices form-select" id="id_kecamatan" name="id_kecamatan">
                                                    @foreach ($kecamatan as $k)
                                                    <option @selected($k->id == $kelurahan->id_kecamatan) value="{{ $k->id }}">{{ $k->kecamatan }}</option>
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