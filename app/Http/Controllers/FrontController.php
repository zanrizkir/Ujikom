<?php

namespace App\Http\Controllers;
// use App\Models\Produk;
// use App\Models\Kategori;
// use App\Models\Image;
// use App\Models\User;
// use App\Models\Keranjang;
use App\Models\User;
use App\Models\Admin\Tag;
use App\Models\Admin\Image;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\Admin\Kategori;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProdukTag;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function profileuser(Request $request)
    {
        $users = User::all();
        return view('template.user.profile', compact('users'));
    }
    public function homeuser(Request $request)
    {
        $produk = Produk::all();
        $images = Image::all();
        $kategoris = Kategori::all();
        return view('template.user.home', compact('produk','kategoris','images'));
    }
    public function produkuser(Request $request)
    {
        // $tag = $request->all();
        
        $produk = Produk::with('image')->get();
        $kategori = $request->all();
        if ($kategori ) {
            $produk = Produk::where('kategori_id', $kategori['kategori'])->get();
        }
        // if ($tag ) {
        //     $produk = Produk::where('tag_id', $tag['tag'])->get();
        // }
        
        // $produk = $produk->get();
        $kategoris = Kategori::all();
        // $tags = Tag::all();
        // dd($tag);
        return view('template.user.produk', compact('produk','kategoris'));
    }

    public function produkdetail(Produk $produk,Kategori $kategoris ,Image $images, Tag $tags )
    {
        $images = Image::where('produk_id' , $produk->id)->get();
        $tags = ProdukTag::where('produk_id', $produk->id)->get();
        $kategoris = Kategori::all();
        // dd($kategori);
        return view('template.user.detailproduk', compact('produk', 'images','kategoris','tags'));
    }
    public function user(Request $request)
    {
        $kategori = $request->all();
        $produk = Produk::with('image')->get();
        if ($kategori) {
            $produk = Produk::where('kategori_id', $kategori['kategori'])->get();
        }
        $kategoris = Kategori::all();
        return view('user', compact('produk','kategoris'));
    }
    
    
}