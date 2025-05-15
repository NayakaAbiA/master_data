<div class="form-body mt-2" id="domisili" role="tabpanel" aria-labelledby="domisili-tab">
    <div class="row">
        <div class="col-md-4">
            <label>Alamat</label>
        </div>
        <div class="col-md-8 mb-2">
            <textarea id="Jalan" class="form-control @error('Jalan') is-invalid @enderror" name="Jalan" placeholder="Masukkan Alamat">{{ old('Jalan', $siswa->Jalan ?? '') }}</textarea>
            @error('Jalan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4"><label>No Rumah</label></div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_rumah" class="form-control @error('no_rumah') is-invalid @enderror" name="no_rumah" value="{{ old('no_rumah', $siswa->no_rumah ?? '') }}" placeholder="Masukkan no Rumah">
            @error('no_rumah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4"><label>RT</label></div>
        <div class="col-md-8 form-group">
            <input type="text" id="RT" class="form-control @error('RT') is-invalid @enderror" name="RT" value="{{ old('RT', $siswa->RT ?? '') }}" placeholder="Masukkan RT">
            @error('RT') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4"><label>RW</label></div>
        <div class="col-md-8 form-group">
            <input type="text" id="RW" class="form-control @error('RW') is-invalid @enderror" name="RW" value="{{ old('RW', $siswa->RW ?? '') }}" placeholder="Masukkan RW">
            @error('RW') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4"><label>Provinsi</label></div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_provinsi') is-invalid @enderror" id="id_provinsi" name="id_provinsi">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinsi as $prov)
                        <option value="{{ $prov->id }}" @selected(old('id_provinsi', $siswa->id_provinsi ?? '') == $prov->id)>{{ $prov->provinsi }}</option>
                    @endforeach
                </select>
                @error('id_provinsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="col-md-4"><label>Kabupaten/Kota</label></div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kabupaten') is-invalid @enderror" id="id_kabupaten" name="id_kabupaten">
                    <option value="">Pilih Kabupaten</option>
                    @foreach ($kabupaten as $kab)
                        <option value="{{ $kab->id }}" @selected(old('id_kabupaten', $siswa->id_kabupaten ?? '') == $kab->id)>{{ $kab->kabupaten }}</option>
                    @endforeach
                </select>
                @error('id_kabupaten') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="col-md-4"><label>Kecamatan</label></div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kecamatan') is-invalid @enderror" id="id_kecamatan" name="id_kecamatan">
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($kecamatan as $kec)
                        <option value="{{ $kec->id }}" @selected(old('id_kecamatan', $siswa->id_kecamatan ?? '') == $kec->id)>{{ $kec->kecamatan }}</option>
                    @endforeach
                </select>
                @error('id_kecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="col-md-4"><label>Kelurahan</label></div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kelurahan') is-invalid @enderror" id="id_kelurahan" name="id_kelurahan">
                    <option value="">Pilih Kelurahan</option>
                    @foreach ($kelurahan as $kel)
                        <option value="{{ $kel->id }}" @selected(old('id_kelurahan', $siswa->id_kelurahan ?? '') == $kel->id)>{{ $kel->kelurahan }}</option>
                    @endforeach
                </select>
                @error('id_kelurahan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="col-md-4"><label>Kode Pos</label></div>
        <div class="col-md-8 form-group">
            <input type="text" id="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{ old('kode_pos', $siswa->kode_pos ?? '') }}" placeholder="Masukkan Kode Pos">
            @error('kode_pos') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4"><label>Lintang</label></div>
        <div class="col-md-8 form-group">
            <input type="text" id="lintang" class="form-control @error('lintang') is-invalid @enderror" name="lintang" value="{{ old('lintang', $siswa->lintang ?? '') }}" placeholder="Masukkan Lintang">
            @error('lintang') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4"><label>Bujur</label></div>
        <div class="col-md-8 form-group">
            <input type="text" id="bujur" class="form-control @error('bujur') is-invalid @enderror" name="bujur" value="{{ old('bujur', $siswa->bujur ?? '') }}" placeholder="Masukkan Bujur">
            @error('bujur') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4"><label>No Telepon Rumah</label></div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon', $siswa->no_telepon ?? '') }}" placeholder="Masukkan No Telepon Rumah">
            @error('no_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4"><label>Jenis Tinggal</label></div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_jns_tgl') is-invalid @enderror" id="id_jns_tgl" name="id_jns_tgl">
                    <option value="">Pilih Jenis Tinggal</option>
                    @foreach ($jns_tinggal as $jnstggl)
                        <option value="{{ $jnstggl->id }}" @selected(old('id_jns_tgl', $siswa->id_jns_tgl ?? '') == $jnstggl->id)>{{ $jnstggl->jnstinggal }}</option>
                    @endforeach
                </select>
                @error('id_jns_tgl') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="col-md-4"><label>Transportasi</label></div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_transport') is-invalid @enderror" id="id_transport" name="id_transport">
                    <option value="">Pilih Transportasi</option>
                    @foreach ($transport as $tprt)
                        <option value="{{ $tprt->id }}" @selected(old('id_transport', $siswa->id_transport ?? '') == $tprt->id)>{{ $tprt->alat_transport }}</option>
                    @endforeach
                </select>
                @error('id_transport') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="col-md-4"><label>Jarak ke sekolah (m)</label></div>
        <div class="col-md-8 form-group">
            <input type="text" id="jrk_rumah_sekolah" class="form-control @error('jrk_rumah_sekolah') is-invalid @enderror" name="jrk_rumah_sekolah" value="{{ old('jrk_rumah_sekolah', $siswa->jrk_rumah_sekolah ?? '') }}" placeholder="Masukkan Jarak dari rumah ke sekolah">
            @error('jrk_rumah_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3 col-sm-12 d-flex justify-content-end mt-1">
            <button type="button" class="btn btn-primary d-flex justify-content-end" onclick="document.querySelector('#ortuwali-tab').click()" aria-selected="false">Berikutnya</button>
        </div>
    </div>
</div>
