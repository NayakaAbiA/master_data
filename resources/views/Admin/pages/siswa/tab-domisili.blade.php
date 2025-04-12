<div class="form-body mt-2" id="domisili" role="tabpanel" aria-labelledby="domisili-tab">
    <div class="row">
        <div class="col-md-4">
            <label for="first-name-horizontal">Alamat</label>
        </div>
        <!-- id dan name disesuaikan dengan field di database -->
        <div class="col-md-8 mb-2">
            <textarea id="Jalan" class="form-control @error('Jalan') is-invalid @enderror" name="Jalan" placeholder="Masukkan Alamat">{{ $siswa->Jalan ?? '' }}</textarea>
            @error('Jalan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">No Rumah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_rumah" class="form-control @error('no_rumah') is-invalid @enderror" name="no_rumah" value="{{ $siswa->no_rumah ?? '' }}"
                placeholder="Masukkan no Rumah">
            @error('no_rumah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">RT</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="RT" class="form-control @error('RT') is-invalid @enderror" name="RT" value="{{ $siswa->RT ?? '' }}"
                placeholder="Masukkan RT">
            @error('RT')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">RW</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="RW" class="form-control @error('RW') is-invalid @enderror" name="RW" value="{{ $siswa->RW ?? '' }}"
                placeholder="Masukkan RW">
            @error('RW')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Provinsi</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_provinsi') is-invalid @enderror" id="id_provinsi" name="id_provinsi" data-placeholder="Pilih id_provinsi">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinsi as $prov)
                    <option value="{{ $prov->id }}" @selected(($siswa->id_provinsi ?? '') == $prov->id)>{{ $prov->provinsi }}
                    @endforeach
                </option>
                </select>
                @error('id_provinsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Kabupaten/Kota</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kabupaten') is-invalid @enderror" id="id_kabupaten" name="id_kabupaten" data-placeholder="Pilih id_kabupaten">
                    <option value="">Pilih Kabupaten</option>
                    @foreach ($kabupaten as $kab)
                    <option value="{{ $kab->id }}" @selected(($siswa->id_kabupaten ?? '') == $kab->id)>{{ $kab->kabupaten }}
                    @endforeach
                </option>
                </select>
                @error('id_kabupaten')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Kecamatan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kecamatan') is-invalid @enderror" id="id_kecamatan" name="id_kecamatan" data-placeholder="Pilih id_kecamatan">
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($kecamatan as $kec)
                    <option value="{{ $kec->id }}" @selected(($siswa->id_kecamatan ?? '') == $kec->id)>{{ $kec->kecamatan }}
                    @endforeach
                </option>
                </select>
                @error('id_kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Kelurahan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kelurahan') is-invalid @enderror" id="id_kelurahan" name="id_kelurahan" data-placeholder="Pilih id_kelurahan">
                    <option value="">Pilih Kelurahan</option>
                    @foreach ($kelurahan as $kel)
                    <option value="{{ $kel->id }}" @selected(($siswa->id_kelurahan ?? '') == $kel->id)>{{ $kel->kelurahan }}
                    @endforeach
                </option>
                </select>
                @error('id_kelurahan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Kode Pos</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{ $siswa->kode_pos ?? '' }}"
                placeholder="Masukkan Kode Pos">
            @error('kode_pos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Lintang</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="lintang" class="form-control @error('lintang') is-invalid @enderror" name="lintang" value="{{ $siswa->lintang ?? '' }}"
                placeholder="Masukkan Lintang">
            @error('lintang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Bujur</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="bujur" class="form-control @error('bujur') is-invalid @enderror" name="bujur" value="{{ $siswa->bujur ?? '' }}"
                placeholder="Masukkan Bujur">
            @error('bujur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">No Telepon Rumah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ $siswa->no_telepon ?? '' }}"
                placeholder="Masukkan No Telepon Rumah">
            @error('no_telepon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Jenis Tinggal</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_jns_tgl') is-invalid @enderror" id="id_jns_tgl" name="id_jns_tgl" data-placeholder="Pilih id_jns_tgl">
                    <option value="">Pilih Jenis Tinggal</option>
                    @foreach ($jns_tinggal as $jnstggl)
                    <option value="{{ $jnstggl->id }}" @selected(($siswa->id_jns_tgl ?? '') == $jnstggl->id)>{{ $jnstggl->jnstinggal }}
                    @endforeach
                </option>
                </select>
                @error('id_jns_tgl')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Transportasi</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_transport') is-invalid @enderror" id="id_transport" name="id_transport" data-placeholder="Pilih id_transport">
                    <option value="">Pilih Transportasi</option>
                    @foreach ($transport as $tprt)
                    <option value="{{ $tprt->id }}" @selected(($siswa->id_transport ?? '') == $tprt->id)>{{ $tprt->alat_transport }}
                    @endforeach
                </option>
                </select>
                @error('id_transport')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Jarak ke sekolah (m)</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="jrk_rumah_sekolah" class="form-control @error('jrk_rumah_sekolah') is-invalid @enderror" name="jrk_rumah_sekolah" value="{{ $siswa->jrk_rumah_sekolah ?? '' }}"
                placeholder="Masukkan Jarak dari rumah ke sekolah">
            @error('jrk_rumah_sekolah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <!-- <div class="mb-3">
            <button type="button" class="btn btn-primary d-flex justify-content-end" onclick="document.querySelector('#identitas-tab').click()" aria-selected="false">Kembali</button>
        </div> -->
        <div class="mb-3 col-sm-12 d-flex justify-content-end mt-1">
            <button type="button" class="btn btn-primary d-flex justify-content-end" onclick="document.querySelector('#ortuwali-tab').click()" aria-selected="false">Berikutnya</button>
        </div>
    </div>
</div>