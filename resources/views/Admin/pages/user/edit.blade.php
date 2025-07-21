@extends('admin.layouts.main')
@section('page-title')
    <h3>User</h3>
@endsection
@section('content')
<div class="card-body">
    <nav aria-label="breadcrumb" class="d-flex justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
</div>

<div class="card col-md-12">
    <div class="card-header">
        <h5 class="card-title align-items-center">Edit User</h5>
    </div>
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('admin.user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-4">
                                        <label for="User">Nama User</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input value="{{ old('name', $user['name']) }}" type="text" id="User" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Masukkan Nama User" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-4">
                                        <label for="Email">Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input value="{{ old('email', $user['email']) }}" type="email" id="Email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Masukkan Email" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-4">
                                        <label for="password">Password (kosongkan jika tidak diubah)</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukkan Password Baru (Opsional)">
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
                                            onchange="checkRole(this.value)" required>
                                            <option value="">-- Pilih Role --</option>
                                            @foreach ($roles as $item)
                                                <option value="{{ $item->id }}" {{ old('role_id', $user['role_id']) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->role }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- PTK Dropdown -->
                                    <div class="col-md-4">
                                        <label for="ptk_id">Pilih PTK</label>
                                    </div>
                                    <div id="ptk-container" class="col-md-8 form-group">
                                        <select name="ptk_id" id="ptk_id"
                                            class="form-control @error('ptk_id') is-invalid @enderror">
                                            <option value="">-- Pilih PTK --</option>
                                            @foreach ($ptk as $item)
                                                <option value="{{ $item->id }}" {{ old('ptk_id', $user['ptk_id']) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ptk_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Siswa Dropdown -->
                                    <div id="siswa-container" class="col-md-8 form-group">
                                        <select name="siswa_id" id="siswa_id"
                                            class="form-control @error('siswa_id') is-invalid @enderror">
                                            <option value="">-- Pilih Siswa --</option>
                                            @foreach ($siswa as $item)
                                                <option value="{{ $item->id }}" {{ old('siswa_id', $user['siswa_id']) == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('siswa_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Submit -->
                                    <div class="col-sm-12 d-flex justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- card-body -->
                </div> <!-- card-content -->
            </div>
        </div>
    </div>
</div>

<script>
    function checkRole(roleId) {
        const pegawaiRoleId = {{ $roles->where('role', 'pegawai')->first()->id ?? 'null' }};
        const siswaRoleId = {{ $roles->where('role', 'siswa')->first()->id ?? 'null' }};

        const ptkContainer = document.getElementById('ptk-container');
        const siswaContainer = document.getElementById('siswa-container');
        const ptkSelect = document.getElementById('ptk_id');
        const siswaSelect = document.getElementById('siswa_id');

        if (parseInt(roleId) === pegawaiRoleId) {
            ptkContainer.style.display = 'block';
            ptkSelect.disabled = false;

            siswaContainer.style.display = 'none';
            siswaSelect.disabled = true;
            siswaSelect.value = '';
        } else if (parseInt(roleId) === siswaRoleId) {
            siswaContainer.style.display = 'block';
            siswaSelect.disabled = false;

            ptkContainer.style.display = 'none';
            ptkSelect.disabled = true;
            ptkSelect.value = '';
        } else {
            ptkContainer.style.display = 'none';
            siswaContainer.style.display = 'none';
            ptkSelect.disabled = true;
            siswaSelect.disabled = true;
            ptkSelect.value = '';
            siswaSelect.value = '';
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const selectedRole = document.getElementById('role_id').value;
        checkRole(selectedRole);
    });
</script>
@endsection
