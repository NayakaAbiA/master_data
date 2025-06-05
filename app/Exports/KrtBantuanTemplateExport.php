<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class KrtBantuanTemplateExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new class implements FromArray, WithTitle {
                public function array(): array
                {
                    return [
                        ['No Kartu Bantuan', 'Nama Kartu Bantuan', 'Nama Pendiri Kartu'],
                    ];
                }

                public function title(): string
                {
                    return 'Template';
                }
            },

            new class implements FromArray, WithTitle {
                public function array(): array
                {
                    return [
                        ['Keterangan'],
                        ['* Isi nama kartu bantuan sesuai dengan referensi yang berlaku'],
                    ];
                }

                public function title(): string
                {
                    return 'Keterangan';
                }
            }
        ];
    }
}
