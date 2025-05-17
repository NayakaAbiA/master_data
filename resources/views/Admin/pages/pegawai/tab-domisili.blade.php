<div class="form-body mt-2" id="domisili" role="tabpanel" aria-labelledby="domisili-tab">
    <div class="row">
        {{-- Alamat --}}
        <div class="col-md-4">
            <label for="Jalan">Alamat</label>
        </div>
        <div class="col-md-8 mb-2">
            <textarea id="Jalan" class="form-control @error('Jalan') is-invalid @enderror" name="Jalan" placeholder="Masukkan Alamat">{{ old('Jalan', $pegawai['Jalan'] ?? '') }}</textarea>
            @error('Jalan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- No Rumah --}}
        <div class="col-md-4">
            <label for="No_rumah">No Rumah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" value="{{ old('No_rumah', $pegawai['No_rumah'] ?? '') }}" id="No_rumah" class="form-control @error('No_rumah') is-invalid @enderror" name="No_rumah" placeholder="Masukkan No Rumah">
            @error('No_rumah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- RT --}}
        <div class="col-md-4">
            <label for="RT">RT</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="RT" class="form-control @error('RT') is-invalid @enderror" name="RT" value="{{ old('RT', $pegawai['RT'] ?? '') }}" placeholder="Masukkan RT">
            @error('RT') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- RW --}}
        <div class="col-md-4">
            <label for="RW">RW</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="RW" class="form-control @error('RW') is-invalid @enderror" name="RW" value="{{ old('RW', $pegawai['RW'] ?? '') }}" placeholder="Masukkan RW">
            @error('RW') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Provinsi --}}
        <div class="col-md-4">
            <label for="id_provinsi">Provinsi</label>
        </div>
        <div class="col-lg-8">
            <select class="choices form-select @error('id_provinsi') is-invalid @enderror" id="id_provinsi" name="id_provinsi">
                <option value="">Pilih Provinsi</option>
                @foreach ($provinsi as $prov)
                    <option value="{{ $prov['id'] }}" @selected(old('id_provinsi', $pegawai['id_provinsi'] ?? '') == $prov['id'])>
                        {{ $prov['provinsi'] }}
                    </option>
                @endforeach
            </select>
            @error('id_provinsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Kabupaten --}}
        <div class="col-md-4">
            <label for="id_kabupaten">Kabupaten/Kota</label>
        </div>
        <div class="col-lg-8">
            <select class="choices form-select @error('id_kabupaten') is-invalid @enderror" id="id_kabupaten" name="id_kabupaten">
                <option value="">Pilih Kabupaten</option>
                @foreach ($kabupaten as $kab)
                    <option value="{{ $kab['id'] }}" @selected(old('id_kabupaten', $pegawai['id_kabupaten'] ?? '') == $kab['id'])>
                        {{ $kab['kabupaten'] }}
                    </option>
                @endforeach
            </select>
            @error('id_kabupaten') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Kecamatan --}}
        <div class="col-md-4">
            <label for="id_kecamatan">Kecamatan</label>
        </div>
        <div class="col-lg-8">
            <select class="choices form-select @error('id_kecamatan') is-invalid @enderror" id="id_kecamatan" name="id_kecamatan">
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatan as $kec)
                    <option value="{{ $kec['id'] }}" @selected(old('id_kecamatan', $pegawai['id_kecamatan'] ?? '') == $kec['id'])>
                        {{ $kec['kecamatan'] }}
                    </option>
                @endforeach
            </select>
            @error('id_kecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Kelurahan --}}
        <div class="col-md-4">
            <label for="id_kelurahan">Kelurahan</label>
        </div>
        <div class="col-lg-8">
            <select class="choices form-select @error('id_kelurahan') is-invalid @enderror" id="id_kelurahan" name="id_kelurahan">
                <option value="">Pilih Kelurahan</option>
                @foreach ($kelurahan as $kel)
                    <option value="{{ $kel['id'] }}" @selected(old('id_kelurahan', $pegawai['id_kelurahan'] ?? '') == $kel['id'])>
                        {{ $kel['kelurahan'] }}
                    </option>
                @endforeach
            </select>
            @error('id_kelurahan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Kode Pos --}}
        <div class="col-md-4">
            <label for="kode_pos">Kode Pos</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{ old('kode_pos', $pegawai['kode_pos'] ?? '') }}" placeholder="Masukkan Kode Pos">
            @error('kode_pos') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Lintang --}}
        <div class="col-md-4">
            <label for="lintang">Lintang</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="lintang" class="form-control @error('lintang') is-invalid @enderror" name="lintang" value="{{ old('lintang', $pegawai['lintang'] ?? '') }}" placeholder="Masukkan Lintang">
            @error('lintang') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Bujur --}}
        <div class="col-md-4">
            <label for="bujur">Bujur</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="bujur" class="form-control @error('bujur') is-invalid @enderror" name="bujur" value="{{ old('bujur', $pegawai['bujur'] ?? '') }}" placeholder="Masukkan Bujur">
            @error('bujur') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- No Telepon --}}
        <div class="col-md-4">
            <label for="no_telepon">No Telepon Rumah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon', $pegawai['no_telepon'] ?? '') }}" placeholder="Masukkan No Telepon Rumah">
            @error('no_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Tombol Berikutnya --}}
        <div class="mb-3 col-sm-12 d-flex justify-content-end mt-1">
            <button type="button" class="btn btn-primary" onclick="document.querySelector('#kepegawaian-tab').click()" aria-selected="false">Berikutnya</button>
        </div>
    </div>
</div>
