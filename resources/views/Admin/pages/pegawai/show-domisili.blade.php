<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Alamat</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->Jalan}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">No Rumah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->No_rumah}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">RT</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->RT}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">RW</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->RW}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Provinsi</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->provinsi->provinsi  ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kabupaten/Kota</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->kabupaten->kabupaten  ?? ''}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Kecamatan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->kecamatan->kecamatan ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kelurahan</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->kelurahan->kelurahan  ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Kode Pos</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->kode_pos}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Lintang</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->lintang}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Bujur</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->bujur}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">No Telepon Rumah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $p->no_telepon}}">
        </div>
    </div>
</div>