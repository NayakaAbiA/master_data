<?php

namespace App\Imports;

use App\Models\Provinsi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class ProvinsiImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
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

        return new Provinsi([
            'provinsi' => $row['provinsi'],
        ]);
    }

    public function rules(): array
    {
        return [
            'provinsi' => ['required', 'string', 'max:255', 'unique:tb_provinsi,provinsi'],
        ];
    }
}
