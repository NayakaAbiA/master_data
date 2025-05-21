<?php

namespace App\Imports;

use App\Models\Provinsi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation; 
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class ProvinsiImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Provinsi([
            'provinsi'=> $row['provinsi'],
            'ibu_kota'=> $row['ibu_kota'],
            'p_bsni'=> $row['p_bsni'],
        ]);
    }

    public function rules(): array 
    {

        return [
            'provinsi' => ['required', 'string', 'max:225', 'unique:tb_provinsi,provinsi'],
            'ibu_kota' => ['required', 'string', 'max:225', 'unique:tb_provinsi,ibu_kota'],
            'p_bsni' => ['required', 'string', 'max:225', 'unique:tb_provinsi,p_bsni'],
        ];

    }
}
