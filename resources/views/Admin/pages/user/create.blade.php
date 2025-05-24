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
                                        <input value="{{ old('name') }}" type="text" id="User" name="name"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama User">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                      </div>
                                      <div class="col-md-4">
                                        <label for="Email">Email</label>
                                      </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                      <div class="col-md-8 form-group">
                                        <input value="{{ old('email') }}" type="email" id="Email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email User">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                      </div>
                                      <div class="col-md-4">
                                        <label for="password">Password</label>
                                      </div>
                                         <!-- id dan name disesuaikan dengan field di database -->
                                      <div class="col-md-8 form-group">
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password User">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                      </div>
                                       <div class="col-md-4">
                                        <label for="role_id">Role</label>
                                      </div>
                                      <div class="col-md-8 form-group">
                                      <!-- Select Role -->
                                    <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" onchange="checkRole(this.value)">
                                        <option value="">-- Pilih Role --</option>
                                        @foreach ($role as $item)
                                            <option value="{{ $item->id }}" {{ old('role_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->role }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('role_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <!-- Perulangan Tambahan: Daftar PTK -->
                                    <div id="ptk-container" style="display: none; margin-top: 10px;">
                                        <label for="ptk_id"></label>
                                        <select name="ptk_id" id="ptk_id" class="form-control @error('ptk_id') is-invalid @enderror">
                                            @foreach ($ptk as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('ptk_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
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
    <script>
        function checkRole(roleId) {
            // Misalnya id role 'pegawai' = 1 (kamu sesuaikan)
            var pegawaiRoleId = {{ $role->where('role', 'pegawai')->first()->id ?? 'null' }};
            var ptkContainer = document.getElementById('ptk-container');
    
            if (parseInt(roleId) === pegawaiRoleId) {
                ptkContainer.style.display = 'block';
            } else {
                ptkContainer.style.display = 'none';
            }
        }
    
        // Saat halaman dimuat (untuk edit/form yang sudah ada)
        document.addEventListener("DOMContentLoaded", function () {
            const selectedRole = document.getElementById('role_id').value;
            checkRole(selectedRole);
        });
    </script>
    
@endsection