@extends('admin.layouts.main')
@section('page-title')
    <h3>Kecamatan</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.kecamatan.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Edit Kecamatan
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.kecamatan.update' , ['kecamatan' => $kecamatan->id] )}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kecamatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kecamatan" class="form-control" name="kecamatan" value="{{ old('kecamatan') ?? $kecamatan->kecamatan }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Kabupaten</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <select class="choices form-select" id="id_kabupaten" name="id_kabupaten">
                                                    @foreach ($kabupaten as $k)
                                                    <option @selected($k->id == $kecamatan->id_kabupaten) value="{{ $k->id }}">{{ $k->kabupaten }}</option>
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