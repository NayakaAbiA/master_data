<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">No Peserta UN</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['nopes_un']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">No Seri Ijazah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['no_seri_ijazah']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kartu Bantuan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['krt_bantuan']['nama_krtbantuan'] ?? ''}}">
        </div>
        @foreach ($dokLainnya as $kode => $info)
            @php
                $uploaded = $dokumenSiswa->firstWhere('jenis_file', $kode);
            @endphp
            <div class="form-group">
                <label>{{ $info['label'] }}</label>
                <div class="input-group">
                    <input type="text" class="form-control" readonly value="{{ $info['value'] }}">
                    @if($uploaded)
                    <button type="button" class="btn-sm">
                        <a href="{{ asset('storage/' . $uploaded->path) }}" target="_blank">
                            <i class="bi bi-eye"></i>
                        </a>
                    </button>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="form-group">
            <label for="readonlyInput">Nama Pada Kartu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['nama_pada_kartu']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nama Bank</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['bank']['nama_bank'] ?? ''}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">No Rekening Bank</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['no_rek_bank']}}">
        </div>
    <div class="form-group">
            <label for="readonlyInput">Rekening Atas Nama</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['rek_atas_nama']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Layak Bantuan</label>
            @if ($s['layak_bantuan'] == '1')
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Ya">
            @else
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Tidak">
            @endif
        </div>
        <div class="form-group">
            <label for="readonlyInput">Program Bantuan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['prgbantuan']['prgbantuan'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Alasan Layak</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['alasan_layak']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kebutuhan Khusus</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['kebkhusus']['kebkhusus'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Sekolah Asal</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['sklasal']['nama_sekolah'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Status Siswa</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['Stat_siswa']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pindahan</label>
            @if ($s['pindahan'] == '1')
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Ya">
            @else
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Tidak">
            @endif
        </div>
    </div>
</div>