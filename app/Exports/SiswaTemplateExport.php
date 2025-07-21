<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class SiswaTemplateExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new class implements FromArray, WithTitle {
                public function array(): array
                {
                    return [[
                        'Nama', 'Jenis Kelamin', 'NIK', 'No KK', 'No Reg Akta Lahir', 'NIPD', 'NISN', 'Jurusan', 'Rombel',
                        'Tempat Lahir', 'Tanggal Lahir', 'Agama', 'NPSN', 'HP', 'Email', 'Anak Ke', 'Jumlah Saudara Kandung',
                        'Berat Badan', 'Tinggi Badan', 'Lingkar Kepala', 'Kewarganegaraan', 'Jalan', 'No Rumah', 'RT', 'RW', 
                        'Provinsi', 'Kabupaten', 'Kecamatan', 'Kelurahan', 'Dusun', 'Kode Pos', 'Lintang', 'Bujur', 'No Telepon',
                        'Jenis Tinggal', 'Transportasi', 'Jarak Rumah Sekolah', 'Nama Ayah', 'NIK Ayah', 'Tahun Lahir Ayah',
                        'Pendidikan Ayah', 'Pekerjaan Ayah', 'Penghasilan Ayah', 'Nama Ibu', 'NIK Ibu', 'Tahun Lahir Ibu',
                        'Pendidikan Ibu', 'Pekerjaan Ibu', 'Penghasilan Ibu', 'Nama Wali', 'NIK Wali', 'Tahun Lahir Wali',
                        'Pendidikan Wali', 'Pekerjaan Wali', 'Penghasilan Wali', 'No SKHUN', 'Nopes UN', 'No Seri Ijazah',
                        'Kartu Bantuan', 'No KIP', 'No KPS', 'No KKS', 'Nama Pada Kartu', 'Bank', 'No Rekening Bank', 'Rekening Atas Nama', 'Layak Bantuan',
                        'Program Bantuan', 'Alasan Layak', 'Kebutuhan Khusus', 'Sekolah Asal', 'Status Siswa', 'Pindahan'
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
                        ['* Kolom yang memiliki relasi dibawah, harus diisi sesuai dengan data referensi yang tersedia.'],
                        ['- Jurusan (tabel: jurusan)'],
                        ['- Rombel (tabel: rombel)'],
                        ['- Agama (tabel: agama)'],
                        ['- Provinsi (tabel: provinsi)'],
                        ['- Kabupaten (tabel: kabupaten)'],
                        ['- Kecamatan (tabel: kecamatan)'],
                        ['- Kelurahan (tabel: kelurahan)'],
                        ['- Jenis Tinggal (tabel: jenis_tinggal)'],
                        ['- Transportasi (tabel: transportasi)'],
                        ['- Pendidikan Ayah/Ibu/Wali (tabel: pendidikan)'],
                        ['- Pekerjaan Ayah/Ibu/Wali (tabel: pekerjaan)'],
                        ['- Penghasilan Ayah/Ibu/Wali (tabel: penghasilan)'],
                        ['- Kartu Bantuan (tabel: krt_bantuan)'],
                        ['- Bank (tabel: bank)'],
                        ['- Program Bantuan (tabel: prgbantuan)'],
                        ['- Kebutuhan Khusus (tabel: kebkhusus)'],
                        ['* Gunakan format teks persis seperti di database (case sensitive jika dibutuhkan).'],
                        ['* Untuk kolom seperti "Layak Bantuan" dan "Pindahan", isikan "Iya" atau "Tidak".']
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
