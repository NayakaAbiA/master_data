<?php

namespace App\Exports;

use App\Models\Provinsi;
use Maatwebsite\Excel\Concerns\FromArray;

class ProvinsiTemplateExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        return [
            // Header
            ['Provinsi','Ibu Kota','BSNI'],
            
            // Baris kosong untuk pemisah
            [''],
            
            // Keterangan
            ['* Isi nama provinsi sesuai dengan referensi yang berlaku']
        ];
    }
}
