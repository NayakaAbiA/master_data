<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'tb_ptk';

    protected $guarded = [];

    //fungsi one to one ke model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id', 'id_ptk_kakom');
    }

    //fungsi one to one ke model Rombel
    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'id', 'id_ptk_walas');
    }

    //fungsi one to one ke model StatPegawai
    public function statpegawai()
    {
        return $this->belongsTo(StatPegawai::class, 'id_stat_peg', 'id');
    }

    //fungsi one to one ke model Agama
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama', 'id');
    }

    //fungsi one to one ke model StatKawin
    public function statkawin()
    {
        return $this->belongsTo(StatKawin::class, 'id_statkawin', 'id');
    }

    //fungsi one to one ke model Pekerjaan
    public function pekerjaan_pasangan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan_pasangan', 'id');
    }

    //fungsi one to one ke model Provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    //fungsi one to one ke model Kabupaten
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten', 'id');
    }

    //fungsi one to one ke model Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    //fungsi one to one ke model Kelurahan
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }

    //fungsi one to one ke model JenisPTK
    public function jns_ptk()
    {
        return $this->belongsTo(JenisPTK::class, 'id_jns_ptk', 'id');
    }
    
    //fungsi one to one ke model Pangkat
    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class, 'id_pangkat', 'id');
    }

    //fungsi one to one ke model TgsTambahan
    public function tgstambahan()
    {
        return $this->belongsTo(TgsTambahan::class, 'id_tgstambahan', 'id');
    }

    //fungsi one to one ke model SumberGaji
    public function sumber_gaji()
    {
        return $this->belongsTo(SumberGaji::class, 'id_sumber_gaji', 'id');
    }

    //fungsi one to one ke model Bank
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id');
    }
    
}
