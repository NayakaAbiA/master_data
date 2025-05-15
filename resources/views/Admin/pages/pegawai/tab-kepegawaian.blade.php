<div class="form-body mt-2" id="kepegawaian" role="tabpanel" aria-labelledby="kepegawaian-tab">
    <div class="row">
        <!-- Status Kepegawaian -->
        <div class="col-md-4">
            <label for="id_stat_peg">Status Kepegawaian</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_stat_peg') is-invalid @enderror" id="id_stat_peg" name="id_stat_peg">
                    <option value="">Pilih Status Kepegawaian</option>
                    @foreach ($status_kepegawaian as $stat_peg)
                        <option value="{{ $stat_peg->id }}" @selected(old('id_stat_peg', $pegawai->id_stat_peg ?? '') == $stat_peg->id)>
                            {{ $stat_peg->stat_peg }}
                        </option>
                    @endforeach
                </select>
                @error('id_stat_peg')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Jenis PTK -->
        <div class="col-md-4">
            <label for="id_jns_ptk">Jenis PTK</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_jns_ptk') is-invalid @enderror" id="id_jns_ptk" name="id_jns_ptk">
                    <option value="">Pilih Jenis PTK</option>
                    @foreach ($jenis_ptk as $jnsptk)
                        <option value="{{ $jnsptk->id }}" @selected(old('id_jns_ptk', $pegawai->id_jns_ptk ?? '') == $jnsptk->id)>
                            {{ $jnsptk->jenis_ptk }}
                        </option>
                    @endforeach
                </select>
                @error('id_jns_ptk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Pangkat -->
        <div class="col-md-4">
            <label for="id_pangkat">Pangkat</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_pangkat') is-invalid @enderror" id="id_pangkat" name="id_pangkat">
                    <option value="">Pilih Pangkat</option>
                    @foreach ($pangkat as $pkt)
                        <option value="{{ $pkt->id }}" @selected(old('id_pangkat', $pegawai->id_pangkat ?? '') == $pkt->id)>
                            {{ $pkt->pangkat }}
                        </option>
                    @endforeach
                </select>
                @error('id_pangkat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- SK CPNS -->
        <div class="col-md-4">
            <label for="no_sk_cpns">SK CPNS</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_sk_cpns" class="form-control @error('no_sk_cpns') is-invalid @enderror"
                name="no_sk_cpns" value="{{ old('no_sk_cpns', $pegawai->no_sk_cpns ?? '') }}"
                placeholder="Masukkan SK CPNS">
            @error('no_sk_cpns')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal CPNS -->
        <div class="col-md-4">
            <label for="tgl_sk_cpns">Tanggal CPNS</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="date" id="tgl_sk_cpns" class="form-control @error('tgl_sk_cpns') is-invalid @enderror"
                name="tgl_sk_cpns" value="{{ old('tgl_sk_cpns', $pegawai->tgl_sk_cpns ?? '') }}">
            @error('tgl_sk_cpns')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- No SK Pengangkatan -->
        <div class="col-md-4">
            <label for="no_sk_pengangkatan">No SK Pengangkatan</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_sk_pengangkatan" class="form-control @error('no_sk_pengangkatan') is-invalid @enderror"
                name="no_sk_pengangkatan" value="{{ old('no_sk_pengangkatan', $pegawai->no_sk_pengangkatan ?? '') }}"
                placeholder="Masukkan No SK Pengangkatan">
            @error('no_sk_pengangkatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- TMT Pengangkatan -->
        <div class="col-md-4">
            <label for="tmt_pengangkatan">TMT Pengangkatan</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="date" id="tmt_pengangkatan" class="form-control @error('tmt_pengangkatan') is-invalid @enderror"
                name="tmt_pengangkatan" value="{{ old('tmt_pengangkatan', $pegawai->tmt_pengangkatan ?? '') }}">
            @error('tmt_pengangkatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Lembaga Pengangkatan -->
        <div class="col-md-4">
            <label for="lembaga_pengangkatan">Lembaga Pengangkatan</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="lembaga_pengangkatan" class="form-control @error('lembaga_pengangkatan') is-invalid @enderror"
                name="lembaga_pengangkatan" value="{{ old('lembaga_pengangkatan', $pegawai->lembaga_pengangkatan ?? '') }}"
                placeholder="Masukkan Lembaga Pengangkatan">
            @error('lembaga_pengangkatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- No Kartu Pegawai -->
        <div class="col-md-4">
            <label for="no_karpeg">No Kartu Pegawai</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_karpeg" class="form-control @error('no_karpeg') is-invalid @enderror"
                name="no_karpeg" value="{{ old('no_karpeg', $pegawai->no_karpeg ?? '') }}"
                placeholder="Masukkan No Kartu Pegawai">
            @error('no_karpeg')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- No Karis/Karsu -->
        <div class="col-md-4">
            <label for="no_karis_karsu">No Karis/Karsu</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_karis_karsu" class="form-control @error('no_karis_karsu') is-invalid @enderror"
                name="no_karis_karsu" value="{{ old('no_karis_karsu', $pegawai->no_karis_karsu ?? '') }}"
                placeholder="Masukkan No Karis/Karsu">
            @error('no_karis_karsu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tugas Tambahan -->
        <div class="col-md-4">
            <label for="id_tgstambahan">Tugas Tambahan</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_tgstambahan') is-invalid @enderror" id="id_tgstambahan" name="id_tgstambahan">
                    <option value="">Pilih Tugas Tambahan</option>
                    @foreach ($tugas_tambahan as $tgs_tambahan)
                        <option value="{{ $tgs_tambahan->id }}" @selected(old('id_tgstambahan', $pegawai->id_tgstambahan ?? '') == $tgs_tambahan->id)>
                            {{ $tgs_tambahan->tgs_tambahan }}
                        </option>
                    @endforeach
                </select>
                @error('id_tgstambahan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Sumber Gaji -->
        <div class="col-md-4">
            <label for="id_sumber_gaji">Sumber Gaji</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_sumber_gaji') is-invalid @enderror" id="id_sumber_gaji" name="id_sumber_gaji">
                    <option value="">Pilih Sumber Gaji</option>
                    @foreach ($sumber_gaji as $gaji)
                        <option value="{{ $gaji->id }}" @selected(old('id_sumber_gaji', $pegawai->id_sumber_gaji ?? '') == $gaji->id)>
                            {{ $gaji->sumber_gaji }}
                        </option>
                    @endforeach
                </select>
                @error('id_sumber_gaji')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Nama Bank -->
        <div class="col-md-4">
            <label for="id_bank">Nama Bank</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('id_bank') is-invalid @enderror" id="id_bank" name="id_bank">
                    <option value="">Pilih Bank</option>
                    @foreach ($bank as $bnk)
                        <option value="{{ $bnk->id }}" @selected(old('id_bank', $pegawai->id_bank ?? '') == $bnk->id)>
                            {{ $bnk->nama_bank }}
                        </option>
                    @endforeach
                </select>
                @error('id_bank')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- No Rekening -->
        <div class="col-md-4">
            <label for="no_rek_bank">No Rekening Bank</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="no_rek_bank" class="form-control @error('no_rek_bank') is-invalid @enderror"
                name="no_rek_bank" value="{{ old('no_rek_bank', $pegawai->no_rek_bank ?? '') }}"
                placeholder="Masukkan No Rekening Bank">
            @error('no_rek_bank')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Rekening Atas Nama -->
        <div class="col-md-4">
            <label for="rek_atas_nama">Rekening Atas Nama</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="rek_atas_nama" class="form-control @error('rek_atas_nama') is-invalid @enderror"
                name="rek_atas_nama" value="{{ old('rek_atas_nama', $pegawai->rek_atas_nama ?? '') }}"
                placeholder="Masukkan Rekening Atas Nama">
            @error('rek_atas_nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Lisensi Kepsek -->
        <div class="col-md-4">
            <label for="lisensi_kepsek">Lisensi Kepala Sekolah</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('lisensi_kepsek') is-invalid @enderror" id="lisensi_kepsek" name="lisensi_kepsek">
                    <option value="">Pilih Lisensi</option>
                    <option value="1" @selected(old('lisensi_kepsek', $pegawai->lisensi_kepsek ?? '') == '1')>IYA</option>
                    <option value="0" @selected(old('lisensi_kepsek', $pegawai->lisensi_kepsek ?? '') == '0')>TIDAK</option>
                </select>
                @error('lisensi_kepsek')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- NUKS -->
        <div class="col-md-4">
            <label for="nuks">NUKS</label>
        </div>
        <div class="col-md-8 form-group">
            <input type="text" id="nuks" class="form-control @error('nuks') is-invalid @enderror"
                name="nuks" value="{{ old('nuks', $pegawai->nuks ?? '') }}"
                placeholder="Masukkan NUKS">
            @error('nuks')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Diklat Pengawas -->
        <div class="col-md-4">
            <label for="diklat_pengawas">Diklat Pengawas</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('diklat_pengawas') is-invalid @enderror" id="diklat_pengawas" name="diklat_pengawas">
                    <option value="">Pilih Diklat</option>
                    <option value="1" @selected(old('diklat_pengawas', $pegawai->diklat_pengawas ?? '') == '1')>IYA</option>
                    <option value="0" @selected(old('diklat_pengawas', $pegawai->diklat_pengawas ?? '') == '0')>TIDAK</option>
                </select>
                @error('diklat_pengawas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Keahlian Braille -->
        <div class="col-md-4">
            <label for="keahlian_braille">Keahlian Braille</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('keahlian_braille') is-invalid @enderror" id="keahlian_braille" name="keahlian_braille">
                    <option value="">Pilih</option>
                    <option value="1" @selected(old('keahlian_braille', $pegawai->keahlian_braille ?? '') == '1')>IYA</option>
                    <option value="0" @selected(old('keahlian_braille', $pegawai->keahlian_braille ?? '') == '0')>TIDAK</option>
                </select>
                @error('keahlian_braille')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Keahlian Bahasa Isyarat -->
        <div class="col-md-4">
            <label for="keahlian_bahasa_isyarat">Keahlian Bahasa Isyarat</label>
        </div>
        <div class="col-lg-8">
            <div class="form-group">
                <select class="choices form-select @error('keahlian_bahasa_isyarat') is-invalid @enderror" id="keahlian_bahasa_isyarat" name="keahlian_bahasa_isyarat">
                    <option value="">Pilih</option>
                    <option value="1" @selected(old('keahlian_bahasa_isyarat', $pegawai->keahlian_bahasa_isyarat ?? '') == '1')>IYA</option>
                    <option value="0" @selected(old('keahlian_bahasa_isyarat', $pegawai->keahlian_bahasa_isyarat ?? '') == '0')>TIDAK</option>
                </select>
                @error('keahlian_bahasa_isyarat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="col-sm-12 d-flex justify-content-end mt-1">
            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
    </div>
</div>
