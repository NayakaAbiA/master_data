<?php

namespace App\Imports;

use App\Models\Pegawai;
use App\Models\StatPegawai;
use App\Models\JenisPTK;
use App\Models\Agama;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\TgsTambahan;
use App\Models\Pangkat;
use App\Models\StatKawin;
use App\Models\Pekerjaan;
use App\Models\Bank;
use App\Models\SumberGaji;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class PegawaiImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnFailure
{
    use SkipsFailures;

    public function prepareForValidation($data, $index)
    {
        $firstValue = trim($data[array_key_first($data)] ?? '');

        if (
            str_starts_with($firstValue, '*') ||
            str_starts_with($firstValue, '-')
        ) {
            return [];
        }

        return $data;
    }

    public function model(array $row)
    {
        $firstValue = trim($row[array_key_first($row)] ?? '');

        if (
            str_starts_with($firstValue, '*') ||
            str_starts_with($firstValue, '-')
        ) {
            return null;
        }

        // Cari ID foreign key
        $stat_peg = StatPegawai::where('stat_peg', $row['status_kepegawaian'] ?? '')->first();
        $jenis_ptk = JenisPTK::where('jenis_ptk', $row['jenis_ptk'] ?? '')->first();
        $agama = Agama::where('nama_agama', $row['agama'] ?? '')->first();
        $provinsi = Provinsi::where('provinsi', $row['provinsi'] ?? '')->first();
        $kabupaten = Kabupaten::where('kabupaten', $row['kabupaten'] ?? '')->first();
        $kecamatan = Kecamatan::where('kecamatan', $row['kecamatan'] ?? '')->first();
        $kelurahan = Kelurahan::where('kelurahan', $row['kelurahan'] ?? '')->first();
        $tgs_tambahan = TgsTambahan::where('tgs_tambahan', $row['tugas_tambahan'] ?? '')->first();
        $pangkat = Pangkat::where('pangkat', $row['pangkat_golongan'] ?? '')->first();
        $status_kawin = StatKawin::where('status_kawin', $row['status_perkawinan'] ?? '')->first();
        $pekerjaan_pasangan = Pekerjaan::where('pekerjaan', $row['pekerjaan_pasangan'] ?? '')->first();
        $bank = Bank::where('nama_bank', $row['bank'] ?? '')->first();
        $sumber_gaji = SumberGaji::where('sumber_gaji', $row['sumber_gaji'] ?? '')->first();

        return new Pegawai([
            'nama' => $row['nama'],
            'nik' => $row['nik'],
            'nip' => $row['nip'],
            'nuptk' => $row['nuptk'],
            'email' => $row['email'],
            'jenis_kelamin' => $row['jk'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tgl_lahir' => $row['tanggal_lahir'],
            'id_stat_peg' => $stat_peg?->id,
            'id_jns_ptk' => $jenis_ptk?->id,
            'id_agama' => $agama?->id,
            'jalan' => $row['alamat_jalan'],
            'no_rumah' => $row['no_rumah'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'id_provinsi' => $provinsi?->id,
            'id_kabupaten' => $kabupaten?->id,
            'id_kecamatan' => $kecamatan?->id,
            'id_kelurahan' => $kelurahan?->id,
            'kode_pos' => $row['kode_pos'],
            'no_telepon' => $row['telepon'],
            'hp' => $row['hp'],
            'lintang' => $row['lintang'],
            'bujur' => $row['bujur'],
            'id_tgstambahan' => $tgs_tambahan?->id,
            'no_sk_cpns' => $row['sk_cpns'],
            'tgl_sk_cpns' => $row['tanggal_cpns'],
            'no_sk_pengangkatan' => $row['sk_pengangkatan'],
            'tmt_pengangkatan' => $row['tmt_pengangkatan'],
            'lembaga_pengangkatan' => $row['lembaga_pengangkatan'],
            'id_pangkat' => $pangkat?->id,
            'nama_ibu_kandung' => $row['nama_ibu_kandung'],
            'id_statkawin' => $status_kawin?->id,
            'nama_pasangan' => $row['nama_pasangan'],
            'nip_pasangan' => $row['nip_pasangan'],
            'id_pekerjaan_pasangan' => $pekerjaan_pasangan?->id,
            'lisensi_kepsek' => strtolower((string)$row['sudah_lisensi_kepala_sekolah']) === 'ya' ? 1 : 0,
            'diklat_pengawas' => strtolower((string)$row['pernah_diklat_kepengawasan']) === 'ya' ? 1 : 0,
            'keahlian_braille' => strtolower((string)$row['keahlian_braille']) === 'ya' ? 1 : 0,
            'keahlian_bahasa_isyarat' => strtolower((string)$row['keahlian_bahasa_isyarat']) === 'ya' ? 1 : 0,
            'no_npwp' => $row['npwp'],
            'nama_wajib_pajak' => $row['nama_wajib_pajak'],
            'kewarganegaraan' => $row['kewarganegaraan'],
            'id_bank' => $bank?->id,
            'id_sumber_gaji' => $sumber_gaji?->id,
            'no_rek_bank' => $row['nomor_rekening_bank'],
            'rek_atas_nama' => $row['rekening_atas_nama'],
            'no_kk' => $row['no_kk'],
            'no_karpeg' => $row['karpeg'],
            'no_karis_karsu' => $row['karis_atau_karsu'],
            'nuks' => $row['nuks'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nama' => ['sometimes', 'required', 'string', 'max:100'],
            'nik' => ['sometimes', 'required', 'digits:16', 'unique:tb_ptk,nik'],
            'nip' => ['sometimes', 'nullable', 'string', 'max:18'],
            'nuptk' => ['sometimes', 'nullable', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', 'max:50', 'unique:tb_ptk,email'],
            'jk' => ['sometimes', 'required', 'string', 'max:10'],
            'tempat_lahir' => ['sometimes', 'required', 'string', 'max:30'],
            'tanggal_lahir' => ['sometimes', 'required', 'date'],
            'alamat_jalan' => ['sometimes', 'required', 'string', 'max:40'],
            'no_rumah' => ['sometimes', 'required', 'string', 'max:4'],
            'rt' => ['sometimes', 'required', 'string', 'max:4'],
            'rw' => ['sometimes', 'required', 'string', 'max:4'],
            'kode_pos' => ['sometimes', 'required', 'digits:5'],
            'telepon' => ['sometimes', 'nullable', 'string', 'max:15'],
            'hp' => ['sometimes', 'required', 'string', 'max:15'],
            'lintang' => ['sometimes', 'nullable', 'string', 'max:50'],
            'bujur' => ['sometimes', 'nullable', 'string', 'max:50'],
            'sk_cpns' => ['sometimes', 'nullable', 'string', 'max:100'],
            'tanggal_cpns' => ['sometimes', 'nullable', 'date'],
            'sk_pengangkatan' => ['sometimes', 'nullable', 'string', 'max:100'],
            'tmt_pengangkatan' => ['sometimes', 'nullable', 'date'],
            'lembaga_pengangkatan' => ['sometimes', 'nullable', 'string', 'max:20'],
            'nama_ibu_kandung' => ['sometimes', 'required', 'string', 'max:50'],
            'nama_pasangan' => ['sometimes', 'nullable', 'string', 'max:50'],
            'nip_pasangan' => ['sometimes', 'nullable', 'string', 'max:18'],
            'sudah_lisensi_kepala_sekolah' => ['sometimes', 'required', 'in:Ya,Tidak'],
            'pernah_diklat_kepengawasan' => ['sometimes', 'required', 'in:Ya,Tidak'],
            'keahlian_braille' => ['sometimes', 'required', 'in:Ya,Tidak'],
            'keahlian_bahasa_isyarat' => ['sometimes', 'required', 'in:Ya,Tidak'],
            'npwp' => ['sometimes', 'nullable', 'string', 'max:25'],
            'nama_wajib_pajak' => ['sometimes', 'required', 'string', 'max:50'],
            'kewarganegaraan' => ['sometimes', 'required', 'string', 'max:25'],
            'nomor_rekening_bank' => ['sometimes', 'required', 'string', 'max:50'],
            'rekening_atas_nama' => ['sometimes', 'required', 'string', 'max:100'],
            'no_kk' => ['sometimes', 'required', 'digits:16'],
            'karpeg' => ['sometimes', 'nullable', 'string', 'max:8'],
            'karis_atau_karsu' => ['sometimes', 'nullable', 'string', 'max:11'],
            'nuks' => ['sometimes', 'nullable', 'string', 'max:15'],
        ];
    }
}
