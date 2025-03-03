@extends('admin.layouts.main')
@section('page-title')
    <h3>User</h3>
@endsection
@section('content')
    <div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index')}}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h5 class="card-title align-items-center">
                Tambah User
            </h5>
        </div>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                           @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $item)
                                            <li>{{$item}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                
                            @endif
                            <form class="form form-horizontal" action="{{ route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-body">
                                    <div class="row">
                                      <div class="col-md-4">
                                        <label for="User">Nama user</label>
                                      </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                      <div class="col-md-8 form-group">
                                        <input required type="text" id="User" class="form-control" name="name"
                                        placeholder="Masukkan Nama User">
                                      </div>
                                      <div class="col-md-4">
                                        <label for="Email">Email</label>
                                      </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                      <div class="col-md-8 form-group">
                                        <input required type="email" id="Email" class="form-control" name="email"
                                        placeholder="Masukkan Email User">
                                      </div>
                                      <div class="col-md-4">
                                        <label for="password">Password</label>
                                      </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                      <div class="col-md-8 form-group">
                                        <input required type="password" id="password" class="form-control" name="password"
                                        placeholder="Masukkan Password">
                                      </div>
                                       <div class="col-md-4">
                                        <label for="role_id">Role</label>
                                      </div>
                                      <div class="col-md-8 form-group">
                                        <select name="role_id" id="role_id" class="form-control">
                                          @foreach ($role as $item)
                                          <option value="{{ $item->id }}">{{ $item->role }}</option>
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