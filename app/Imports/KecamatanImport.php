<?php

namespace App\Imports;

use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class KecamatanImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithMultipleSheets
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
        $kabupaten = Kabupaten::where('kabupaten', $row['kabupaten'] ?? '')->first();

        return new Kecamatan([
            'kecamatan'     => $row['kecamatan'],
            'id_kabupaten'  => $kabupaten?->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'kecamatan' => ['required', 'string', 'max:255', 'unique:tb_kecamatan,kecamatan'],
        ];
    }
}
