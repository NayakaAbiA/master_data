<?php

namespace App\Imports;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class KelurahanImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithMultipleSheets
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
        $kecamatan = Kecamatan::where('kecamatan', $row['kecamatan'] ?? '')->first();

        return new Kelurahan([
            'kelurahan' => $row['kelurahan'],
            'kode_pos' => $row['kode_pos'],
            'id_kecamatan' => $kecamatan?->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'kelurahan' => ['required', 'string', 'max:255', 'unique:tb_kelurahan,kelurahan'],
            'kode_pos' => ['required', 'string', 'max:255'],
        ];
    }
}
