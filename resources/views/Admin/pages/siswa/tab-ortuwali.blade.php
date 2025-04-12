<div class="form-body mt-2"  id="ortuwali" role="tabpanel" aria-labelledby="ortuwali-tab">
    <div class="row">
        <div class="col-md-4">
            <label for="first-name-horizontal">Nama Ayah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ $siswa->nama_ayah ?? '' }}"
                placeholder="Masukkan Nama Ayah">
            @error('nama_ayah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">NIK Ayah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nik_ayah" class="form-control @error('nik_ayah') is-invalid @enderror" name="nik_ayah" value="{{ $siswa->nik_ayah ?? '' }}"
                placeholder="Masukkan NIK Ayah">
            @error('nik_ayah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Tahun Lahir Ayah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="thn_lahir_ayah" class="form-control @error('thn_lahir_ayah') is-invalid @enderror" name="thn_lahir_ayah" value="{{ $siswa->thn_lahir_ayah ?? '' }}"
                placeholder="Masukkan Tahun Lahir">
            @error('thn_lahir_ayah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Pendidikan Ayah</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pendidikan_ayah') is-invalid @enderror" id="id_pendidikan_ayah" name="id_pendidikan_ayah" data-placeholder="Pilih id_pendidikan_ayah">
                    <option value="">Pilih Pendidikan</option>
                    @foreach ($pendidikan as $penayah)
                    <option value="{{ $penayah->id }}" @selected(($siswa->id_pendidikan_ayah ?? '') == $penayah->id)>{{ $penayah->jenjang_pendidikan }}
                    @endforeach
                </option>
                </select>
                @error('id_pendidikan_ayah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Pekerjaan Ayah</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kerja_ayah') is-invalid @enderror" id="id_kerja_ayah" name="id_kerja_ayah" data-placeholder="Pilih id_kerja_ayah">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach ($pekerjaan as $pekayah)
                    <option value="{{ $pekayah->id }}" @selected(($siswa->id_kerja_ayah ?? '') == $pekayah->id)>{{ $pekayah->pekerjaan }}
                    @endforeach
                </option>
                </select>
                @error('id_kerja_ayah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Penghasilan Ayah</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_penghasilan_ayah') is-invalid @enderror" id="id_penghasilan_ayah" name="id_penghasilan_ayah" data-placeholder="Pilih id_penghasilan_ayah">
                    <option value="">Pilih Penghasilan</option>
                    @foreach ($penghasilan as $pehayah)
                    <option value="{{ $pehayah->id }}" @selected(($siswa->id_penghasilan_ayah ?? '') == $pehayah->id)>{{ $pehayah->penghasilan }}
                    @endforeach
                </option>
                </select>
                @error('id_penghasilan_ayah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Nama Ibu</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ $siswa->nama_ibu ?? '' }}"
                placeholder="Masukkan Nama Ibu">
            @error('nama_ibu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">NIK Ibu</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nik_ibu" class="form-control @error('nik_ibu') is-invalid @enderror" name="nik_ibu" value="{{ $siswa->nik_ibu ?? '' }}"
                placeholder="Masukkan NIK Ibu">
            @error('nik_ibu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Tahun Lahir ibu</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="thn_lahir_ibu" class="form-control @error('thn_lahir_ibu') is-invalid @enderror" name="thn_lahir_ibu" value="{{ $siswa->thn_lahir_ibu ?? '' }}"
                placeholder="Masukkan Tahun Lahir">
            @error('thn_lahir_ibu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Pendidikan Ibu</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pendidikan_ibu') is-invalid @enderror" id="id_pendidikan_ibu" name="id_pendidikan_ibu" data-placeholder="Pilih id_pendidikan_ibu">
                    <option value="">Pilih Pendidikan</option>
                    @foreach ($pendidikan as $penibu)
                    <option value="{{ $penibu->id }}" @selected(($siswa->id_pendidikan_ibu ?? '') == $penibu->id)>{{ $penibu->jenjang_pendidikan }}
                    @endforeach
                </option>
                </select>
                @error('id_pendidikan_ibu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Pekerjaan Ibu</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kerja_ibu') is-invalid @enderror" id="id_kerja_ibu" name="id_kerja_ibu" data-placeholder="Pilih id_kerja_ibu">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach ($pekerjaan as $pekibu)
                    <option value="{{ $pekibu->id }}" @selected(($siswa->id_kerja_ibu ?? '') == $pekibu->id)>{{ $pekibu->pekerjaan }}
                    @endforeach
                </option>
                </select>
                @error('id_kerja_ibu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Penghasilan Ibu</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_penghasilan_ibu') is-invalid @enderror" id="id_penghasilan_ibu" name="id_penghasilan_ibu" data-placeholder="Pilih id_penghasilan_ibu">
                    <option value="">Pilih Penghasilan</option>
                    @foreach ($penghasilan as $pehibu)
                    <option value="{{ $pehibu->id }}" @selected(($siswa->id_penghasilan_ibu ?? '') == $pehibu->id)>{{ $pehibu->penghasilan }}
                    @endforeach
                </option>
                </select>
                @error('id_penghasilan_ibu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Nama wali</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror" name="nama_wali" value="{{ $siswa->nama_wali ?? '' }}"
                placeholder="Masukkan Nama Wali">
            @error('nama_wali')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">NIK wali</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nik_wali" class="form-control @error('nik_wali') is-invalid @enderror" name="nik_wali" value="{{ $siswa->nik_wali ?? '' }}"
                placeholder="Masukkan NIK wali">
            @error('nik_wali')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Tahun Lahir Wali</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="thn_lahir_wali" class="form-control @error('thn_lahir_wali') is-invalid @enderror" name="thn_lahir_wali" value="{{ $siswa->thn_lahir_wali ?? '' }}"
                placeholder="Masukkan Tahun Lahir">
            @error('thn_lahir_wali')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Pendidikan Wali</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pendidikan_wali') is-invalid @enderror" id="id_pendidikan_wali" name="id_pendidikan_wali" data-placeholder="Pilih id_pendidikan_wali">
                    <option value="">Pilih Pendidikan</option>
                    @foreach ($pendidikan as $penwali)
                    <option value="{{ $penwali->id }}" @selected(($siswa->id_pendidikan_wali ?? '') == $penwali->id)>{{ $penwali->jenjang_pendidikan }}
                    @endforeach
                </option>
                </select>
                @error('id_pendidikan_wali')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Pekerjaan Wali</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kerja_wali') is-invalid @enderror" id="id_kerja_wali" name="id_kerja_wali" data-placeholder="Pilih id_kerja_wali">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach ($pekerjaan as $pekwali)
                    <option value="{{ $pekwali->id }}" @selected(($siswa->id_kerja_wali ?? '') == $pekwali->id)>{{ $pekwali->pekerjaan }}
                    @endforeach
                </option>
                </select>
                @error('id_kerja_wali')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Penghasilan Wali</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_penghasilan_wali') is-invalid @enderror" id="id_penghasila_wali" name="id_penghasila_wali" data-placeholder="Pilih id_penghasila_wali">
                    <option value="">Pilih Penghasilan</option>
                    @foreach ($penghasilan as $pehwali)
                    <option value="{{ $pehwali->id }}" @selected(($siswa->id_penghasilan_wali ?? '') == $pehwali->id)>{{ $pehwali->penghasilan }}
                    @endforeach
                </option>
                </select>
                @error('id_penghasilan_wali')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 d-flex justify-content-end mt-1">
            <button type="button" class="btn btn-primary" onclick="document.querySelector('#lainnya-tab').click()" aria-selected="false">Berikutnya</button>
        </div>
    </div>
</div>