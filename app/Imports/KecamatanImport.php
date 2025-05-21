<?php

namespace App\Imports;

use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation; 
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class KecamatanImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $kabupaten = Kabupaten::where('kabupaten', $row['kabupaten'] ?? '')->first();

        return new Kecamatan([
            'kecamatan'=> $row['kecamatan'],
            'id_kabupaten'=> $kabupaten?->id,
        ]);
    }

    public function rules(): array 
    {
        return [
            'kecamatan' => ['required', 'string', 'max:255', 'unique:tb_kecamatan,kecamatan'],
            'id_kabupaten' => ['required', 'integer'],
        ];
    }
}
