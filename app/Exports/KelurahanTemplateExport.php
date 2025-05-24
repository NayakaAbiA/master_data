<?php

namespace App\Exports;

use App\Models\Kelurahan;
use Maatwebsite\Excel\Concerns\FromArray;

class KelurahanTemplateExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            // Header
            ['Kelurahan','Kode Pos','Kecamatan'],
            
            // Baris kosong untuk pemisah
            [''],
            
            // Keterangan
            ['* Isi nama kolom sesuai dengan referensi yang berlaku'],
            ['* Kolom yang memiliki relasi ke tabel referensi:'],
            ['- Kecamatan (tabel: kecamatanen)']
        ];
    }
}
