<div class="form-body mt-2"  id="kepegawaian" role="tabpanel" aria-labelledby="kepegawaian-tab">
    <div class="row">
        <div class="col-md-4">
            <label for="first-name-horizontal">Status Kepegawaian</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_stat_peg') is-invalid @enderror" id="id_stat_peg" name="id_stat_peg" data-placeholder="Pilih id_stat_peg">
                    <option value="">Pilih Status Kepegawaian</option>
                    @foreach ($status_kepegawaian as $stat_peg)
                    <option value="{{ $stat_peg->id }}" @selected(($pegawai->id_stat_peg ?? '') == $stat_peg->id)>{{ $stat_peg->stat_peg }}
                    @endforeach
                </option>
                </select>
                @error('id_stat_peg')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Jenis PTK</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_jns_ptk') is-invalid @enderror" id="id_jns_ptk" name="id_jns_ptk" data-placeholder="Pilih id_jns_ptk">
                    <option value="">Pilih Jenis PTK</option>
                    @foreach ($jenis_ptk as $jnsptk)
                    <option value="{{ $jnsptk->id }}" @selected(($pegawai->id_jns_ptk ?? '') == $jnsptk->id)>{{ $jnsptk->jenis_ptk }}
                    @endforeach
                </option>
                </select>
                @error('id_jns_ptk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Pangkat</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pangkat') is-invalid @enderror" id="id_pangkat" name="id_pangkat" data-placeholder="Pilih id_pangkat">
                    <option value="">Pilih Pangkat</option>
                    @foreach ($pangkat as $pkt)
                    <option value="{{ $pkt->id }}" @selected(($pegawai->id_pangkat ?? '') == $pkt->id)>{{ $pkt->pangkat }}
                    @endforeach
                </option>
                </select>
                @error('id_pangkat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">SK CPNS</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_sk_cpns" class="form-control @error('no_sk_cpns') is-invalid @enderror" name="no_sk_cpns" value="{{ $pegawai->no_sk_cpns ?? '' }}"
                placeholder="Masukkan SK CPNS">
            @error('no_sk_cpns')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Tanggal CPNS</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="tgl_sk_cpns" class="form-control @error('tgl_sk_cpns') is-invalid @enderror" name="tgl_sk_cpns" value="{{ $pegawai->tgl_sk_cpns ?? '' }}"
                placeholder="Masukkan Tanggal CPNS">
            @error('tgl_sk_cpns')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">No SK Pengangkatan</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_sk_pengangkatan" class="form-control @error('no_sk_pengangkatan') is-invalid @enderror" name="no_sk_pengangkatan" value="{{ $pegawai->no_sk_pengangkatan ?? '' }}"
                placeholder="Masukkan No SK Pengangkatan">
            @error('no_sk_pengangkatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">TMT Pengangkatan</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="tmt_pengangkatan" class="form-control @error('tmt_pengangkatan') is-invalid @enderror" name="tmt_pengangkatan" value="{{ $pegawai->tmt_pengangkatan ?? '' }}"
                placeholder="Masukkan TMT Pengangkatan">
            @error('tmt_pengangkatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Lembaga Pengangkatan</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="lembaga_pengangkatan" class="form-control @error('lembaga_pengangkatan') is-invalid @enderror" name="lembaga_pengangkatan" value="{{ $pegawai->lembaga_pengangkatan ?? '' }}"
                placeholder="Masukkan Lembaga Pengangkatan">
            @error('lembaga_pengangkatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">No Kartu Pegawai</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_karpeg" class="form-control @error('no_karpeg') is-invalid @enderror" name="no_karpeg" value="{{ $pegawai->no_karpeg ?? '' }}"
                placeholder="Masukkan No Kartu Pegawai">
            @error('no_karpeg')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">No Karis/Karsu</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_karis_karsu" class="form-control @error('no_karis_karsu') is-invalid @enderror" name="no_karis_karsu" value="{{ $pegawai->no_karis_karsu ?? '' }}"
                placeholder="Masukkan No Karis/Karsu">
            @error('no_karis_karsu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Tugas Tambahan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_tgstambahan') is-invalid @enderror" id="id_tgstambahan" name="id_tgstambahan" data-placeholder="Pilih id_tgstambahan">
                    <option value="">Pilih Tugas Tambahan</option>
                    @foreach ($tugas_tambahan as $tgs_tambahan)
                    <option value="{{ $tgs_tambahan->id }}" @selected(($pegawai->id_tgstambahan ?? '') == $tgs_tambahan->id)>{{ $tgs_tambahan->tgs_tambahan }}
                    @endforeach
                </option>
                </select>
                @error('id_tgstambahan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Sumber Gaji</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_sumber_gaji') is-invalid @enderror" id="id_sumber_gaji" name="id_sumber_gaji" data-placeholder="Pilih id_sumber_gaji">
                    <option value="">Pilih Sumber Gaji</option>
                    @foreach ($sumber_gaji as $gaji)
                    <option value="{{ $gaji->id }}" @selected(($pegawai->id_sumber_gaji ?? '') == $gaji->id)>{{ $gaji->sumber_gaji }}
                    @endforeach
                </option>
                </select>
                @error('id_sumber_gaji')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Nama Bank</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_bank') is-invalid @enderror" id="id_bank" name="id_bank" data-placeholder="Pilih id_bank">
                    <option value="">Pilih Bank</option>
                    @foreach ($bank as $bnk)
                    <option value="{{ $bnk->id }}" @selected(($pegawai->id_sumber_bnk ?? '') == $bnk->id)>{{ $bnk->nama_bank }}
                    @endforeach
                </option>
                </select>
                @error('id_bank')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">No Rekening Bank</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_rek_bank" class="form-control @error('no_rek_bank') is-invalid @enderror" name="no_rek_bank" value="{{ $pegawai->no_rek_bank ?? '' }}"
                placeholder="Masukkan No Rekening Bank">
            @error('no_rek_bank')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Rekening Atas Nama</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="rek_atas_nama" class="form-control @error('rek_atas_nama') is-invalid @enderror" name="rek_atas_nama" value="{{ $pegawai->rek_atas_nama ?? '' }}"
                placeholder="Masukkan Rekening Atas Nama">
            @error('rek_atas_nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Lisensi Kepala Sekolah</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('lisensi_kepsek') is-invalid @enderror" id="lisensi_kepsek" name="lisensi_kepsek" data-placeholder="Pilih lisensi_kepsek">
                <option value="1" @selected(($pegawai->lisensi_kepsek ?? '') == '1')>IYA</option>
                <option value="0" @selected(($pegawai->lisensi_kepsek ?? '') == '0')>TIDAK</option>
                </select>
                @error('lisensi_kepsek')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">NUKS</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nuks" class="form-control @error('nuks') is-invalid @enderror" name="nuks" value="{{ $pegawai->nuks ?? '' }}"
                placeholder="Masukkan NUKS">
            @error('nuks')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Diklat Pengawas</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('diklat_pengawas') is-invalid @enderror" id="diklat_pengawas" name="diklat_pengawas" data-placeholder="Pilih diklat_pengawas">
                <option value="1" @selected(($pegawai->diklat_pengawas ?? '') == '1')>IYA</option>
                <option value="0" @selected(($pegawai->diklat_pengawas ?? '') == '0')>TIDAK</option>
                </select>
                @error('diklat_pengawas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Keahlian Braille</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('keahlian_braille') is-invalid @enderror" id="keahlian_braille" name="keahlian_braille" data-placeholder="Pilih keahlian_braille">
                <option value="1" @selected(($pegawai->keahlian_braille ?? '') == '1')>IYA</option>
                <option value="0" @selected(($pegawai->keahlian_braille ?? '') == '0')>TIDAK</option>
                </select>
                @error('keahlian_braille')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="first-name-horizontal">Keahlian Bahasa Isyarat</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('keahlian_bahasa_isyarat') is-invalid @enderror" id="keahlian_bahasa_isyarat" name="keahlian_bahasa_isyarat" data-placeholder="Pilih keahlian_bahasa_isyarat">
                <option value="1" @selected(($pegawai->keahlian_bahasa_isyarat ?? '') == '1')>IYA</option>
                <option value="0" @selected(($pegawai->keahlian_bahasa_isyarat ?? '') == '0')>TIDAK</option>
                </select>
                @error('keahlian_bahasa_isyarat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <!-- <div class="mb-3">
            <button type="button" class="btn btn-primary d-flex justify-content-end" onclick="document.querySelector('#domisili-tab').click()" aria-selected="false">Kembali</button>
        </div> -->
        <div class="col-sm-12 d-flex justify-content-end mt-1">
            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
    </div>
</div>