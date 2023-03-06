<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\User;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\Admin\Transaksi;
use App\Models\Admin\RiwayatProduk;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
     {
        $date = new DateTime();
        $pendapatan_transaksi = Transaksi::whereYear('created_at', $date->format('Y'))->sum('total_harga');
        $pembelian_produk_jan = Transaksi::whereMonth('created_at','01')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_feb = Transaksi::whereMonth('created_at','02')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_mar = Transaksi::whereMonth('created_at','03')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_apr = Transaksi::whereMonth('created_at','04')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_mei = Transaksi::whereMonth('created_at','05')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_jun = Transaksi::whereMonth('created_at','06')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_jul = Transaksi::whereMonth('created_at','07')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_agu = Transaksi::whereMonth('created_at','08')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_sep = Transaksi::whereMonth('created_at','09')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_okt = Transaksi::whereMonth('created_at','10')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_nov = Transaksi::whereMonth('created_at','11')->whereYear('created_at', $date->format('Y'))->count();
        $pembelian_produk_des = Transaksi::whereMonth('created_at','12')->whereYear('created_at', $date->format('Y'))->count();

        $data_barang = RiwayatProduk::whereYear('created_at', $date->format('Y'))->sum('type');
        $data_barangmasuk_jan = RiwayatProduk::whereMonth('created_at','01')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_feb = RiwayatProduk::whereMonth('created_at','02')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_mar = RiwayatProduk::whereMonth('created_at','03')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_apr = RiwayatProduk::whereMonth('created_at','04')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_mei = RiwayatProduk::whereMonth('created_at','05')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_jun = RiwayatProduk::whereMonth('created_at','06')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_jul = RiwayatProduk::whereMonth('created_at','07')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_agu = RiwayatProduk::whereMonth('created_at','08')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_sep = RiwayatProduk::whereMonth('created_at','09')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_okt = RiwayatProduk::whereMonth('created_at','10')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_nov = RiwayatProduk::whereMonth('created_at','11')->whereYear('created_at', $date->format('Y'))->count();
        $data_barangmasuk_des = RiwayatProduk::whereMonth('created_at','12')->whereYear('created_at', $date->format('Y'))->count();
        $users = User::where('role', auth()->user()->role = 'costumer')->count();
        $produk = Produk::all();

        return view('admin.index',['active' => 'Dashboard'],compact('users','produk',
        'pembelian_produk_jan',
        'pembelian_produk_feb',
        'pembelian_produk_mar',
        'pembelian_produk_apr',
        'pembelian_produk_mei',
        'pembelian_produk_jun',
        'pembelian_produk_jul',
        'pembelian_produk_agu',
        'pembelian_produk_sep',
        'pembelian_produk_okt',
        'pembelian_produk_nov',
        'pembelian_produk_des',
        'pendapatan_transaksi',
        'data_barangmasuk_jan',
        'data_barangmasuk_feb',
        'data_barangmasuk_mar',
        'data_barangmasuk_apr',
        'data_barangmasuk_mei',
        'data_barangmasuk_jun',
        'data_barangmasuk_jul',
        'data_barangmasuk_agu',
        'data_barangmasuk_sep',
        'data_barangmasuk_okt',
        'data_barangmasuk_nov',
        'data_barangmasuk_des',
        'data_barang'


        ));
    }

}
