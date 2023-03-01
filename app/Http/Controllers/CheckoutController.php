<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use App\Models\Admin\Produk;
use App\Models\Admin\Keranjang;
use App\Models\Admin\Transaksi;
use App\Models\Admin\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        // $users = User::where('role', 'costumer')->get();
        // $keranjangs = Keranjang::where('status', 'keranjang')->get();
        // $metode = Payment::all();
        $transaksis = Transaksi::with('keranjang','user')
        ->latest()
        ->get();
        return view('template.user.checkout', compact('transaksis','total_harga','keranjangs'));
    }
    public function create()
    {
        // $metode = Payment::all();
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
            // 'alamat' => 'required',
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
        $transaksis->kode_transaksi = 'TECH-' . $kode .date('dmy')  ;
        $transaksis->user_id = $request->user_id;
        // $transaksis->keranjang_id = $request->keranjang_id;
        $transaksis->tanggal_transaksi = now()->format('Y-m-d H:i:s');
        $transaksis->status = $transaksis->status;
        // $transaksis->jumlah = $transaksis->keranjang->jumlah;
        // $transaksis->total_harga = $transaksis->keranjang->total_harga ;


        foreach($request->keranjang_id as $keranjang){
            $detailTransaksi = new DetailTransaksi();
            $detailTransaksi->transaksi_id = $transaksis->id;
            $detailTransaksi->user_id = $transaksis->user_id;
            $detailTransaksi->keranjang_id = $keranjang;
            $detailTransaksi->save();

            $keranjangs = keranjang::where('id',$detailTransaksi->keranjang_id)->get();
            $keranjang->status = 'checkout';
            $keranjang->save();

         $produks = Produk::where('id',$keranjang->produk_id)->first();
         if ($produks->stok < $keranjang->jumlah) {
            $transaksis = Transaksi::where('id', $transaksis->id)->first();
            $transaksis->delete();
             return redirect()
                 ->route('checkout.create')
                 ->with('error', 'Stok Kurang');
         } else {
             $produks->stok -= $keranjang->jumlah;
         }
         $produks->save();
        }
        $total_harga =  DetailTransaksi::join('keranjangs', 'detailTransaksis.keranjang_id', '=', 'keranjang_id')->
        where('detail_transaksis.transaksi_id', $transaksis->id)->sum("keranjangs.total_harga");
        $transaksis->save();
         return redirect()
            ->route('checkout.thank')
            ->with('toast_success', 'Data has been added');

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
        $metode = MetodePembayaran::all();
        return view('admin.transaksi.edit', compact('keranjangs', 'transaksis', 'metode', 'users'));
    }
    public function update(Request $request, $id)
    {
        $transaksis = Transaksi::findOrFail($id);

        //validasi
        $rules = [
            'keranjang_id' => 'required',
            'metode_id' => 'required',
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
        $transaksis->metode_id = $request->metode_id;
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