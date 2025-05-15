<div class="form-body mt-2" id="ortuwali" role="tabpanel" aria-labelledby="ortuwali-tab">
    <div class="row">
        <div class="col-md-4">
            <label for="no_skhun">No SKHUN</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_skhun" class="form-control @error('no_skhun') is-invalid @enderror" name="no_skhun" value="{{ old('no_skhun', $siswa->no_skhun ?? '') }}" placeholder="Masukkan No SKHUN">
            @error('no_skhun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="nopes_un">No Peserta UN</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nopes_un" class="form-control @error('nopes_un') is-invalid @enderror" name="nopes_un" value="{{ old('nopes_un', $siswa->nopes_un ?? '') }}" placeholder="Masukkan No Peserta UN">
            @error('nopes_un')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="no_seri_ijazah">No Seri Ijazah</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_seri_ijazah" class="form-control @error('no_seri_ijazah') is-invalid @enderror" name="no_seri_ijazah" value="{{ old('no_seri_ijazah', $siswa->no_seri_ijazah ?? '') }}" placeholder="Masukkan No Seri Ijazah">
            @error('no_seri_ijazah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="id_krt_bantuan">Kartu Bantuan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_krt_bantuan') is-invalid @enderror" id="id_krt_bantuan" name="id_krt_bantuan">
                    <option value="">Pilih Kartu Bantuan</option>
                    @foreach ($krt_bantuan as $krtbtn)
                        <option value="{{ $krtbtn->id }}" @selected(old('id_krt_bantuan', $siswa->id_krt_bantuan ?? '') == $krtbtn->id)>
                            {{ $krtbtn->nama_krtbantuan }}
                        </option>
                    @endforeach
                </select>
                @error('id_krt_bantuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="nama_pada_kartu">Nama Pada Kartu</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nama_pada_kartu" class="form-control @error('nama_pada_kartu') is-invalid @enderror" name="nama_pada_kartu" value="{{ old('nama_pada_kartu', $siswa->nama_pada_kartu ?? '') }}" placeholder="Masukkan Nama Pada Kartu Bantuan">
            @error('nama_pada_kartu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="id_bank">Nama Bank</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_bank') is-invalid @enderror" id="id_bank" name="id_bank">
                    <option value="">Pilih Bank</option>
                    @foreach ($bank as $bnk)
                        <option value="{{ $bnk->id }}" @selected(old('id_bank', $siswa->id_bank ?? '') == $bnk->id)>
                            {{ $bnk->nama_bank }}
                        </option>
                    @endforeach
                </select>
                @error('id_bank')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="no_rek_bank">No Rekening Bank</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_rek_bank" class="form-control @error('no_rek_bank') is-invalid @enderror" name="no_rek_bank" value="{{ old('no_rek_bank', $siswa->no_rek_bank ?? '') }}" placeholder="Masukkan No Rekening Bank">
            @error('no_rek_bank')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="rek_atas_nama">Rekening Atas Nama</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="rek_atas_nama" class="form-control @error('rek_atas_nama') is-invalid @enderror" name="rek_atas_nama" value="{{ old('rek_atas_nama', $siswa->rek_atas_nama ?? '') }}" placeholder="Masukkan Rekening Atas Nama">
            @error('rek_atas_nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="layak_bantuan">Layak Bantuan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('layak_bantuan') is-invalid @enderror" id="layak_bantuan" name="layak_bantuan">
                    <option value="1" @selected(old('layak_bantuan', $siswa->layak_bantuan ?? '') == '1')>IYA</option>
                    <option value="0" @selected(old('layak_bantuan', $siswa->layak_bantuan ?? '') == '0')>TIDAK</option>
                </select>
                @error('layak_bantuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="id_prgbantuan">Program Bantuan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_prgbantuan') is-invalid @enderror" id="id_prgbantuan" name="id_prgbantuan">
                    <option value="">Pilih Program Bantuan</option>
                    @foreach ($prgbantuan as $prgbtn)
                        <option value="{{ $prgbtn->id }}" @selected(old('id_prgbantuan', $siswa->id_prgbantuan ?? '') == $prgbtn->id)>
                            {{ $prgbtn->prgbantuan }}
                        </option>
                    @endforeach
                </select>
                @error('id_prgbantuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="alasan_layak">Alasan Layak</label>
        </div>
        <div class="col-md-8 mb-2">
            <textarea id="alasan_layak" class="form-control @error('alasan_layak') is-invalid @enderror" name="alasan_layak" placeholder="Masukkan Alasan">{{ old('alasan_layak', $siswa->alasan_layak ?? '') }}</textarea>
            @error('alasan_layak')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="id_kebkhusus">Kebutuhan Khusus</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_kebkhusus') is-invalid @enderror" id="id_kebkhusus" name="id_kebkhusus">
                    <option value="">Pilih Kebutuhan Khusus</option>
                    @foreach ($kebkhusus as $kbkhs)
                        <option value="{{ $kbkhs->id }}" @selected(old('id_kebkhusus', $siswa->id_kebkhusus ?? '') == $kbkhs->id)>
                            {{ $kbkhs->kebkhusus }}
                        </option>
                    @endforeach
                </select>
                @error('id_kebkhusus')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="Stat_siswa">Status Siswa</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="Stat_siswa" class="form-control @error('Stat_siswa') is-invalid @enderror" name="Stat_siswa" value="{{ old('Stat_siswa', $siswa->Stat_siswa ?? '') }}" placeholder="Masukkan Status Siswa">
            @error('Stat_siswa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="pindahan">Pindahan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('pindahan') is-invalid @enderror" id="pindahan" name="pindahan">
                    <option value="1" @selected(old('pindahan', $siswa->pindahan ?? '') == '1')>IYA</option>
                    <option value="0" @selected(old('pindahan', $siswa->pindahan ?? '') == '0')>TIDAK</option>
                </select>
                @error('pindahan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-sm-12 d-flex justify-content-end mt-1">
            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
    </div>
</div>
