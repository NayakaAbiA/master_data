<?php

namespace App\Imports;

use App\Models\KrtBantuan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class KrtBantuanImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use SkipsFailures;

    public function sheets(): array
    {
        return [
            0 => $this, // hanya proses sheet ke-0 (pertama)
        ];
    }

    public function model(array $row)
    {
        return new KrtBantuan([
            'no_krtbantuan' => $row['no_kartu_bantuan'],
            'nama_krtbantuan' => $row['nama_kartu_bantuan'],
            'nama_pdkrt' => $row['nama_pendiri_kartu'],
        ]);
    }

    public function rules(): array
    {
        return [
            'no_kartu_bantuan' => ['required', 'string', 'max:15', 'unique:tb_krtbantuan,no_krtbantuan'],
            'nama_kartu_bantuan' => ['required', 'string', 'max:15'],
            'nama_pendiri_kartu' => ['required', 'string', 'max:40'],
        ];
    }
}
