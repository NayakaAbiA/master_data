<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Status Kepegawaian</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->statpegawai->stat_peg  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Jenis PTK</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->jns_ptk->jenis_ptk  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pangkat</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->pangkat->pangkat  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">SK CPNS</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->no_sk_cpns}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tanggal CPNS</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->tgl_sk_cpns}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">No SK Pengangkatan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->no_sk_pengangkatan}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">TMT Pengangkatan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->tmt_pengangkatan}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Lembaga Pengangkatan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->lembaga_pengangkatan}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">No Kartu Pegawai</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->no_karpeg}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">No Karis/Karsu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->no_karis_karsu}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Tugas Tambahan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->tgstambahan->tgs_tambahan  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Sumber Gaji</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->sumber_gaji->sumber_gaji  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nama Bank</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->bank->nama_bank  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">No Rekening Bank</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->no_rek_bank  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Rekening Atas Nama</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->rek_atas_nama}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Lisensi Kepala Sekolah</label>
            @if ($p->lisensi_kepsek == '1')
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Ya">
            @else
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Tidak">
            @endif
        </div>
        <div class="form-group">
            <label for="readonlyInput">NUKS</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->nuks}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Diklat Pengawas</label>
            @if ($p->diklat_pengawas == '1')
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Ya">
            @else
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Tidak">
            @endif
        </div>
        <div class="form-group">
            <label for="readonlyInput">Keahlian Braille</label>
            @if ($p->keahlian_braille == '1')
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Ya">
            @else
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Tidak">
            @endif
        </div>
        <div class="form-group">
            <label for="readonlyInput">Keahlian Bahasa Isyarat</label>
            @if ($p->keahlian_bahasa_isyarat == '1')
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Ya">
            @else
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Tidak">
            @endif
        </div>
    </div>
</div>