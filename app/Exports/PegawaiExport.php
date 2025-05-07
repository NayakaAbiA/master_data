<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PegawaiExport implements FromArray, WithHeadings, WithCustomStartCell, WithEvents
{
    public function array(): array
    {
        return Pegawai::with('pangkat')->get()->map(function ($pegawai) {
        return [
            $pegawai->nama,
            $pegawai->NIK,
            $pegawai->NIP,
            $pegawai->NUPTK,
            $pegawai->jenis_kelamin,
            $pegawai->tempat_lahir,
            $pegawai->tgl_lahir,
            $pegawai->jabatan,
            $pegawai->jabatan,
            $pegawai->jabatan,
            $pegawai->email,
            $pegawai->pangkat->pangkat ?? '-', 
        ];
    })->toArray();
    }

    public function headings(): array
    {
        return ['Nama','NIK','NIP','NUPTK','Jenis Kelamin',
         'Tempat lahir','Tanggal Lahir', 'Email','Status Pegawai'];
    }

    public function startCell(): string
    {
        return 'A4'; // Data dimulai dari baris 4
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $sheet->setCellValue('A1', 'Laporan Data Pegawai');
                $sheet->setCellValue('A2', 'Tanggal: ' . now()->format('d-m-Y'));

                // Tambahan styling
                $sheet->mergeCells('A1:C1');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
            },
        ];
    }
}
