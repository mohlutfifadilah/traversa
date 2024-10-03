<?php

namespace App\Exports;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RiwayatExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $invoice = DB::table('invoice')
            ->join('armada', 'invoice.id_armada', '=', 'armada.id')
            ->join('status', 'invoice.id_status', '=', 'status.id')
            ->join('pembayaran', 'invoice.id_jenis_pembayaran', '=', 'pembayaran.id')
            ->whereNotNull('invoice.kode_transaksi')
            ->where('invoice.tarif', '>=', 0)
            ->select(
                'invoice.kode_transaksi',
                'armada.nama_armada', // Mengambil nama armada
                'status.nama_status', // Mengambil nama status
                'pembayaran.nama_pembayaran', // Mengambil nama jenis pembayaran
                'invoice.nama_lengkap',
                'invoice.email',
                'invoice.alamat_penjemputan',
                'invoice.alamat_tujuan',
                'invoice.tanggal_jam',
                'invoice.jumlah_penumpang',
                'invoice.no_whatsapp',
                'invoice.barang',
                'invoice.tarif'
            )
            ->get();

        // Menambahkan kolom 'No' sebagai nomor urut
        $data = $invoice->map(function($item, $index) {
            return [
                'No' => $index + 1,  // Nomor urut
                'Kode Transaksi' => $item->kode_transaksi,
                'Armada' => $item->nama_armada,
                'Tanggal dan Jam' => $item->tanggal_jam,
                'Nama Lengkap' => $item->nama_lengkap,
                'Email' => $item->email,
                'No Whatsapp' => $item->no_whatsapp,
                'Alamat Penjemputan' => $item->alamat_penjemputan,
                'Alamat Tujuan' => $item->alamat_tujuan,
                'Jumlah Penumpang' => $item->jumlah_penumpang,
                'Barang' => $item->barang,
                'Tarif' => $item->tarif,
                'Jenis Pembayaran' => $item->nama_pembayaran,
                'Status' => $item->nama_status,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Transaksi',
            'Armada',
            'Tanggal dan Jam',
            'Nama Lengkap',
            'Email',
            'No Whatsapp',
            'Alamat Penjemputan',
            'Alamat Tujuan',
            'Jumlah Penumpang',
            'Barang',
            'Tarif',
            'Jenis Pembayaran',
            'Status',
        ];
    }
}
