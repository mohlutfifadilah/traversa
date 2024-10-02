<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Invoice;
use App\Models\Pembayaran;
use App\Models\Status;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $invoice = Invoice::where('id_status', 1)->where('is_paid', 0)->where('tarif', '<=', 0)->get();
        return view('admin.invoice.index', compact('invoice'));
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
        $pembayaran = Pembayaran::all();
        return view('admin.invoice.invoice_show', compact('invoice', 'armada', 'status', 'pembayaran'));
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
        $invoice = Invoice::find($id);
        $invoice->delete();

        Alert::alert('Berhasil', 'Invoice berhasil dihapus ', 'success');
        return redirect()->route('invoice.index')->withSuccess('Data Invoice berhasil dihapus');
    }

    public function submit_tarif(Request $request, string $id){
        $invoice = Invoice::find($id);

        // Menggunakan kombinasi huruf kapital dan angka
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $length = 16;

        // Mengenerate kode unik sepanjang 16 karakter
        $kode_transaksi = '';
        for ($i = 0; $i < $length; $i++) {
            $kode_transaksi .= $characters[rand(0, strlen($characters) - 1)];
        }
        $id_jenis_pembayaran = intval($request->jenis_pembayaran);
        $tarif = intval($request->tarif);

        $invoice->update([
            'kode_transaksi' => $kode_transaksi,
            'id_jenis_pembayaran' => $id_jenis_pembayaran,
            'tarif' => $tarif,
        ]);

        Alert::alert('Berhasil', 'Tarif berhasil ditambahkan ', 'success');
        return redirect()->route('invoice.index')->withSuccess('Tarif berhasil ditambahkan');
    }
}
