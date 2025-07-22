<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Nama Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['nama_ayah']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">NIK Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['nik_ayah']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tahun Lahir Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['thn_lahir_ayah']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pendidikan Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['pendidikan_ayah']['jenjang_pendidikan'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pekerjaan Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['pekerjaan_ayah']['pekerjaan'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Penghasilan Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['penghasilan_ayah']['penghasilan'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nama Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['nama_ibu']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">NIK Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['nik_ibu']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tahun Lahir Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['thn_lahir_ibu']}}">
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
            <label for="readonlyInput">Pendidikan Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['pendidikan_ibu']['jenjang_pendidikan'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pekerjaan Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['pekerjaan_ibu']['pekerjaan'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Penghasilan Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['penghasilan_ibu']['penghasilan'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nama Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['nama_wali']}}">
        </div>
            @php
                $uploaded = $dokumenSiswa->firstWhere('jenis_file', 'NIK Wali');
            @endphp
            <div class="form-group">
                <label>NIK Wali</label>
                <div class="input-group">
                    <input type="text" class="form-control" readonly value="{{ $s['nik_wali']}}">
                    @if($uploaded)
                    <button type="button" class="btn-sm">
                        <a href="{{ asset('storage/' . $uploaded->path) }}" target="_blank">
                            <i class="bi bi-eye"></i>
                        </a>
                    </button>
                    @endif
                </div>
            </div>
        <div class="form-group">
            <label for="readonlyInput">Tahun Lahir Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['thn_lahir_wali']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pendidikan Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['pendidikan_wali']['jenjang_pendidikan'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pekerjaan Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['pekerjaan_wali']['pekerjaan'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Penghasilan Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['penghasilan_wali']['penghasilan'] ?? ''}}">
        </div>
    </div>
</div>