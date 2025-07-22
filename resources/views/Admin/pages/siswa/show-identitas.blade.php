<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Nama</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['nama']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Jenis Kelamin</label>
            @if ($s['jenis_kelamin'] == 'L')
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Laki - laki">
            @else
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="Perempuan">
            @endif
        </div>
        <div class="form-group">
            <label for="readonlyInput">NIK</label>
                <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
                value="{{ $s['NIK']}}">
        </div>
        @foreach ($dokIdentitas as $kode => $info)
            @php
                $uploaded = $dokumenSiswa->firstWhere('jenis_file', $kode);
            @endphp
            <div class="form-group">
                <label>{{ $info['label'] }}</label>
                <div class="input-group">
                    <input type="text" class="form-control" readonly value="{{ $info['value'] }}">
                    @if($uploaded)
                    <button type="button" class="btn-sm btn-primary">
                        <a href="{{ asset('storage/' . $uploaded->path) }}" target="_blank">
                            <i class="bi bi-eye"></i>
                        </a>
                    </button>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="form-group">
            <label for="readonlyInput">NISN</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['nisn']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Jurusan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['jurusan']['nama_jur'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Rombel</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['rombel']['nama_rombel']  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tempat Lahir</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['tempat_lahir']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tanggal Lahir</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['tgl_lahir']}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Agama</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['agama']['nama_agama']  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">NPSN</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['npsn']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nomor HP</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['hp']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Email</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['email']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Anak ke</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['anak_ke']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Jumlah Saudara Kandung</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['jml_saudara_kandung']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Berat Badan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['berat_badan']}} kg">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tinggi Badan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['tinggi_badan']}} cm">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Lingkar Kepala</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['lingkar_kepala']}} cm">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kewarganegaraan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['kewarganegaraan']}}">
        </div>
    </div>
</div>