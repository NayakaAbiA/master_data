<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Events\AfterSheet;

class PegawaiExport implements FromArray, WithHeadings, WithEvents
{
    protected $data = [];

    public function array(): array
    {
        if (empty($this->data)) {
            $this->data = Pegawai::with('pangkat','statpegawai','jns_ptk','agama','provinsi','kabupaten','kecamatan','kelurahan','tgstambahan','sumber_gaji','statkawin','pekerjaan_pasangan','bank')
                ->get()
                ->map(function ($pegawai) {
                    return [
                        $pegawai->nama ?? '-', $pegawai->NIK ?? '-', $pegawai->NIP ?? '-', $pegawai->NUPTK ?? '-', $pegawai->jenis_kelamin ?? '-',
                        $pegawai->tempat_lahir ?? '-', $pegawai->tgl_lahir ?? '-', $pegawai->statpegawai->stat_peg ?? '-', $pegawai->jns_ptk->jenis_ptk ?? '-',
                        $pegawai->agama->nama_agama ?? '-', $pegawai->Jalan ?? '-', $pegawai->No_rumah ?? '-', $pegawai->RT ?? '-', $pegawai->RW ?? '-',
                        $pegawai->provinsi->provinsi ?? '-', $pegawai->kabupaten->kabupaten ?? '-', $pegawai->kecamatan->kecamatan ?? '-', $pegawai->kelurahan->kelurahan ?? '-',
                        $pegawai->kode_pos ?? '-', $pegawai->no_telepon ?? '-', $pegawai->hp ?? '-', $pegawai->email ?? '-', $pegawai->lintang ?? '-', $pegawai->bujur ?? '-',
                        $pegawai->tgstambahan->tgs_tambahan ?? '-', $pegawai->no_sk_cpns ?? '-', $pegawai->tgl_sk_cpns ?? '-', $pegawai->no_sk_pengangkatan ?? '-',
                        $pegawai->tmt_pengangkatan ?? '-', $pegawai->lembaga_pengangkatan ?? '-', $pegawai->pangkat->pangkat ?? '-', $pegawai->sumber_gaji->sumber_gaji ?? '-',
                        $pegawai->nama_ibu_kandung ?? '-', $pegawai->statkawin->status_kawin ?? '-', $pegawai->nama_pasangan ?? '-', $pegawai->nip_pasangan ?? '-',
                        $pegawai->pekerjaan_pasangan->pekerjaan ?? '-',  $pegawai->lisensi_kepsek == 1 ? 'Ya' : 'Tidak',
                        $pegawai->diklat_pengawas == 1 ? 'Ya' : 'Tidak',$pegawai->keahlian_braille == 1 ? 'Ya' : 'Tidak',
                        $pegawai->keahlian_bahasa_isyarat == 1 ? 'Ya' : 'Tidak', $pegawai->no_npwp ?? '-', $pegawai->nama_wajib_pajak ?? '-', $pegawai->kewarganegaraan ?? '-',
                        $pegawai->bank->nama_bank ?? '-', $pegawai->no_rek_bank ?? '-', $pegawai->rek_atas_nama ?? '-', $pegawai->no_kk ?? '-', $pegawai->no_karpeg ?? '-',
                        $pegawai->no_karis_karsu ?? '-', $pegawai->nuks ?? '-',
                    ];
                })
                ->toArray();
        }

        return $this->data;
    }

    public function headings(): array
    {
        return ['Nama','NIK','NIP','NUPTK','Jenis Kelamin',
            'Tempat Lahir','Tanggal Lahir','Status Pegawai','Jenis PTK','Agama','Jalan','No Rumah','RT','RW',
            'Provinsi','Kabupaten/Kota','Kecamatan','Kelurahan','Kode Pos','No Telp','Handphone','Email','Lintang',
            'Bujur','Tugas Tambahan','No SK CPNS','Tanggal SK CPNS','No SK Pengangkatan','TMT Pengangkatan',
            'Lembaga Pengangkatan','Pangkat','Sumber Gaji','Nama Ibu Kandung','Status Kawin','Nama Pasangan',
            'NIP Pasangan','Pekerjaan Pasangan','Lisensi Kepsek','Diklat Pengawas','Keahlian Braille',
            'Keahlian Bahasa Isyarat','No NPWP','Nama Wajib Pajak','Kewarganegaraan','Bank','No Rekening',
            'Rekening Atas Nama','No Kartu Keluarga','No Karpeg','No Karis Karsu','NUKS'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Sisipkan 3 baris di awal
                $sheet->insertNewRowBefore(1, 3);

                $sheet->setCellValue('A1', 'LAPORAN DATA PEGAWAI');
                $sheet->setCellValue('A2', 'TANGGAL: ' . now()->format('d-m-Y'));

                $columnCount = count($this->headings());
                $lastColumnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($columnCount);

                $sheet->mergeCells("A1:{$lastColumnLetter}1");
                $sheet->mergeCells("A2:{$lastColumnLetter}2");

                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                $sheet->getStyle('A2')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 12],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                // Heading style
                $headerRange = "A4:{$lastColumnLetter}4";
                $sheet->getStyle($headerRange)->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);

                // Auto-size kolom
                for ($col = 1; $col <= $columnCount; $col++) {
                    $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
                    $sheet->getColumnDimension($colLetter)->setAutoSize(true);
                }

                // Border dan alignment seluruh isi
                $dataCount = count($this->array());
                $lastRow = 4 + $dataCount;

                $dataRange = "A5:{$lastColumnLetter}{$lastRow}";
                $sheet->getStyle($dataRange)->applyFromArray([
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'wrapText' => false,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);
            }
        ];
    }
}
