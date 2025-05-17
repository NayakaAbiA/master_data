<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class SiswaExport implements FromArray, WithHeadings, WithStyles, WithEvents
{
    protected $dataArray = [];

    public function array(): array
    {
        if (empty($this->dataArray)) {
            $this->dataArray = Siswa::with(
                'agama', 'jurusan', 'rombel', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'jns_tinggal',
                'transport', 'pendidikanAyah', 'pendidikanIbu', 'pendidikanWali', 'pekerjaanAyah', 'pekerjaanIbu', 'pekerjaanWali',
                'penghasilanAyah', 'penghasilanIbu', 'penghasilanWali', 'krt_bantuan', 'bank', 'prgbantuan', 'kebkhusus'
            )->get()->map(function ($siswa) {
                return [
                    $siswa->nama ?? '-', $siswa->nipd ?? '-', $siswa->nisn ?? '-', $siswa->jurusan->nama_jur ?? '-',
                    $siswa->rombel->nama_rombel ?? '-', $siswa->tempat_lahir ?? '-', $siswa->tgl_lahir ?? '-', $siswa->NIK ?? '-',
                    $siswa->no_kk ?? '-', $siswa->no_reg_aktlhr ?? '-', $siswa->agama->nama_agama ?? '-', $siswa->npsn ?? '-',
                    $siswa->anak_ke ?? '-', $siswa->jml_saudara_kandung ?? '-', $siswa->jrk_rumah_sekolah ?? '-', $siswa->berat_badan ?? '-',
                    $siswa->tinggi_badan ?? '-', $siswa->lingkar_kepala ?? '-', $siswa->Jalan ?? '-', $siswa->no_rumah ?? '-',
                    $siswa->RT ?? '-', $siswa->RW ?? '-', $siswa->provinsi->provinsi ?? '-', $siswa->kabupaten->kabupaten ?? '-',
                    $siswa->kecamatan->kecamatan ?? '-', $siswa->kelurahan->kelurahan ?? '-', $siswa->kode_pos ?? '-',
                    $siswa->jns_tinggal->jnstinggal ?? '-', $siswa->transport->alat_transport ?? '-', $siswa->no_telepon ?? '-',
                    $siswa->hp ?? '-', $siswa->lintang ?? '-', $siswa->bujur ?? '-', $siswa->email ?? '-', $siswa->no_skhun ?? '-',
                    $siswa->nama_ayah ?? '-', $siswa->nik_ayah ?? '-', $siswa->thn_lahir_ayah ?? '-', $siswa->pendidikanAyah->jenjang_pendidikan ?? '-',
                    $siswa->pekerjaanAyah->pekerjaan ?? '-', $siswa->penghasilanAyah->penghasilan ?? '-', $siswa->nama_ibu ?? '-',
                    $siswa->nik_ibu ?? '-', $siswa->thn_lahir_ibu ?? '-', $siswa->pendidikanIbu->jenjang_pendidikan ?? '-',
                    $siswa->pekerjaanIbu->pekerjaan ?? '-', $siswa->penghasilanIbu->penghasilan ?? '-', $siswa->nama_wali ?? '-',
                    $siswa->nik_wali ?? '-', $siswa->thn_lahir_wali ?? '-', $siswa->pendidikanWali->jenjang_pendidikan ?? '-',
                    $siswa->pekerjaanWali->pekerjaan ?? '-', $siswa->penghasilanWali->penghasilan ?? '-', $siswa->nopes_un ?? '-',
                    $siswa->no_seri_ijazah ?? '-', $siswa->krt_bantuan->nama_krtbantuan ?? '-', $siswa->nama_pada_kartu ?? '-',
                    $siswa->bank->nama_bank ?? '-', $siswa->no_rek_bank ?? '-', $siswa->rek_atas_nama ?? '-',
                    $siswa->layak_bantuan == 1 ? 'Yes' : 'No',
                    $siswa->prgbantuan->prgbantuan ?? '-', $siswa->alasan_layak ?? '-', $siswa->kebkhusus->kebkhusus ?? '-',
                    $siswa->Stat_siswa ?? '-', $siswa->pindahan == 1 ? 'Yes' : 'No', $siswa->kewarganegaraan ?? '-',
                ];
            })->toArray();
        }

        return $this->dataArray;
    }

    public function headings(): array
    {
        return ['Nama', 'NIPD', 'NISN', 'Jurusan', 'Rombel', 'Tempat lahir', 'Tanggal lahir', 'NIK', 'No KK',
            'No Reg Akte lahir', 'Agama', 'NPSN', 'Anak ke-', 'Jumlah saudara kandung', 'Jarak Rumah ke Sekolah',
            'Berat Badan', 'Tinggi badan', 'Lingkar kepala', 'Jalan', 'No Rumah', 'RT', 'RW', 'Provinsi', 'Kabupaten',
            'Kecamatan', 'Kelurahan', 'Kode pos', 'Jenis tinggal', 'Transportasi', 'No Telepon', 'HP', 'Lintang',
            'Bujur', 'Email', 'No Skhun', 'Nama Ayah', 'Nik Ayah', 'Tahun Lahir Ayah', 'Pendidikan Ayah',
            'Pekerjaan Ayah', 'Penghasilan Ayah', 'Nama Ibu', 'Nik Ibu', 'Tahun Lahir Ibu', 'Pendidikan Ibu',
            'Pekerjaan Ibu', 'Penghasilan Ibu', 'Nama Wali', 'Nik Wali', 'Tahun Lahir Wali', 'Pendidikan Wali',
            'Pekerjaan Wali', 'Penghasilan Wali', 'Nopes un', 'No seri Ijazah', 'Kartu bantuan', 'Nama pada kartu',
            'Bank', 'No Rekening Bank', 'Rekening Atas Nama', 'Layak Bantuan', 'Program bantuan', 'Alasan layak',
            'Kebutuhan khusus', 'Status Siswa', 'Pindah', 'Kewarganegaraan'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            4 => [
                'font' => ['bold' => true],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Sisipkan 3 baris di awal
                $sheet->insertNewRowBefore(1, 3);

                $sheet->setCellValue('A1', 'LAPORAN DATA SISWA');
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

                // Auto-size
                for ($col = 1; $col <= $columnCount; $col++) {
                    $colLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
                    $sheet->getColumnDimension($colLetter)->setAutoSize(true);
                }

                // Jumlah baris data
                $dataCount = count($this->array());
                $lastRow = 4 + $dataCount;

                // Format kolom NIPD dan NISN (kolom B dan C)
                $sheet->getStyle("B5:B$lastRow")->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
                $sheet->getStyle("C5:C$lastRow")->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

                // Border seluruh isi
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
