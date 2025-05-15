<div class="form-body mt-2">
    <div class="row">
        <div class="col-md-4">
            <label for="first-name-horizontal">Nama</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
                placeholder="Masukkan Nama" value="{{ old('nama', $siswa->nama ?? '') }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Jenis Kelamin</label>
        </div>
        <div class="col-md-8 form-group">
            <div class="form-check">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L"  @checked(old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'L')>
                <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
            </div>
            <div class="form-check mt-2">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P" @checked(old('jenis_kelamin', $siswa->jenis_kelamin ?? '') == 'P')>
                <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">NIK</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="NIK" class="form-control @error('NIK') is-invalid @enderror" name="NIK" value="{{ old('NIK', $siswa->NIK ?? '') }}" placeholder="Masukkan NIK">
            @error('NIK')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>No Kartu Keluarga</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{ old('no_kk', $siswa->no_kk ?? '') }}" placeholder="Masukkan No Kartu Keluarga">
            @error('no_kk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>No Registrasi Akta Lahir</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_reg_aktlhr" class="form-control @error('no_reg_aktlhr') is-invalid @enderror" name="no_reg_aktlhr" value="{{ old('no_reg_aktlhr', $siswa->no_reg_aktlhr ?? '') }}" placeholder="Masukkan No egistrasi Akta Lahir">
            @error('no_reg_aktlhr')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>NIPD</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nipd" class="form-control @error('nipd') is-invalid @enderror" name="nipd" value="{{ old('nipd', $siswa->nipd ?? '') }}" placeholder="Masukkan NIPD">
            @error('nipd')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>NISN</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nisn" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn', $siswa->nisn ?? '') }}" placeholder="Masukkan NISN">
            @error('nisn')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Jurusan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_jur') is-invalid @enderror" id="id_jur" name="id_jur" data-placeholder="Pilih id_jur">
                    <option value="">Pilih Jurusan</option>
                    @foreach ($jurusan as $jrsn)
                        <option value="{{ $jrsn->id }}" @selected(old('id_jur', $siswa->id_jur ?? '') == $jrsn->id)>{{ $jrsn->nama_jur }}</option>
                    @endforeach
                </select>
                @error('id_jur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label>Rombel</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_rombel') is-invalid @enderror" id="id_rombel" name="id_rombel" data-placeholder="Pilih id_rombel">
                    <option value="">Pilih Rombel</option>
                    @foreach ($rombel as $rbl)
                        <option value="{{ $rbl->id }}" @selected(old('id_rombel', $siswa->id_rombel ?? '') == $rbl->id)>{{ $rbl->nama_rombel }}</option>
                    @endforeach
                </select>
                @error('id_rombel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label>Tempat Lahir</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir ?? '') }}" placeholder="Masukkan Tempat Lahir">
            @error('tempat_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Tanggal Lahir</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="date" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ old('tgl_lahir', $siswa->tgl_lahir ?? '') }}" placeholder="Masukkan Tanggal Lahir">
            @error('tgl_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Agama</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_agama') is-invalid @enderror" id="id_agama" name="id_agama" data-placeholder="Pilih id_agama">
                    <option value="">Pilih Agama</option>
                    @foreach ($agama as $agm)
                        <option value="{{ $agm->id }}" @selected(old('id_agama', $siswa->id_agama ?? '') == $agm->id)>{{ $agm->nama_agama }}</option>
                    @endforeach
                </select>
                @error('id_agama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label>NPSN</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="npsn" class="form-control @error('npsn') is-invalid @enderror" name="npsn" value="{{ old('npsn', $siswa->npsn ?? '') }}" placeholder="Masukkan NPSN">
            @error('npsn')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Nomor HP</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="hp" class="form-control @error('hp') is-invalid @enderror" name="hp" value="{{ old('hp', $siswa->hp ?? '') }}" placeholder="Masukkan Nomor HP">
            @error('hp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Email</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $siswa->email ?? '') }}" placeholder="Masukkan Email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Anak ke</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="anak_ke" class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke" value="{{ old('anak_ke', $siswa->anak_ke ?? '') }}" placeholder="Masukkan Anak ke">
            @error('anak_ke')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Jumlah Saudara Kandung</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="jml_saudara_kandung" class="form-control @error('jml_saudara_kandung') is-invalid @enderror" name="jml_saudara_kandung" value="{{ old('jml_saudara_kandung', $siswa->jml_saudara_kandung ?? '') }}" placeholder="Masukkan Jumlah Saudara Kandung">
            @error('jml_saudara_kandung')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Berat Badan (kg)</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="berat_badan" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" value="{{ old('berat_badan', $siswa->berat_badan ?? '') }}" placeholder="Masukkan Berat Badan">
            @error('berat_badan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Tinggi Badan (cm)</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="tinggi_badan" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" value="{{ old('tinggi_badan', $siswa->tinggi_badan ?? '') }}" placeholder="Masukkan Tinggi Badan">
            @error('tinggi_badan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Lingkar Kepala (cm)</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="lingkar_kepala" class="form-control @error('lingkar_kepala') is-invalid @enderror" name="lingkar_kepala" value="{{ old('lingkar_kepala', $siswa->lingkar_kepala ?? '') }}" placeholder="Masukkan Lingkar Kepala">
            @error('lingkar_kepala')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label>Kewarganegaraan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('kewarganegaraan') is-invalid @enderror" id="kewarganegaraan" name="kewarganegaraan">
                    <option value="WNI" @selected(old('kewarganegaraan', $siswa->kewarganegaraan ?? '') == 'WNI')>WNI</option>
                    <option value="WNA" @selected(old('kewarganegaraan', $siswa->kewarganegaraan ?? '') == 'WNA')>WNA</option>
                </select>
                @error('kewarganegaraan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 d-flex justify-content-end mt-1">
            <button type="button" class="btn btn-primary" onclick="document.querySelector('#domisili-tab').click()" aria-selected="false">Berikutnya</button>
        </div>
    </div>
</div>
