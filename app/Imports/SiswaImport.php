<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Rombel;
use App\Models\Agama;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\JenisTinggal;
use App\Models\Transportasi;
use App\Models\Pendidikan;
use App\Models\Pekerjaan;
use App\Models\Penghasilan;
use App\Models\KrtBantuan;
use App\Models\Bank;
use App\Models\PrgBantuan;
use App\Models\KebKhusus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $id_jur = Jurusan::where('nama_jur', $row['jurusan'] ?? '')->first()?->id;
        $id_rombel = Rombel::where('nama_rombel', $row['rombel'] ?? '')->first()?->id;
        $id_agama = Agama::where('nama_agama', $row['agama'] ?? '')->first()?->id;
        $id_provinsi = Provinsi::where('provinsi', $row['provinsi'] ?? '')->first()?->id;
        $id_kabupaten = Kabupaten::where('kabupaten', $row['kabupaten'] ?? '')->first()?->id;
        $id_kecamatan = Kecamatan::where('kecamatan', $row['kecamatan'] ?? '')->first()?->id;
        $id_kelurahan = Kelurahan::where('kelurahan', $row['kelurahan'] ?? '')->first()?->id;
        $id_jns_tgl = JenisTinggal::where('jnstinggal', $row['jenis_tinggal'] ?? '')->first()?->id;
        $id_transport = Transportasi::where('alat_transport', $row['transportasi'] ?? '')->first()?->id;
        $id_pendidikan_ayah = Pendidikan::where('jenjang_pendidikan', $row['pendidikan_ayah'] ?? '')->first()?->id;
        $id_kerja_ayah = Pekerjaan::where('pekerjaan', $row['pekerjaan_ayah'] ?? '')->first()?->id;
        $id_penghasilan_ayah = Penghasilan::where('penghasilan', $row['penghasilan_ayah'] ?? '')->first()?->id;
        $id_pendidikan_ibu = Pendidikan::where('jenjang_pendidikan', $row['pendidikan_ibu'] ?? '')->first()?->id;
        $id_kerja_ibu = Pekerjaan::where('pekerjaan', $row['pekerjaan_ibu'] ?? '')->first()?->id;
        $id_penghasilan_ibu = Penghasilan::where('penghasilan', $row['penghasilan_ibu'] ?? '')->first()?->id;
        $id_pendidikan_wali = Pendidikan::where('jenjang_pendidikan', $row['pendidikan_wali'] ?? '')->first()?->id;
        $id_kerja_wali = Pekerjaan::where('pekerjaan', $row['pekerjaan_wali'] ?? '')->first()?->id;
        $id_penghasilan_wali = Penghasilan::where('penghasilan', $row['penghasilan_wali'] ?? '')->first()?->id;
        $id_krt_bantuan = KrtBantuan::where('nama_krtbantuan', $row['kartu_bantuan'] ?? '')->first()?->id;
        $id_bank = Bank::where('nama_bank', $row['bank'] ?? '')->first()?->id;
        $id_prgbantuan = PrgBantuan::where('prgbantuan', $row['program_bantuan'] ?? '')->first()?->id;
        $id_kebkhusus = KebKhusus::where('kebkhusus', $row['kebutuhan_khusus'] ?? '')->first()?->id;
    
        return new Siswa([
            //dd($row)
            'nama' => $row['nama'],
            'NIK' => $row['nik'],
            'no_kk' => $row['no_kk'],
            'no_reg_aktlhr' => $row['no_reg_akta_lahir'],
            'nipd' => $row['nipd'],
            'nisn' => $row['nisn'],
            'id_jur' => $id_jur,
            'id_rombel' => $id_rombel,
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tanggal_lahir'],
            'id_agama' => $id_agama,
            'npsn' => $row['npsn'],
            'hp' => $row['hp'],
            'email' => $row['email'],
            'anak_ke' => $row['anak_ke'],
            'jml_saudara_kandung' => $row['jumlah_saudara_kandung'],
            'berat_badan' => $row['berat_badan'],
            'tinggi_badan' => $row['tinggi_badan'],
            'lingkar_kepala' => $row['lingkar_kepala'],
            'kewarganegaraan' => $row['kewarganegaraan'],
            'Jalan' => $row['jalan'],
            'no_rumah' => $row['no_rumah'],
            'RT' => $row['rt'],
            'RW' => $row['rw'],
            'id_provinsi' => $id_provinsi,
            'id_kabupaten' => $id_kabupaten,
            'id_kecamatan' => $id_kecamatan,
            'id_kelurahan' => $id_kelurahan,
            'kode_pos' => $row['kode_pos'],
            'lintang' => $row['lintang'],
            'bujur' => $row['bujur'],
            'no_telepon' => $row['no_telepon'],
            'id_jns_tgl' => $id_jns_tgl,
            'id_transport' => $id_transport,
            'jrk_rumah_sekolah' => $row['jarak_rumah_sekolah'],
            'nama_ayah' => $row['nama_ayah'],
            'nik_ayah' => $row['nik_ayah'],
            'thn_lahir_ayah' => $row['tahun_lahir_ayah'],
            'id_pendidikan_ayah' => $id_pendidikan_ayah,
            'id_kerja_ayah' => $id_kerja_ayah,
            'id_penghasilan_ayah' => $id_penghasilan_ayah,
            'nama_ibu' => $row['nama_ibu'],
            'nik_ibu' => $row['nik_ibu'],
            'thn_lahir_ibu' => $row['tahun_lahir_ibu'],
            'id_pendidikan_ibu' => $id_pendidikan_ibu,
            'id_kerja_ibu' => $id_kerja_ibu,
            'id_penghasilan_ibu' => $id_penghasilan_ibu,
            'nama_wali' => $row['nama_wali'],
            'nik_wali' => $row['nik_wali'],
            'thn_lahir_wali' => $row['tahun_lahir_wali'],
            'id_pendidikan_wali' => $id_pendidikan_wali,
            'id_kerja_wali' => $id_kerja_wali,
            'id_penghasilan_wali' => $id_penghasilan_wali,
            'no_skhun' => $row['no_skhun'],
            'nopes_un' => $row['nopes_un'],
            'no_seri_ijazah' => $row['no_seri_ijazah'],
            'id_krt_bantuan' => $id_krt_bantuan,
            'nama_pada_kartu' => $row['nama_pada_kartu'],
            'id_bank' => $id_bank,
            'no_rek_bank' => $row['no_rekening_bank'],
            'rek_atas_nama' => $row['rekening_atas_nama'],
            'layak_bantuan' => strtolower((string)$row['layak_bantuan']) === 'iya' ? 1 : 0,
            'id_prgbantuan' => $id_prgbantuan,
            'alasan_layak' => $row['alasan_layak'],
            'id_kebkhusus' => $id_kebkhusus,
            'Stat_siswa' => $row['status_siswa'],
            'pindahan' => strtolower((string)$row['pindahan']) === 'iya' ? 1 : 0,
        ]);
    }

    public function rules(): array
    {
        return [
            'nama' => ['sometimes', 'required'],
            'nik' => ['sometimes', 'required'],
            'no_kk' => ['sometimes', 'required'],
            'nipd' => ['sometimes', 'required'],
            'nisn' => ['sometimes', 'required'],
            'tempat_lahir' => ['sometimes', 'required'],
            'tgl_lahir' => ['sometimes', 'required'],
            'hp' => ['sometimes', 'required'],
            'email' => ['sometimes', 'required'],
            'anak_ke' => ['sometimes', 'required'],
            'berat_badan' => ['sometimes', 'required'],
            'tinggi_badan' => ['sometimes', 'required'],
            'lingkar_kepala' => ['sometimes', 'required'],
            'kewarganegaraan' => ['sometimes', 'required'],
            'jalan' => ['sometimes', 'required'],
            'no_rumah' => ['sometimes', 'required'],
            'rt' => ['sometimes', 'required'],
            'rw' => ['sometimes', 'required'],
            'kode_pos' => ['sometimes', 'required'],
            'jrk_rumah_sekolah' => ['sometimes', 'required'],
            'nama_ayah' => ['sometimes', 'required'],
            'nik_ayah' => ['sometimes', 'required'],
            'thn_lahir_ayah' => ['sometimes', 'required'],
            'nama_ibu' => ['sometimes', 'required'],
            'nik_ibu' => ['sometimes', 'required'],
            'thn_lahir_ibu' => ['sometimes', 'required'],
            'nopes_un' => ['sometimes', 'required'],
            'nama_pada_kartu' => ['sometimes', 'required'],
            'layak_bantuan' => ['sometimes', 'required'],
            'alasan_layak' => ['sometimes', 'required'],
            'stat_siswa' => ['sometimes', 'required'],
            'pindahan' => ['sometimes', 'required'],
        ];
    }
}
