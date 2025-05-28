<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class RombelTemplateExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new class implements FromArray, WithTitle {
                public function array(): array
                {
                    return [
                        ['Nama Rombel', 'Wali Kelas'],
                    ];
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
                        ['* Isi nama rombel sesuai dengan referensi yang berlaku'],
                        ['* Kolom yang memiliki relasi ke tabel referensi:'],
                        ['- Wali Kelas (tabel: pegawai)'],
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
