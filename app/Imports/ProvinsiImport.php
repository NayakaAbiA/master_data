<?php

namespace App\Imports;

use App\Models\Provinsi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProvinsiImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithMultipleSheets
{
    use SkipsFailures;

    public function sheets(): array
    {
        return [
            0 => $this, // hanya proses sheet ke-0 (pertama)
        ];
    }

    public function model(array $row)
    {
        return new Provinsi([
            'provinsi' => $row['provinsi'],
            'ibu_kota'=> $row['ibu_kota'],
            'p_bsni'=> $row['bsni'],
        ]);
    }

    public function rules(): array
    {
        return [
            'provinsi' => ['required', 'string', 'max:255', 'unique:tb_provinsi,provinsi'],
            'ibu_kota' => ['required', 'string', 'max:225', 'unique:tb_provinsi,ibu_kota'],
            'bsni' => ['required', 'string', 'max:225', 'unique:tb_provinsi,p_bsni'],
        ];
    }
}
