<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $invoice = Invoice::all();
        $count_invoice = Invoice::all()->count();
        $count_cash = Invoice::where('id_jenis_pembayaran', 1)->get()->count();
        $count_transfer = Invoice::where('id_jenis_pembayaran', 2)->get()->count();
        // $count_tenagapengajar = Pegawai::all()->count();
        // $count_kegiatan = Kegiatan::all()->count();
        // $count_artikel = Artikel::all()->count();

        return view('admin.dashboard', compact(
            'invoice',
            'count_invoice',
            'count_cash',
            'count_transfer',
            // 'count_artikel'
        ));
    }
}
