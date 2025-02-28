@extends('admin.layouts.main')
@section('page-title')
    <h3>Jenis PTK</h3>
@endsection
@section('content')
    <div class="card col-md-6">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Data Jenis PTK
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Jenis PTK</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.jenisptk.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="first-name-horizontal">Jenis PTK</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="jenis_ptk" class="form-control" name="jenis_ptk"
                                                placeholder="Masukkan Jenis PTK">
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