<?php

namespace App\Exports;

use App\Models\Kecamatan;
use Maatwebsite\Excel\Concerns\FromArray;

class KecamatanTemplateExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            // Header
            ['Kecamatan', 'Kabupaten'],

            // Baris kosong untuk pemisah
            [''],

            // Keterangan
            ['* Isi nama kolom sesuai dengan referensi yang berlaku'],
            ['* Kolom yang memiliki relasi ke tabel referensi:'],
            ['- Kabupaten (tabel: kabupaten)']
        ];
    }

}
