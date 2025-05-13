@extends('admin.layouts.main')
@section('page-title')
    <h3>Role</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.role.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Tambah Role
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{ route('admin.role.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-body">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <label for="role">Nama Role</label>
                                      </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                      <div class="col-md-8 form-group">
                                        <input type="text" required id="role" name="role"
                                            class="form-control @error('role') is-invalid @enderror" placeholder="Masukkan Role">
                                        @error('role')
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