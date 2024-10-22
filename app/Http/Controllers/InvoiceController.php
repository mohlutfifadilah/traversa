<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Invoice;
use App\Models\Pembayaran;
use App\Models\Status;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $armada = Armada::all();
        $status = Status::find($invoice->id_status);
        $pembayaran = Pembayaran::all();
        return view('admin.invoice.invoice_show', compact('invoice', 'armada',  'status', 'pembayaran'));
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

    public function submit_pesan(Request $request){

        //
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'no_whatsapp' => 'required|numeric|min:10',
            'tanggal' => 'required',
            'jam' => 'required',
            'alamat_penjemputan' => 'required',
            'alamat_tujuan' => 'required',
            'jumlah_penumpang' => 'required',
            // 'barang' => 'required',
            'jenis_pembayaran' => 'required',
        ],
        [
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'no_whatsapp.required' => 'No Whatsapp harus diisi',
            'no_whatsapp.numeric' => 'No Whatsapp harus berisi angka',
            'no_whatsapp.min' => 'No Whatsapp minimal 10 angka',
            'tanggal.required' => 'Tanggal harus diisi',
            'jam.required' => 'Jam harus diisi',
            'alamat_penjemputan.required' => 'Alamat Penjemputan harus diisi',
            'alamat_tujuan.required' => 'Alamat Tujuan harus diisi',
            'jumlah_penumpang.required' => 'Jumlah Penumpang harus diisi',
            // 'barang.required' => 'Barang harus diisi',
            'jenis_pembayaran.required' => 'Jenis Pembayaran harus diisi',
        ]);

        if ($validator->fails()) {
            Alert::alert('Kesalahan', 'Terjadi Kesalahan ', 'error');
            return redirect()->back()->withErrors($validator)
                ->withInput()->with(['status' => 'Terjadi Kesalahan', 'title' => 'Pemesanan', 'type' => 'error']);
        }

        // Validasi apakah input email valid
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            Alert::alert('Kesalahan', 'Format Email tidak valid', 'error');
            return redirect()->back()->with('email', 'Format Email tidak valid');
        }

        // email
        if (Invoice::where('email', $request->email)->exists()) {
            $invoice = Invoice::where('email', $request->email)->first();

            $transaksiBelumSelesai = Invoice::where('id', $invoice->id)
                ->where(function($query) {
                    $query->where('id_status', 1)
                        ->orWhere('tarif', 0)
                        ->orWhere('is_paid', 0);
                })->exists();

            if ($transaksiBelumSelesai) {
                Alert::alert('Kesalahan', 'Email sedang digunakan di transaksi lain', 'error');
                return redirect()->back()->withInput()->with('error', 'Email sedang digunakan di transaksi lain.');
            }
        }

        // no whatsapp
        if (Invoice::where('no_whatsapp', $request->no_whatsapp)->exists()) {
            $invoice = Invoice::where('no_whatsapp', $request->no_whatsapp)->first();

            $transaksiBelumSelesai = Invoice::where('id', $invoice->id)
                ->where(function($query) {
                    $query->where('id_status', 1)
                        ->orWhere('tarif', 0)
                        ->orWhere('is_paid', 0);
                })->exists();

            if ($transaksiBelumSelesai) {
                Alert::alert('Kesalahan', 'No Whatsapp sedang digunakan di transaksi lain ', 'error');
                return redirect()->back()->withInput()->with('error', 'No Whatsapp sedang digunakan di transaksi lain.');
            }
        }

        $tanggal_jam = $request->tanggal . ' ' . $request->jam;

        Invoice::create([
            'id_status' => 1,
            'id_jenis_pembayaran' => $request->jenis_pembayaran,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat_penjemputan' => $request->alamat_penjemputan,
            'alamat_tujuan' => $request->alamat_tujuan,
            'tanggal_jam' => $tanggal_jam,
            'jumlah_penumpang' => $request->jumlah_penumpang,
            'no_whatsapp' => $request->no_whatsapp,
            'barang' => $request->barang,
            'tarif' => 0,
            'is_paid' => 0,
        ]);

        Alert::alert('Berhasil', 'Pemesanan berhasil diproses ', 'success');
        return redirect('/')->withSuccess('Pemesanan berhasil diproses');
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
        $id_armada = (int) $request->id_armada;
        $tarif = intval($request->tarif);

        $invoice->update([
            'kode_transaksi' => $kode_transaksi,
            'id_armada' => $id_armada,
            'tarif' => $tarif,
        ]);

        Alert::alert('Berhasil', 'Tarif berhasil ditambahkan ', 'success');
        return redirect()->route('invoice.index')->withSuccess('Tarif berhasil ditambahkan');
    }
}
