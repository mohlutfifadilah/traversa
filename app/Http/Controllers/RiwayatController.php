<?php

namespace App\Http\Controllers;

use App\Exports\RiwayatExport;
use App\Models\Armada;
use App\Models\Invoice;
use App\Models\Pembayaran;
use App\Models\Status;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $invoice = Invoice::whereNotNull('kode_transaksi')->where('tarif', '>=', 0)->get();
        return view('admin.riwayat.index', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $invoice = Invoice::find($id);
        $armada = Armada::find($invoice->id_armada);
        $status = Status::find($invoice->id_status);
        $pembayaran = Pembayaran::find($invoice->id_jenis_pembayaran);
        return view('admin.riwayat.riwayat_show', compact('invoice', 'armada', 'status', 'pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function riwayat_paid(string $id){
        $invoice = Invoice::find($id);

        $invoice->update([
            'id_status' => 2,
            'is_paid' => 1
        ]);

        Alert::alert('Berhasil', 'Status sudah diperbarui ', 'success');
        return redirect()->route('riwayat.index')->withSuccess('Status sudah diperbarui');
    }

    public function cetak_invoice(string $id){
        // Mengambil data pegawai dengan kolom 'nama_lengkap' dan 'jabatan'
        $invoice = Invoice::where('id', $id)->select('kode_transaksi', 'id_armada', 'id_status', 'id_jenis_pembayaran', 'nama_lengkap', 'email', 'alamat_penjemputan', 'alamat_tujuan', 'tanggal_jam', 'jumlah_penumpang', 'no_whatsapp', 'barang', 'tarif', 'is_paid')->first();
        $pdf = Pdf::loadview('admin.riwayat.cetak-invoice',[
            'invoice'=> $invoice,
        ]);

        // Mengatur orientasi potrait (array dengan ukuran kertas dan orientasi)
        $pdf->setPaper('A4', 'potrait');

    	return $pdf->download('INVOICE-' . $invoice->kode_transaksi . '.pdf');
    }

    public function export_excel(){
        return Excel::download(new RiwayatExport(),'invoice' . now() . '.xlsx');
    }

    public function export_pdf(){

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

    	$pdf = Pdf::loadview('admin.riwayat.export-pdf',['invoice'=>$invoice]);

        // Mengatur orientasi landscape (array dengan ukuran kertas dan orientasi)
        $pdf->setPaper('A4', 'landscape');

    	return $pdf->download('invoice.pdf');
    }


}
