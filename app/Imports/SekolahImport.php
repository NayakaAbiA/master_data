<?php

namespace App\Imports;

use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SekolahImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithMultipleSheets
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
        return new Sekolah([
       'npsn' => $row['npsn'],
       'nama_sekolah' => $row['nama_sekolah'],
       'jenjang' => $row['jenjang'],
        ]);
    }

    public function rules(): array
    {
        return [
            'npsn' => ['required', 'string', 'max:12', 'unique:tb_sekolah,npsn'],
            'nama_sekolah' => ['required', 'string', 'max:50', 'unique:tb_sekolah,nama_sekolah'],
            'jenjang' => ['required', 'string', 'max:30'],
        ];
    }
}
