<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin\Alamat;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\Admin\Province;
use App\Models\Admin\Transaksi;
use App\Models\Admin\Keranjang;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\DetailTransaksi;
use App\Models\Admin\MetodePembayaran;

class CheckoutController extends Controller
{
    public function thank()
    {
        return view('template.user.thanks');
    }
    public function index(Request $request)
    {
        $validated = $request->validate([
            'keranjang_id' => 'required',
        ]);
        $keranjangs =[];
        $total_harga =0;
        if ($request->keranjang_id){
            $keranjangs = Keranjang::whereIn('id', $request->keranjang_id)->get();
            $total_harga = Keranjang::whereIn('id', $request->keranjang_id)->where('status', 'keranjang')->sum("total_harga");
        }
        $transaksis = Transaksi::with('keranjang','user','province','city','alamat')
        ->latest()
        ->get();
        $users = User::where('role','costumer')->get();
        $alamats = Alamat::with('province','city')->get();
        $provinces  = Province::pluck('title', 'province_id');
        return view('template.user.checkout', compact('transaksis','total_harga','keranjangs','users','provinces','alamats'));
    }
    public function create()
    {
        // $payments = Payment::all();
        $users = User::all();
        $keranjangs = Keranjang::all();
        // $users = User::where('role', 'costumer')->get();
        // $keranjangs = Keranjang::where('status', 'keranjang')->get();
        return view('template.user.checkout', compact('keranjangs', 'users'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            // 'notlp' => 'required',
            'alamat_id' => 'required',
            'keranjang_id' => 'required',
            // 'produk_id' => 'required',
            'kode_transaksi' => 'unique:transaksis',
        ]);

        $transaksis = new Transaksi();
        $kode_transaksis = DB::table('transaksis')->select(DB::raw('MAX(RIGHT(kode_transaksi,3)) as kode'));
        if ($kode_transaksis->count() > 0) {
            foreach ($kode_transaksis->get() as $kode_transaksi) {
                $x = ((int) $kode_transaksi->kode) + 1;
                $kode = sprintf('%03s', $x);
            }
        } else {
            $kode = '001';
        }
        $transaksis->kode_transaksi = 'ZAND-' . $kode .date('dmy')  ;
        $transaksis->user_id = $request->user_id;
        $transaksis->keranjang_id = $request->keranjang_id;
        $transaksis->alamat_id = $request->alamat_id;
        $transaksis->tanggal_transaksi = now()->format('Y-m-d H:i:s');
        // $transaksis->status = $transaksis->status;
        $transaksis->total_harga = $transaksis->keranjang->total_harga;

        //  stok produk
         $produks = Produk::findOrFail($transaksis->keranjang->produk_id);
         if ($produks->stok < $transaksis->keranjang->jumlah) {
             alert()->warning('Title','Lorem Lorem Lorem');
             return redirect()
                 ->route('checkout.index')
                 ->with('toast_error', 'Stok Kurang');
         } else {
             $produks->stok -= $transaksis->keranjang->jumlah;
         }
         $produks->save();

         $keranjangs = keranjang::findOrFail($transaksis->keranjang_id);
         $keranjangs->status = 'checkout';
         $keranjangs->save();

         $transaksis->save();
         alert('Berhasil','Produk Berhasil Dipesan', 'success');
         return redirect('/thanks');




    }
    public function show($id)
    {
        $transaksis = Transaksi::findOrFail($id);
        // $users = User::all();
        // $keranjangs = Keranjang::all();
        return view('admin.transaksi.show', compact('transaksis'));
    }
    public function edit($id)
    {
        $users = User::all();
        $transaksis = Transaksi::findOrFail($id);
        $keranjangs = Keranjang::all();
        // $payments = Payment::all();
        return view('admin.transaksi.edit', compact('keranjangs', 'transaksis', 'payments', 'users'));
    }
    public function update(Request $request, $id)
    {
        $transaksis = Transaksi::findOrFail($id);

        //validasi
        $rules = [
            'keranjang_id' => 'required',
            'payment_id' => 'required',
            'notlp' => 'required',
            'alamat' => 'required',
        ];

        if ($request->kode_transaksi != $transaksis->kode_transaksi) {
            $rules['kode_transaksi'] = 'unique:transaksis';
        }
        $validasiData = $request->validate($rules);

        $transaksis->kode_transaksi = $request->kode_transaksi;
        $transaksis->user_id = $request->user_id;
        $transaksis->notlp = $request->notlp;
        $transaksis->alamat = $request->alamat;
        $transaksis->keranjang_id = $request->keranjang_id;
        $transaksis->payment_id = $request->payment_id;
        $transaksis->tanggal_pemesanan = now()->format('D-m-y H:i:s');
        $transaksis->total_harga = $transaksis->keranjang->total_harga;
        $transaksis->save();
        return redirect()
            ->route('transaksi.index')
            ->with('toast_success', 'Data has been edited');
    }
    public function destroy($id)
    {
        $transaksis = Transaksi::findOrFail($id);
        $transaksis->delete();
        return redirect()
            ->route('transaksi.index')->with('success', 'Data has been deleted');
    }
}