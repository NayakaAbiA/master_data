<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class PegawaiTemplateExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new class implements FromArray, WithTitle {
                public function array(): array
                {
                    return [[
                        'Nama', 'NIK', 'NIP', 'NUPTK', 'Email', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir',
                        'Status Kepegawaian', 'Jenis PTK', 'Agama', 'Alamat Jalan', 'No Rumah', 'RT', 'RW', 'Provinsi',
                        'Kabupaten', 'Kecamatan', 'Kelurahan', 'Kode Pos', 'Telepon', 'HP', 'Lintang', 'Bujur', 'Tugas Tambahan',
                        'SK CPNS', 'Tanggal CPNS', 'SK Pengangkatan', 'TMT Pengangkatan', 'Lembaga Pengangkatan', 'Pangkat Golongan',
                        'Nama Ibu Kandung', 'Status Perkawinan', 'Nama Pasangan', 'NIP Pasangan', 'Pekerjaan Pasangan', 'Sudah Lisensi Kepala Sekolah',
                        'Pernah Diklat Kepengawasan', 'Keahlian Braille', 'Keahlian Bahasa Isyarat', 'NPWP', 'Nama Wajib Pajak', 'Kewarganegaraan', 'Bank',
                        'Sumber Gaji', 'Nomor Rekening Bank', 'Rekening Atas Nama', 'No KK', 'Karpeg', 'Karis atau Karsu', 'NUKS'
                    ]];
                }

                public function title(): string
                {
                    return 'Template';
                }
            },

            new class implements FromArray, WithTitle {
                public function array(): array
                {
                    return [
                        ['Keterangan'],
                        ['* Isi semua kolom sesuai dengan data yang valid dan referensi yang berlaku. Gunakan format penulisan yang sesuai dengan header di atas.'],
                        ['* Kolom yang memiliki relasi di bawah, harus diisi sesuai dengan data referensi yang tersedia.'],
                        ['- Status Kepegawaian (tabel: stat_pegawai)'],
                        ['- Jenis PTK (tabel: jenis_ptk)'],
                        ['- Agama (tabel: agama)'],
                        ['- Provinsi (tabel: provinsi)'],
                        ['- Kabupaten (tabel: kabupaten)'],
                        ['- Kecamatan (tabel: kecamatan)'],
                        ['- Kelurahan (tabel: kelurahan)'],
                        ['- Tugas Tambahan (tabel: tgs_tambahan)'],
                        ['- Pangkat Golongan (tabel: pangkat)'],
                        ['- Status Perkawinan (tabel: stat_kawin)'],
                        ['- Pekerjaan Pasangan (tabel: pekerjaan)'],
                        ['- Bank (tabel: bank)'],
                        ['- Sumber Gaji (tabel: sumber_gaji)'],
                        ['* Kolom di bawah harus berisi pilihan "Ya" atau "Tidak":'],
                        ['- Sudah Lisensi Kepala Sekolah'],
                        ['- Pernah Diklat Kepengawasan'],
                        ['- Keahlian Braille'],
                        ['- Keahlian Bahasa Isyarat'],
                        ['* Kolom-kolom berikut harus diisi dan tidak boleh kosong, yaitu:'],
                        ['- Nama', 'NIK', 'Email', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir', 'Alamat Jalan', 'RT', 'RW', 'Kode Pos', 'HP'],
                        ['- Keahlian Braille', 'Nama Ibu Kandung', 'Sudah Lisensi Kepala Sekolah', 'Pernah Diklat Kepengawasan', 'Keahlian Bahasa Isyarat', 'Kewarganegaraan'],
                    ];
                }

                public function title(): string
                {
                    return 'Keterangan';
                }
            }
        ];
    }
}
