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
use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SiswaImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithMultipleSheets
{
    use SkipsFailures;

    public function sheets(): array
    {
        return [
            0 => $this, // hanya proses sheet ke-0 (pertama)
        ];
    }

    public function model(array $row)
    {
        //dd($row);
        
        $id_jur = Jurusan::where('nama_jur', $row['jurusan'] ?? '')->first();
        $id_rombel = Rombel::where('nama_rombel', $row['rombel'] ?? '')->first();
        $id_agama = Agama::where('nama_agama', $row['agama'] ?? '')->first();
        $id_provinsi = Provinsi::where('provinsi', $row['provinsi'] ?? '')->first();
        $id_kabupaten = Kabupaten::where('kabupaten', $row['kabupaten'] ?? '')->first();
        $id_kecamatan = Kecamatan::where('kecamatan', $row['kecamatan'] ?? '')->first();
        $id_kelurahan = Kelurahan::where('kelurahan', $row['kelurahan'] ?? '')->first();
        $id_jns_tgl = JenisTinggal::where('jnstinggal', $row['jenis_tinggal'] ?? '')->first();
        $id_transport = Transportasi::where('alat_transport', $row['transportasi'] ?? '')->first();
        $id_pendidikan_ayah = Pendidikan::where('jenjang_pendidikan', $row['pendidikan_ayah'] ?? '')->first();
        $id_kerja_ayah = Pekerjaan::where('pekerjaan', $row['pekerjaan_ayah'] ?? '')->first();
        $id_penghasilan_ayah = Penghasilan::where('penghasilan', $row['penghasilan_ayah'] ?? '')->first();
        $id_pendidikan_ibu = Pendidikan::where('jenjang_pendidikan', $row['pendidikan_ibu'] ?? '')->first();
        $id_kerja_ibu = Pekerjaan::where('pekerjaan', $row['pekerjaan_ibu'] ?? '')->first();
        $id_penghasilan_ibu = Penghasilan::where('penghasilan', $row['penghasilan_ibu'] ?? '')->first();
        $id_pendidikan_wali = Pendidikan::where('jenjang_pendidikan', $row['pendidikan_wali'] ?? '')->first();
        $id_kerja_wali = Pekerjaan::where('pekerjaan', $row['pekerjaan_wali'] ?? '')->first();
        $id_penghasilan_wali = Penghasilan::where('penghasilan', $row['penghasilan_wali'] ?? '')->first();
        $id_krt_bantuan = KrtBantuan::where('nama_krtbantuan', $row['kartu_bantuan'] ?? '')->first();
        $id_krt_bantuan_kip = KrtBantuan::where('no_krtbantuan', $row['no_kip'] ?? '')->first();
        $id_krt_bantuan_kps = KrtBantuan::where('no_krtbantuan', $row['no_kps'] ?? '')->first();
        $id_krt_bantuan_kks = KrtBantuan::where('no_krtbantuan', $row['no_kks'] ?? '')->first();
        $id_bank = Bank::where('nama_bank', $row['bank'] ?? '')->first();
        $id_prgbantuan = PrgBantuan::where('prgbantuan', $row['program_bantuan'] ?? '')->first();
        $id_kebkhusus = KebKhusus::where('kebkhusus', $row['kebutuhan_khusus'] ?? '')->first();
        $id_sekolah_asal = Sekolah::where('nama_sekolah', $row['sekolah_asal'] ?? '')->first();
    
        return new Siswa([
            //dd($row)
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'NIK' => $row['nik'],
            'no_kk' => $row['no_kk'],
            'no_reg_aktlhr' => $row['no_reg_akta_lahir'],
            'nipd' => $row['nipd'],
            'nisn' => $row['nisn'],
            'id_jur' => $id_jur?->id,
            'id_rombel' => $id_rombel?->id,
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tanggal_lahir'],
            'id_agama' => $id_agama?->id,
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
            'dusun' => $row['dusun'],
            'id_provinsi' => $id_provinsi?->id,
            'id_kabupaten' => $id_kabupaten?->id,
            'id_kecamatan' => $id_kecamatan?->id,
            'id_kelurahan' => $id_kelurahan?->id,
            'kode_pos' => $row['kode_pos'],
            'lintang' => $row['lintang'],
            'bujur' => $row['bujur'],
            'no_telepon' => $row['no_telepon'],
            'id_jns_tgl' => $id_jns_tgl?->id,
            'id_transport' => $id_transport?->id,
            'jrk_rumah_sekolah' => $row['jarak_rumah_sekolah'],
            'nama_ayah' => $row['nama_ayah'],
            'nik_ayah' => $row['nik_ayah'],
            'thn_lahir_ayah' => $row['tahun_lahir_ayah'],
            'id_pendidikan_ayah' => $id_pendidikan_ayah?->id,
            'id_kerja_ayah' => $id_kerja_ayah?->id,
            'id_penghasilan_ayah' => $id_penghasilan_ayah?->id,
            'nama_ibu' => $row['nama_ibu'],
            'nik_ibu' => $row['nik_ibu'],
            'thn_lahir_ibu' => $row['tahun_lahir_ibu'],
            'id_pendidikan_ibu' => $id_pendidikan_ibu?->id,
            'id_kerja_ibu' => $id_kerja_ibu?->id,
            'id_penghasilan_ibu' => $id_penghasilan_ibu?->id,
            'nama_wali' => $row['nama_wali'],
            'nik_wali' => $row['nik_wali'],
            'thn_lahir_wali' => $row['tahun_lahir_wali'],
            'id_pendidikan_wali' => $id_pendidikan_wali?->id,
            'id_kerja_wali' => $id_kerja_wali?->id,
            'id_penghasilan_wali' => $id_penghasilan_wali?->id,
            'no_skhun' => $row['no_skhun'],
            'nopes_un' => $row['nopes_un'],
            'no_seri_ijazah' => $row['no_seri_ijazah'],
            'id_krt_bantuan' => $id_krt_bantuan?->id,
            'id_krt_bantuan_kip' => $id_krt_bantuan_kip?->id,
            'id_krt_bantuan_kps' => $id_krt_bantuan_kps?->id,
            'id_krt_bantuan_kks' => $id_krt_bantuan_kks?->id,
            'nama_pada_kartu' => $row['nama_pada_kartu'],
            'id_bank' => $id_bank?->id,
            'no_rek_bank' => $row['no_rekening_bank'],
            'rek_atas_nama' => $row['rekening_atas_nama'],
            'layak_bantuan' => strtolower((string)$row['layak_bantuan']) === 'ya' ? 1 : 0,
            'id_prgbantuan' => $id_prgbantuan?->id,
            'alasan_layak' => $row['alasan_layak'],
            'id_kebkhusus' => $id_kebkhusus?->id,
            'id_sekolah_asal' => $id_sekolah_asal?->id,
            'Stat_siswa' => $row['status_siswa'],
            'pindahan' => strtolower((string)$row['pindahan']) === 'ya' ? 1 : 0,
        ]);
    }

    public function rules(): array
{
    return [
        'nama' => ['sometimes', 'required', 'string', 'max:100'],
        'nik' => ['sometimes', 'required', 'digits:16', 'unique:tb_siswa,nik'],
        'jenis_kelamin' => ['sometimes', 'required', 'string', 'max:10'],
        'no_kk' => ['sometimes', 'required', 'digits:16'],
        'no_reg_akta_lahir' => ['sometimes', 'nullable', 'string', 'max:25'],
        'nipd' => ['sometimes', 'required', 'string', 'max:10', 'unique:tb_siswa,nipd'],
        'nisn' => ['sometimes', 'required', 'max:11', 'unique:tb_siswa,nisn'],
        'tempat_lahir' => ['sometimes', 'required', 'string', 'max:30'],
        'tanggal_lahir' => ['sometimes', 'required', 'date'],
        'npsn' => ['sometimes', 'nullable', 'string', 'max:12'],
        'rombel' => ['sometimes', 'required', 'string', 'exists:tb_rombel,nama_rombel'],
        'hp' => ['sometimes', 'required', 'string', 'max:15'],
        'email' => ['sometimes', 'required', 'email', 'max:50', 'unique:tb_siswa,email'],
        'anak_ke' => ['sometimes', 'required', 'integer', 'min:1'],
        'jumlah_saudara_kandung' => ['sometimes', 'nullable', 'integer', 'min:0'],
        'berat_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
        'tinggi_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
        'lingkar_kepala' => ['sometimes', 'required', 'numeric', 'min:1'],
        'kewarganegaraan' => ['sometimes', 'required', 'string', 'max:25'],
        'jalan' => ['sometimes', 'required', 'string', 'max:40'],
        'no_rumah' => ['sometimes', 'required', 'string', 'max:4'],
        'rt' => ['sometimes', 'required', 'string', 'max:4'],
        'rw' => ['sometimes', 'required', 'string', 'max:4'],
        'dusun' => ['sometimes', 'required', 'string'],
        'kode_pos' => ['sometimes', 'required', 'digits:5'],
        'lintang' => ['sometimes', 'nullable', 'string', 'max:50'],
        'bujur' => ['sometimes', 'nullable', 'string', 'max:50'],
        'no_telepon' => ['sometimes', 'nullable', 'string', 'max:15'],
        'jarak_rumah_sekolah' => ['sometimes', 'required', 'numeric', 'min:0'],
        'nama_ayah' => ['sometimes', 'required', 'string', 'max:100'],
        'nik_ayah' => ['sometimes', 'required', 'digits:16'],
        'tahun_lahir_ayah' => ['sometimes', 'required', 'digits:4'],
        'nama_ibu' => ['sometimes', 'required', 'string', 'max:100'],
        'nik_ibu' => ['sometimes', 'required', 'digits:16'],
        'tahun_lahir_ibu' => ['sometimes', 'required', 'digits:4'],
        'nama_wali' => ['sometimes', 'nullable', 'string', 'max:100'],
        'nik_wali' => ['sometimes', 'nullable', 'digits:16'],
        'tahun_lahir_wali' => ['sometimes', 'nullable', 'digits:4'],
        'no_skhun' => ['sometimes', 'nullable', 'string', 'max:35'],
        'nopes_un' => ['sometimes', 'required', 'string', 'max:35'],
        'no_seri_ijazah' => ['sometimes', 'nullable', 'string', 'max:35'],
        'nama_pada_kartu' => ['sometimes', 'required', 'string', 'max:100'],
        'no_rekening_bank' => ['sometimes', 'nullable', 'string', 'max:50'],
        'rekening_atas_nama' => ['sometimes', 'nullable', 'string', 'max:100'],
        'layak_bantuan' => ['sometimes', 'required', 'in:Iya,Tidak'],
        'alasan_layak' => ['sometimes', 'required', 'string', 'max:255'],
        'stat_siswa' => ['sometimes', 'required', 'string', 'max:20'],
        'pindahan' => ['sometimes', 'required', 'in:Iya,Tidak'],
    ];
}


}
