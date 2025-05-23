<?php

namespace App\Exports;

use App\Models\Kabupaten;
use Maatwebsite\Excel\Concerns\FromArray;

class KabupatenTemplateExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            // Header
            ['Kabupaten', 'Ibu Kota', 'BSNI', 'Provinsi'],

            // Baris kosong untuk pemisah
            [''],

            // Keterangan
            ['* Isi nama kolom sesuai dengan referensi yang berlaku'],
            ['* Kolom yang memiliki relasi ke tabel referensi:'],
            ['- Provinsi (tabel: provinsi)']
        ];
    }

}
