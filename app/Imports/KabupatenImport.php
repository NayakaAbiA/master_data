<?php

namespace App\Imports;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation; 
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class KabupatenImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $provinsi = Provinsi::where('provinsi', $row['provinsi'] ?? '')->first();

        return new Kabupaten([
            'kabupaten'=> $row['kabupaten'],
            'ibu_kota'=> $row['ibu_kota'],
            'k_bsni'=> $row['k_bsni'],
            'id_provinsi'=> $provinsi?->id,
        ]);
    }

    public function rules(): array 
    {
        return [
            'kabupaten' => ['required', 'string', 'max:255', 'unique:tb_kabupaten,kabupaten'],
            'ibu_kota' => ['required', 'string', 'max:255', 'unique:tb_kabupaten,ibu_kota'],
            'k_bsni' => ['required', 'string', 'max:255', 'unique:tb_kabupaten,k_bsni'],
            'id_provinsi' => ['required', 'integer'],
        ];
    }
}
