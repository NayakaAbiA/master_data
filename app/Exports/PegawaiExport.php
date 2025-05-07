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
        return Pegawai::with('pangkat','statpegawai','jns_ptk','agama','provinsi','kabupaten','kecamatan','kelurahan','tgstambahan','sumber_gaji','statkawin','pekerjaan_pasangan','bank')->get()->map(function ($pegawai) {
        return [
            $pegawai->nama ?? '-',
            $pegawai->NIK ?? '-',
            $pegawai->NIP ?? '-',
            $pegawai->NUPTK ?? '-',
            $pegawai->jenis_kelamin ?? '-',
            $pegawai->tempat_lahir ?? '-',
            $pegawai->tgl_lahir ?? '-',
            $pegawai->statpegawai->stat_peg ?? '-',
            $pegawai->jns_ptk->jenis_ptk ?? '-',
            $pegawai->agama->nama_agama ?? '-',
            $pegawai->Jalan ?? '-',
            $pegawai->No_rumah ?? '-',
            $pegawai->RT ?? '-',
            $pegawai->RW ?? '-',
            $pegawai->provinsi->provinsi ?? '-',
            $pegawai->kabupaten->kabupaten ?? '-',
            $pegawai->kecamatan->kecamatan ?? '-',
            $pegawai->kelurahan->kelurahan ?? '-',
            $pegawai->kode_pos ?? '-',
            $pegawai->no_telepon ?? '-',
            $pegawai->hp ?? '-',
            $pegawai->email ?? '-',
            $pegawai->lintang ?? '-',
            $pegawai->bujur ?? '-',
            $pegawai->tgstambahan->tgs_tambahan ?? '-',
            $pegawai->no_sk_cpns ?? '-',
            $pegawai->tgl_sk_cpns ?? '-',
            $pegawai->no_sk_pengangkatan ?? '-',
            $pegawai->tmt_pengangkatan ?? '-',
            $pegawai->lembaga_pengangkatan ?? '-',
            $pegawai->pangkat->pangkat ?? '-', 
            $pegawai->sumber_gaji->sumber_gaji ?? '-',
            $pegawai->nama_ibu_kandung ?? '-',
            $pegawai->statkawin->status_kawin ?? '-',
            $pegawai->nama_pasangan ?? '-',
            $pegawai->nip_pasangan ?? '-',
            $pegawai->pekerjaan_pasangan->pekerjaan ?? '-',
            $pegawai->lisensi_kepsek ?? '-',
            $pegawai->diklat_pengawas ?? '-',
            $pegawai->keahlian_braille ?? '-',
            $pegawai->keahlian_bahasa_isyarat ?? '-',
            $pegawai->no_npwp ?? '-',
            $pegawai->nama_wajib_pajak ?? '-',
            $pegawai->kewarganegaraan ?? '-',
            $pegawai->bank->nama_bank ?? '-',
            $pegawai->no_rek_bank ?? '-',
            $pegawai->rek_atas_nama ?? '-',
            $pegawai->no_kk ?? '-',
            $pegawai->no_karpeg ?? '-',
            $pegawai->no_karis_karsu ?? '-',
            $pegawai->nuks ?? '-',
        ];
    })->toArray();
    }

    public function headings(): array
    {
        return ['Nama','NIK','NIP','NUPTK','Jenis Kelamin',
         'Tempat lahir','Tanggal Lahir', 'Status Pegawai','Jenis PTK'
        ,'Agama','Jalan','No Rumah','RT','RW','Provinsi','Kabupaten/Kota'
        ,'Kecamatan','Kelurahan','Kode Pos','No Telp','Handphone','Email'
        ,'Lintang','Bujur','Tugas Tambahan','No Sk CPNS','Tanggal Sk CPNS','No Sk Pengangkatan'
        ,'Tmt Pengangkatan','Lembaga Pengangkatan','Pangkat','Sumber Gaji','Nama Ibu Kandung'
        ,'Status Kawin','Nama Pasangan','NIP Pasangan','Pekerjaan Pasangan','Lisensi Kepsek','Diklat Pengawas'
        ,'Keahlian Braille','Keahlian Bahasa Isyarat','No NPWP','Nama Wajib Pajak','Kewarganegaraan','Bank','No Rekening'
        ,'Rekening Atas Nama','No Kartu Keluarga','No Karpeg','No Karis Karsu', 'NUKS',];
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
