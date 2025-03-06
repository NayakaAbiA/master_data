<div class="form-body mt-2">
    <div class="row">
        <div class="col-md-4">
            <label for="first-name-horizontal">Nama</label>
        </div>
        <!-- id dan name disesuaikan dengan field di database -->
        <div class="col-md-8 form-group">
            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
                placeholder="Masukkan Nama" value="{{ $pegawai->nama ?? '' }}">
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
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L"  @checked(($pegawai->jenis_kelamin ?? '') == 'L')>
                    <label class="form-check-label" for="jenis_kelamin1">
                        Laki-laki
                    </label>
            </div>
            <div class="form-check mt-2">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P" @checked(($pegawai->jenis_kelamin ?? '') == 'P')>
                    <label class="form-check-label" for="jenis_kelamin2">
                        Perempuan
                    </label>
            </div>
        </div>
        @error('jenis_kelamin')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <div class="col-md-4">
            <label for="first-name-horizontal">NIP</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="NIP" class="form-control @error('NIP') is-invalid @enderror" name="NIP" value="{{ $pegawai->NIP ?? '' }}"
                placeholder="Masukkan NIP">
            @error('NIP')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">NIK</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="NIK" class="form-control @error('NIK') is-invalid @enderror" name="NIK" value="{{ $pegawai->NIK ?? '' }}"
                placeholder="Masukkan NIK">
            @error('NIK')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">NUPTK</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="NUPTK" class="form-control @error('NUPTK') is-invalid @enderror" name="NUPTK" value="{{ $pegawai->NUPTK ?? '' }}"
                placeholder="Masukkan NUPTK">
            @error('NUPTK')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">No Kartu Keluarga</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_kk" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{ $pegawai->no_kk ?? '' }}"
                placeholder="Masukkan No Kartu Keluarga">
            @error('no_kk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Tempat Lahir</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ $pegawai->tempat_lahir ?? '' }}"
                placeholder="Masukkan Tempat Lahir">
            @error('tempat_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Tanggal Lahir</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="date" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{ $pegawai->tgl_lahir ?? '' }}"
                placeholder="Masukkan Tanggal Lahir">
            @error('tgl_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Nama Ibu Kandung</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_ibu_kandung" class="form-control @error('nama_ibu_kandung') is-invalid @enderror" name="nama_ibu_kandung" value="{{ $pegawai->nama_ibu_kandung ?? '' }}"
                placeholder="Masukkan Nama Ibu Kandung">
            @error('nama_ibu_kandung')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Agama</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_agama') is-invalid @enderror" id="id_agama" name="id_agama" data-placeholder="Pilih id_agama">
                    <option value="">Pilih Agama</option>
                    @foreach ($agama as $agm)
                    <option value="{{ $agm->id }}" @selected(($pegawai->id_agama ?? '') == $agm->id)>{{ $agm->nama_agama }}
                    @endforeach
                </option>
                </select>
                @error('id_agama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Nomor HP</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="hp" class="form-control @error('hp') is-invalid @enderror" name="hp" value="{{ $pegawai->hp ?? '' }}"
                placeholder="Masukkan Nomor HP">
            @error('hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Email</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $pegawai->email ?? '' }}"
                placeholder="Masukkan Email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Status Perkawinan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_statkawin') is-invalid @enderror" id="id_statkawin" name="id_statkawin" data-placeholder="Pilih id_statkawin">
                    <option value="">Pilih Status Perkawinan</option>
                    @foreach ($status_kawin as $skawin)
                    <option value="{{ $skawin->id }}" @selected(($pegawai->id_statkawin ?? '') == $skawin->id)>{{ $skawin->status_kawin}}
                    @endforeach
                </option>
                </select>
                @error('id_statkawin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Nama Suami/Istri</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_pasangan" class="form-control @error('nama_pasangan') is-invalid @enderror" name="nama_pasangan" value="{{ $pegawai->nama_pasangan ?? '' }}"
                placeholder="Masukkan Nama Suami/Istri">
            @error('nama_pasangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">NIP Suami/Istri</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nip_pasangan" class="form-control @error('nip_pasangan') is-invalid @enderror" name="nip_pasangan" value="{{ $pegawai->nip_pasangan ?? '' }}"
                placeholder="Masukkan NIP Suami/Istri">
            @error('nip_pasangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Pekerjaan Suami/Istri</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pekerjaan_pasangan') is-invalid @enderror" id="id_pekerjaan_pasangan" name="id_pekerjaan_pasangan" data-placeholder="Pilih id_pekerjaan_pasangan">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach ($pekerjaan_pasangan as $pekpasangan)
                    <option value="{{ $pekpasangan->id }}" @selected(($pegawai->id_pekerjaan_pasangan ?? '') == $pekpasangan->id)>{{ $pekpasangan->pekerjaan }}
                    @endforeach
                </option>
                </select>
                @error('id_pekerjaan_pasangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">NPWP</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_npwp" class="form-control @error('no_npwp') is-invalid @enderror" name="no_npwp" value="{{ $pegawai->no_npwp ?? '' }}"
                placeholder="Masukkan NPWP">
            @error('no_npwp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Nama Wajib Pajak</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_wajib_pajak" class="form-control @error('nama_wajib_pajak') is-invalid @enderror" name="nama_wajib_pajak" value="{{ $pegawai->nama_wajib_pajak ?? '' }}"
                placeholder="Masukkan Nama Wajib Pajak">
            @error('nama_wajib_pajak')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Kewarganegaraan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('kewarganegaraan') is-invalid @enderror" id="kewarganegaraan" name="kewarganegaraan" data-placeholder="Pilih Kewarganegaraan">
                    <option value="WNI" @selected(($pegawai->kewarganegaraan ?? '') == 'WNI')>WNI</option>
                    <option value="WNA" @selected(($pegawai->kewarganegaraan ?? '') == 'WNA')>WNA</option>
                </select>
                @error('kewarganegaraan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-sm-12 d-flex justify-content-end mt-1">
            <button type="button" class="btn btn-primary" onclick="document.querySelector('#domisili-tab').click()" aria-selected="false">Berikutnya</button>
        </div>
    </div>
</div>