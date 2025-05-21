<?php

namespace App\Imports;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation; 
use Maatwebsite\Excel\Concerns\WithHeadingRow; 

class KelurahanImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $kecamatan = Kecamatan::where('kecamatan', $row['kecamatan'] ?? '')->first();

        return new Kelurahan([
            'kelurahan'=> $row['kelurahan'],
            'kode_pos'=> $row['kode_pos'],
            'id_kecamatan'=> $kecamatan?->id,
        ]);
    }

    public function rules(): array 
    {
        return [
            'kelurahan' => ['required', 'string', 'max:255', 'unique:tb_kelurahan,kelurahan'],
            'kode_pos' => ['required', 'string', 'max:255', 'unique:tb_kelurahan,kode_pos'],
            'id_kecamatan' => ['required', 'integer'],
        ];
    }
}
