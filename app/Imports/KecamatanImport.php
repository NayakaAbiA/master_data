<?php

namespace App\Imports;

use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class KecamatanImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    /**
     * Lewati komentar dan baris kosong sebelum validasi dijalankan.
     */
    public function prepareForValidation($data, $index)
    {
        $firstValue = trim($data[array_key_first($data)] ?? '');

        if (
            str_starts_with($firstValue, '*') ||
            str_starts_with($firstValue, '-')
        ) {
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
