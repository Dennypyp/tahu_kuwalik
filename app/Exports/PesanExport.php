<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Pesan;

class PesanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //

        return Pesan::select('created_at', 'email', 'varian', 'jumlah', 'total', 'status')->get();
    }
    public function headings():array{
        return [
            "Tanggal Transaksi",
            "Email",
            "Varian",
            "Jumlah Pembelian",
            "Total Pembelian",
            "Status Pembayaran"
        ];
    }
}
