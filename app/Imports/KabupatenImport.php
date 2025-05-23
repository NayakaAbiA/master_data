<?php

namespace App\Imports;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class KabupatenImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
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
