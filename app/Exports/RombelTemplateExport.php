<?php

namespace App\Exports;

use App\Models\Rombel;
use Maatwebsite\Excel\Concerns\FromArray;

class RombelTemplateExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            // Header
            ['Nama Rombel','Wali Kelas'],
            
            // Baris kosong untuk pemisah
            [''],
            
            // Keterangan
            ['* Isi nama rombel sesuai dengan referensi yang berlaku'],
            ['* Kolom yang memiliki relasi ke tabel referensi:'],
            ['- Wali Kelas (tabel: pegawai)']
        ];
    }
}
