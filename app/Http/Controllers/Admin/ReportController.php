<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Illuminate\Http\Request;
use App\Models\Admin\Transaksi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function transaksi(Request $request)
    {
        $start = $request->tanggal;
        $end = $request->tanggal_berakhir;

        if ($end >= $start) {
            $tm = Transaksi::whereBetween('tanggal_transaksi', [$start, $end])->get();
            // dd($tm);
            $pdf = PDF::loadview('admin.laporan.print', compact('tm', 'start', 'end'));
            return $pdf->stream('laporan-transaksi.pdf');
        } elseif ($end < $start) {
            Session::flash("flash_notification", [
                "level" => "danger",
                "message" => "Tanggal Yang Dimasukkan Tidak Valid",
            ]);
            return redirect()->back();
        }
    }
}
