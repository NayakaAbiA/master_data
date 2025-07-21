@extends('admin.layouts.main')

@section('page-title')
    <h3>User</h3>
@endsection

@section('content')
<div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
</div>

<div class="card col-md-12">
    <div class="card-header">
        <h5 class="card-title align-items-center">Tambah User</h5>
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
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form form-horizontal" action="{{ route('admin.user.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <!-- Nama -->
                                    <div class="col-md-4">
                                        <label for="User">Nama User</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input value="{{ old('name') }}" type="text" id="User" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Masukkan Nama User">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-4">
                                        <label for="Email">Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input value="{{ old('email') }}" type="email" id="Email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Masukkan Email User">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-4">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukkan Password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Role -->
                                    <div class="col-md-4">
                                        <label for="role_id">Role</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select name="role_id" id="role_id"
                                            class="form-control @error('role_id') is-invalid @enderror"
                                            onchange="checkRole(this.value)">
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
                                    </div>

                                    <!-- PTK Dropdown -->
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8 form-group">
                                        <div id="ptk-container" style="display: none; margin-top: 10px;">
                                            <label for="ptk_id">Pilih PTK</label>
                                            <select name="ptk_id" id="ptk_id"
                                                class="form-control @error('ptk_id') is-invalid @enderror">
                                                @foreach ($ptk as $item)
                                                    <option value="{{ $item->id }}" {{ old('ptk_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('ptk_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Siswa Dropdown -->
                                        <div id="siswa-container" style="display: none; margin-top: 10px;">
                                            <label for="siswa_id">Pilih Siswa</label>
                                            <select name="siswa_id" id="siswa_id"
                                                class="form-control @error('siswa_id') is-invalid @enderror">
                                                @foreach ($siswa as $item)
                                                    <option value="{{ $item->id }}" {{ old('siswa_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('siswa_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div class="col-sm-12 d-flex justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Script untuk menampilkan dropdown berdasarkan role -->
                        <script>
                            function checkRole(roleId) {
                                const pegawaiRoleId = {{ $role->firstWhere('role', 'pegawai')->id ?? 'null' }};
                                const siswaRoleId = {{ $role->firstWhere('role', 'siswa')->id ?? 'null' }};

                                const ptkContainer = document.getElementById('ptk-container');
                                const siswaContainer = document.getElementById('siswa-container');

                                if (parseInt(roleId) === pegawaiRoleId) {
                                    ptkContainer.style.display = 'block';
                                    siswaContainer.style.display = 'none';
                                } else if (parseInt(roleId) === siswaRoleId) {
                                    ptkContainer.style.display = 'none';
                                    siswaContainer.style.display = 'block';
                                } else {
                                    ptkContainer.style.display = 'none';
                                    siswaContainer.style.display = 'none';
                                }
                            }

                            document.addEventListener('DOMContentLoaded', function () {
                                const selectedRole = document.getElementById('role_id').value;
                                checkRole(selectedRole);
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
