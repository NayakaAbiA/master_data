<?php

namespace App\Imports;

use App\Models\Rombel;
use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class RombelImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
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

        $ptk_walas = Pegawai::where('nama', $row['wali_kelas'] ?? '')->first();

        return new Rombel([
            'nama_rombel' => $row['nama_rombel'],
            'id_ptk_walas' => $ptk_walas?->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_rombel' => ['required', 'string', 'max:10', 'unique:tb_rombel,nama_rombel'],
        ];
    }
}
