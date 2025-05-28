<?php

namespace App\Imports;

use App\Models\Rombel;
use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class RombelImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithMultipleSheets
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
