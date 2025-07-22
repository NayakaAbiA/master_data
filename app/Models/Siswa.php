<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'tb_siswa';
    protected $guarded = [];

    //fungsi one to one ke model Agama
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama', 'id');
    }
    //fungsi one to one ke model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jur', 'id');
    }
    //fungsi one to one ke model Rombel
    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'id_rombel', 'id');
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
    //fungsi one to one ke model JenisTinggal
    public function jns_tinggal()
    {
        return $this->belongsTo(JenisTinggal::class, 'id_jns_tgl', 'id');
    }
    //fungsi one to one ke model Transportasi
    public function transport()
    {
        return $this->belongsTo(Transportasi::class, 'id_transport', 'id');
    }
    //fungsi one to one ke model Pendidikan
    public function pendidikanAyah()
    {
        return $this->belongsTo(Pendidikan::class,  'id_pendidikan_ayah', 'id');
    }
    //fungsi one to one ke model Pendidikan
    public function pendidikanIbu()
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan_ibu',  'id');
    }
    //fungsi one to one ke model Pendidikan
    public function pendidikanWali()
    {
        return $this->belongsTo(Pendidikan::class,  'id_pendidikan_wali', 'id');
    }
    //fungsi one to one ke model Pekerjaan
    public function pekerjaanAyah()
    {
        return $this->belongsTo(Pekerjaan::class,  'id_kerja_ayah', 'id');
    }
    //fungsi one to one ke model Pekerjaan
    public function pekerjaanIbu()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_kerja_ibu',  'id');
    }
    //fungsi one to one ke model Pekerjaan
    public function pekerjaanWali()
    {
        return $this->belongsTo(Pekerjaan::class,  'id_kerja_wali', 'id');
    }
     //fungsi one to one ke model Penghasilan
     public function penghasilanAyah()
     {
         return $this->belongsTo(Penghasilan::class,  'id_penghasilan_ayah', 'id');
     }
     //fungsi one to one ke model Penghasilan
     public function penghasilanIbu()
     {
         return $this->belongsTo(Penghasilan::class, 'id_penghasilan_ibu',  'id');
     }
     //fungsi one to one ke model Penghasilan
     public function penghasilanWali()
     {
         return $this->belongsTo(Penghasilan::class,  'id_penghasilan_wali', 'id');
     }
    //fungsi one to one ke model KrtBantuan
    public function krt_bantuan()
    {
        return $this->belongsTo(KrtBantuan::class, 'id_krt_bantuan', 'id');
    }
    public function nokip()
    {
        return $this->belongsTo(KrtBantuan::class, 'id_krt_bantuan_kip', 'id');
    }
    public function nokps()
    {
        return $this->belongsTo(KrtBantuan::class, 'id_krt_bantuan_kps', 'id');
    }
    public function nokks()
    {
        return $this->belongsTo(KrtBantuan::class, 'id_krt_bantuan_kks', 'id');
    }
    //fungsi one to one ke model Bank
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id');
    }
    //fungsi one to one ke model PrgBantuan
    public function prgbantuan()
    {
        return $this->belongsTo(PrgBantuan::class, 'id_prgbantuan', 'id');
    }
    //fungsi one to one ke model KebKhusus
    public function kebkhusus()
    {
        return $this->belongsTo(KebKhusus::class, 'id_kebkhusus', 'id');
    }
    public function sklasal()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah_asal', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'siswa_id');
    }

}
