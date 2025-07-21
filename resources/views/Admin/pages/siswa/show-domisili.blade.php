<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Alamat</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['Jalan']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">No Rumah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['no_rumah']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">RT</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['RT']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">RW</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['RW']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Dusun</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['dusun'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kelurahan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['kelurahan']['kelurahan']  ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kecamatan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['kecamatan']['kecamatan'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kabupaten/Kota</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['kabupaten']['kabupaten']  ?? ''}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Provinsi</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['provinsi']['provinsi']  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kode Pos</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['kode_pos']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Lintang</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['lintang']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Bujur</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['bujur']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">No Telepon Rumah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['no_telepon']}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Jenis Tinggal</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['jns_tinggal']['jnstinggal'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Transportasi</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['transport']['alat_transport'] ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Jarak ke sekolah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s['jrk_rumah_sekolah']}} km">
        </div>
    </div>
</div>