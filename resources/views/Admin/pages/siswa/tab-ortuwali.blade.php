<div class="form-body mt-2" id="ortuwali" role="tabpanel" aria-labelledby="ortuwali-tab">
    <div class="row">
        {{-- Nama Ayah --}}
        <div class="col-md-4">
            <label for="nama_ayah">Nama Ayah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ old('nama_ayah', $siswa->nama_ayah ?? '') }}" placeholder="Masukkan Nama Ayah">
            @error('nama_ayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- NIK Ayah --}}
        <div class="col-md-4">
            <label for="nik_ayah">NIK Ayah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nik_ayah" class="form-control @error('nik_ayah') is-invalid @enderror" name="nik_ayah" value="{{ old('nik_ayah', $siswa->nik_ayah ?? '') }}" placeholder="Masukkan NIK Ayah">
            @error('nik_ayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Tahun Lahir Ayah --}}
        <div class="col-md-4">
            <label for="thn_lahir_ayah">Tahun Lahir Ayah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="thn_lahir_ayah" class="form-control @error('thn_lahir_ayah') is-invalid @enderror" name="thn_lahir_ayah" value="{{ old('thn_lahir_ayah', $siswa->thn_lahir_ayah ?? '') }}" placeholder="Masukkan Tahun Lahir">
            @error('thn_lahir_ayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Pendidikan Ayah --}}
        <div class="col-md-4">
            <label for="id_pendidikan_ayah">Pendidikan Ayah</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pendidikan_ayah') is-invalid @enderror" id="id_pendidikan_ayah" name="id_pendidikan_ayah">
                    <option value="">Pilih Pendidikan</option>
                    @foreach ($pendidikan as $penayah)
                        <option value="{{ $penayah->id }}" {{ old('id_pendidikan_ayah', $siswa->id_pendidikan_ayah ?? '') == $penayah->id ? 'selected' : '' }}>{{ $penayah->jenjang_pendidikan }}</option>
                    @endforeach
                </select>
                @error('id_pendidikan_ayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Pekerjaan Ayah --}}
        <div class="col-md-4">
            <label for="id_kerja_ayah">Pekerjaan Ayah</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kerja_ayah') is-invalid @enderror" id="id_kerja_ayah" name="id_kerja_ayah">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach ($pekerjaan as $pekayah)
                        <option value="{{ $pekayah->id }}" {{ old('id_kerja_ayah', $siswa->id_kerja_ayah ?? '') == $pekayah->id ? 'selected' : '' }}>{{ $pekayah->pekerjaan }}</option>
                    @endforeach
                </select>
                @error('id_kerja_ayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Penghasilan Ayah --}}
        <div class="col-md-4">
            <label for="id_penghasilan_ayah">Penghasilan Ayah</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_penghasilan_ayah') is-invalid @enderror" id="id_penghasilan_ayah" name="id_penghasilan_ayah">
                    <option value="">Pilih Penghasilan</option>
                    @foreach ($penghasilan as $pehayah)
                        <option value="{{ $pehayah->id }}" {{ old('id_penghasilan_ayah', $siswa->id_penghasilan_ayah ?? '') == $pehayah->id ? 'selected' : '' }}>{{ $pehayah->penghasilan }}</option>
                    @endforeach
                </select>
                @error('id_penghasilan_ayah')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- === BAGIAN IBU === --}}
        {{-- Nama Ibu --}}
        <div class="col-md-4">
            <label for="nama_ibu">Nama Ibu</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ old('nama_ibu', $siswa->nama_ibu ?? '') }}" placeholder="Masukkan Nama Ibu">
            @error('nama_ibu')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- NIK Ibu --}}
        <div class="col-md-4">
            <label for="nik_ibu">NIK Ibu</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nik_ibu" class="form-control @error('nik_ibu') is-invalid @enderror" name="nik_ibu" value="{{ old('nik_ibu', $siswa->nik_ibu ?? '') }}" placeholder="Masukkan NIK Ibu">
            @error('nik_ibu')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Tahun Lahir Ibu --}}
        <div class="col-md-4">
            <label for="thn_lahir_ibu">Tahun Lahir Ibu</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="thn_lahir_ibu" class="form-control @error('thn_lahir_ibu') is-invalid @enderror" name="thn_lahir_ibu" value="{{ old('thn_lahir_ibu', $siswa->thn_lahir_ibu ?? '') }}" placeholder="Masukkan Tahun Lahir">
            @error('thn_lahir_ibu')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Pendidikan Ibu --}}
        <div class="col-md-4">
            <label for="id_pendidikan_ibu">Pendidikan Ibu</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pendidikan_ibu') is-invalid @enderror" id="id_pendidikan_ibu" name="id_pendidikan_ibu">
                    <option value="">Pilih Pendidikan</option>
                    @foreach ($pendidikan as $penibu)
                        <option value="{{ $penibu->id }}" {{ old('id_pendidikan_ibu', $siswa->id_pendidikan_ibu ?? '') == $penibu->id ? 'selected' : '' }}>{{ $penibu->jenjang_pendidikan }}</option>
                    @endforeach
                </select>
                @error('id_pendidikan_ibu')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Pekerjaan Ibu --}}
        <div class="col-md-4">
            <label for="id_kerja_ibu">Pekerjaan Ibu</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kerja_ibu') is-invalid @enderror" id="id_kerja_ibu" name="id_kerja_ibu">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach ($pekerjaan as $pekibu)
                        <option value="{{ $pekibu->id }}" {{ old('id_kerja_ibu', $siswa->id_kerja_ibu ?? '') == $pekibu->id ? 'selected' : '' }}>{{ $pekibu->pekerjaan }}</option>
                    @endforeach
                </select>
                @error('id_kerja_ibu')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Penghasilan Ibu --}}
        <div class="col-md-4">
            <label for="id_penghasilan_ibu">Penghasilan Ibu</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_penghasilan_ibu') is-invalid @enderror" id="id_penghasilan_ibu" name="id_penghasilan_ibu">
                    <option value="">Pilih Penghasilan</option>
                    @foreach ($penghasilan as $pehibu)
                        <option value="{{ $pehibu->id }}" {{ old('id_penghasilan_ibu', $siswa->id_penghasilan_ibu ?? '') == $pehibu->id ? 'selected' : '' }}>{{ $pehibu->penghasilan }}</option>
                    @endforeach
                </select>
                @error('id_penghasilan_ibu')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- === BAGIAN WALI === --}}
        {{-- Nama Wali --}}
        <div class="col-md-4">
            <label for="nama_wali">Nama Wali</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror" name="nama_wali" value="{{ old('nama_wali', $siswa->nama_wali ?? '') }}" placeholder="Masukkan Nama Wali">
            @error('nama_wali')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- NIK Wali --}}
        <div class="col-md-4">
            <label for="nik_wali">NIK Wali</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nik_wali" class="form-control @error('nik_wali') is-invalid @enderror" name="nik_wali" value="{{ old('nik_wali', $siswa->nik_wali ?? '') }}" placeholder="Masukkan NIK Wali">
            @error('nik_wali')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Tahun Lahir Wali --}}
        <div class="col-md-4">
            <label for="thn_lahir_wali">Tahun Lahir Wali</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="thn_lahir_wali" class="form-control @error('thn_lahir_wali') is-invalid @enderror" name="thn_lahir_wali" value="{{ old('thn_lahir_wali', $siswa->thn_lahir_wali ?? '') }}" placeholder="Masukkan Tahun Lahir">
            @error('thn_lahir_wali')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Pendidikan Wali --}}
        <div class="col-md-4">
            <label for="id_pendidikan_wali">Pendidikan Wali</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pendidikan_wali') is-invalid @enderror" id="id_pendidikan_wali" name="id_pendidikan_wali">
                    <option value="">Pilih Pendidikan</option>
                    @foreach ($pendidikan as $penwali)
                        <option value="{{ $penwali->id }}" {{ old('id_pendidikan_wali', $siswa->id_pendidikan_wali ?? '') == $penwali->id ? 'selected' : '' }}>{{ $penwali->jenjang_pendidikan }}</option>
                    @endforeach
                </select>
                @error('id_pendidikan_wali')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Pekerjaan Wali --}}
        <div class="col-md-4">
            <label for="id_kerja_wali">Pekerjaan Wali</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kerja_wali') is-invalid @enderror" id="id_kerja_wali" name="id_kerja_wali">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach ($pekerjaan as $pekwali)
                        <option value="{{ $pekwali->id }}" {{ old('id_kerja_wali', $siswa->id_kerja_wali ?? '') == $pekwali->id ? 'selected' : '' }}>{{ $pekwali->pekerjaan }}</option>
                    @endforeach
                </select>
                @error('id_kerja_wali')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Penghasilan Wali --}}
        <div class="col-md-4">
            <label for="id_penghasilan_wali">Penghasilan Wali</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_penghasilan_wali') is-invalid @enderror" id="id_penghasilan_wali" name="id_penghasilan_wali">
                    <option value="">Pilih Penghasilan</option>
                    @foreach ($penghasilan as $pehwali)
                        <option value="{{ $pehwali->id }}" {{ old('id_penghasilan_wali', $siswa->id_penghasilan_wali ?? '') == $pehwali->id ? 'selected' : '' }}>{{ $pehwali->penghasilan }}</option>
                    @endforeach
                </select>
                @error('id_penghasilan_wali')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Tombol Berikutnya --}}
        <div class="mb-3 col-sm-12 d-flex justify-content-end mt-1">
            <button type="button" class="btn btn-primary" onclick="document.querySelector('#lainnya-tab').click()" aria-selected="false">Berikutnya</button>
        </div>
    </div>
</div>
