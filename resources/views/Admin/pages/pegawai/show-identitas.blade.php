<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Nama</label>
                <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                value="{{ $p['nama']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Jenis Kelamin</label>
            @if ($p['jenis_kelamin'] == 'L')
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Laki - laki">
            @else
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Perempuan">
            @endif
        </div>
        @foreach ($dokIdentitas as $kode => $info)
            @php
                $uploaded = $dokumenPegawai->firstWhere('jenis_file', $kode);
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
            <label for="readonlyInput">Tempat Lahir</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['tempat_lahir']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tanggal Lahir</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['tgl_lahir']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nama Ibu Kandung</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
        value="{{ $p['nama_ibu_kandung']}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Agama</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['agama']['nama_agama']  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nomor HP</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['hp']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Email</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['email']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Status Perkawinan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['statkawin']['status_kawin']  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nama Suami/Istri</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['nama_pasangan']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">NIP Suami/Istri</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['nip_pasangan']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pekerjaan Suami/Istri</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['pekerjaan_pasangan']['pekerjaan'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nama Wajib Pajak</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['nama_wajib_pajak']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kewarganegaraan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p['kewarganegaraan']}}">
        </div>
    </div>
</div>