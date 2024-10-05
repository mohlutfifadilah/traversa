<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Invoice;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(){
        $invoice = Invoice::all();
        $count_invoice = Invoice::all()->count();
        $count_cash = Invoice::where('id_jenis_pembayaran', 1)->get()->count();
        $count_transfer = Invoice::where('id_jenis_pembayaran', 2)->get()->count();

        $data1 = Invoice::select('id_jenis_pembayaran', DB::raw('count(*) as total'))
                ->groupBy('id_jenis_pembayaran')
                ->get();

        // Ambil nama armada berdasarkan id_jenis_pembayaran
        $labels1 = $data1->map(function($invoice) {
            return Pembayaran::find($invoice->id_jenis_pembayaran)->nama_pembayaran;
        });

        $totals1 = $data1->pluck('total');

        $armadas = Invoice::select('id_armada', DB::raw('SUM(tarif) as total_tarif'))
                ->groupBy('id_armada')
                ->get();

        $income = Invoice::sum('tarif');

        $count_armada = Armada::all()->count();

        // $data2 = Invoice::select('id_armada', DB::raw('count(*) as total'))
        //         ->groupBy('id_armada')
        //         ->get();

        // // Ambil nama armada berdasarkan id_armada
        // $labels2 = $data2->map(function($invoice) {
        //     return Armada::find($invoice->id_armada)->nama_armada;
        // });

        // $totals2 = $data2->pluck('total');

        return view('admin.dashboard', compact(
            'invoice',
            'count_invoice',
            'count_cash',
            'count_transfer',
            'labels1',
            'totals1',
            'armadas',
            'income',
            'count_armada',
            // 'totals2'
        ));
    }
}
