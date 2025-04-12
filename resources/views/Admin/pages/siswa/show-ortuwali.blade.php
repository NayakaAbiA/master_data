<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="readonlyInput">Nama Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->nama_ayah}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">NIK Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->nik_ayah}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tahun Lahir Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->thn_lahir_ayah}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pendidikan Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->pendidikanAyah->jenjang_pendidikan ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pekerjaan Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->pekerjaanAyah->pekerjaan ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Penghasilan Ayah</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->penghasilanAyah->penghasilan ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nama Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->nama_ibu}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">NIK Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->nik_ibu}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tahun Lahir Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->thn_lahir_ibu}}">
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
            <label for="readonlyInput">Pendidikan Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->pendidikanIbu->jenjang_pendidikan ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pekerjaan Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->pekerjaanIbu->pekerjaan ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Penghasilan Ibu</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->penghasilanIbu->penghasilan ?? ''}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Nama Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->nama_wali}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">NIK Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->nik_wali}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Tahun Lahir Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->thn_lahir_wali}}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pendidikan Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->pendidikanWali->jenjang_pendidikan ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Pekerjaan Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->pekerjaanWali->pekerjaan ?? '' }}">
        </div>
        <div class="form-group">
            <label for="readonlyInput">Penghasilan Wali</label>
            <input type="text" class="form-control" id="readonlyInput" readonly="readonly"
            value="{{ $s->penghasilanWali->penghasilan ?? ''}}">
        </div>
    </div>
</div>