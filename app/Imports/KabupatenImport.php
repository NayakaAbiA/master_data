<?php

namespace App\Imports;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class KabupatenImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithMultipleSheets
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

        $provinsi = Provinsi::where('provinsi', $row['provinsi'] ?? '')->first();

        return new Kabupaten([
            'kabupaten'  => $row['kabupaten'],
            'ibu_kota'   => $row['ibu_kota'],
            'k_bsni'     => $row['bsni'],
            'id_provinsi'=> $provinsi?->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'kabupaten' => ['required', 'string', 'max:255', 'unique:tb_kabupaten,kabupaten'],
            'ibu_kota'  => ['required', 'string', 'max:255', 'unique:tb_kabupaten,ibu_kota'],
            'bsni'      => ['required', 'string', 'max:255', 'unique:tb_kabupaten,k_bsni'],
        ];
    }
}
