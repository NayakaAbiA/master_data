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

class KelurahanImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    /**
     * Lewati baris komentar dan kosong sebelum divalidasi
     */
    public function prepareForValidation($data, $index)
    {
        $firstValue = trim($data[array_key_first($data)] ?? '');

        if (
            str_starts_with($firstValue, '*') ||
            str_starts_with($firstValue, '-')
        ) {
            // Kosongkan agar tidak divalidasi
            return [];
        }

        return $data;
    }

    public function model(array $row)
    {
        $firstValue = trim($row[array_key_first($row)] ?? '');

        if (
            str_starts_with($firstValue, '*') ||
            str_starts_with($firstValue, '-')
        ) {
            return null;
        }

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
