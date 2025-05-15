<div class="form-body mt-2">
    <div class="row">
        {{-- Nama --}}
        <div class="col-md-4">
            <label for="nama">Nama</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama"
                placeholder="Masukkan Nama" value="{{ old('nama', $pegawai->nama ?? '') }}">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jenis Kelamin --}}
        <div class="col-md-4">
            <label>Jenis Kelamin</label>
        </div>
        <div class="col-md-8 form-group">
            <div class="form-check">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L"
                    @checked(old('jenis_kelamin', $pegawai->jenis_kelamin ?? '') == 'L')>
                <label class="form-check-label" for="jenis_kelamin1">Laki-laki</label>
            </div>
            <div class="form-check mt-2">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P"
                    @checked(old('jenis_kelamin', $pegawai->jenis_kelamin ?? '') == 'P')>
                <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
            </div>
            @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Input Fields --}}
        @php
            $fields = [
                ['label' => 'NIP', 'name' => 'NIP'],
                ['label' => 'NIK', 'name' => 'NIK'],
                ['label' => 'NUPTK', 'name' => 'NUPTK'],
                ['label' => 'No Kartu Keluarga', 'name' => 'no_kk'],
                ['label' => 'Tempat Lahir', 'name' => 'tempat_lahir'],
                ['label' => 'Tanggal Lahir', 'name' => 'tgl_lahir', 'type' => 'date'],
                ['label' => 'Nama Ibu Kandung', 'name' => 'nama_ibu_kandung'],
                ['label' => 'Nomor HP', 'name' => 'hp'],
                ['label' => 'Email', 'name' => 'email'],
                ['label' => 'Nama Suami/Istri', 'name' => 'nama_pasangan'],
                ['label' => 'NIP Suami/Istri', 'name' => 'nip_pasangan'],
                ['label' => 'NPWP', 'name' => 'no_npwp'],
                ['label' => 'Nama Wajib Pajak', 'name' => 'nama_wajib_pajak'],
            ];
        @endphp

        @foreach ($fields as $field)
            <div class="col-md-4">
                <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="{{ $field['type'] ?? 'text' }}" id="{{ $field['name'] }}"
                    class="form-control @error($field['name']) is-invalid @enderror"
                    name="{{ $field['name'] }}" value="{{ old($field['name'], $pegawai->{$field['name']} ?? '') }}"
                    placeholder="Masukkan {{ $field['label'] }}">
                @error($field['name'])
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        {{-- Agama --}}
        <div class="col-md-4">
            <label for="id_agama">Agama</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_agama') is-invalid @enderror" id="id_agama" name="id_agama">
                    <option value="">Pilih Agama</option>
                    @foreach ($agama as $agm)
                        <option value="{{ $agm->id }}" @selected(old('id_agama', $pegawai->id_agama ?? '') == $agm->id)>
                            {{ $agm->nama_agama }}
                        </option>
                    @endforeach
                </select>
                @error('id_agama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Status Perkawinan --}}
        <div class="col-md-4">
            <label for="id_statkawin">Status Perkawinan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_statkawin') is-invalid @enderror" id="id_statkawin" name="id_statkawin">
                    <option value="">Pilih Status Perkawinan</option>
                    @foreach ($status_kawin as $skawin)
                        <option value="{{ $skawin->id }}" @selected(old('id_statkawin', $pegawai->id_statkawin ?? '') == $skawin->id)>
                            {{ $skawin->status_kawin }}
                        </option>
                    @endforeach
                </select>
                @error('id_statkawin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Pekerjaan Suami/Istri --}}
        <div class="col-md-4">
            <label for="id_pekerjaan_pasangan">Pekerjaan Suami/Istri</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pekerjaan_pasangan') is-invalid @enderror" id="id_pekerjaan_pasangan" name="id_pekerjaan_pasangan">
                    <option value="">Pilih Pekerjaan</option>
                    @foreach ($pekerjaan_pasangan as $pekpasangan)
                        <option value="{{ $pekpasangan->id }}" @selected(old('id_pekerjaan_pasangan', $pegawai->id_pekerjaan_pasangan ?? '') == $pekpasangan->id)>
                            {{ $pekpasangan->pekerjaan }}
                        </option>
                    @endforeach
                </select>
                @error('id_pekerjaan_pasangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Kewarganegaraan --}}
        <div class="col-md-4">
            <label for="kewarganegaraan">Kewarganegaraan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('kewarganegaraan') is-invalid @enderror" id="kewarganegaraan" name="kewarganegaraan">
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="WNI" @selected(old('kewarganegaraan', $pegawai->kewarganegaraan ?? '') == 'WNI')>WNI</option>
                    <option value="WNA" @selected(old('kewarganegaraan', $pegawai->kewarganegaraan ?? '') == 'WNA')>WNA</option>
                </select>
                @error('kewarganegaraan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- Tombol Berikutnya --}}
        <div class="mb-3 col-sm-12 d-flex justify-content-end mt-1">
            <button type="button" class="btn btn-primary" onclick="document.querySelector('#domisili-tab').click()">Berikutnya</button>
        </div>
    </div>
</div>
