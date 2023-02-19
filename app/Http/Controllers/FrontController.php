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
        $produk = Produk::with('kategori','image')->get();
        // $images = Image::all();
        // $kategoris = Kategori::all();
        return view('template.user.produk', compact('produk'));
    }

    public function produkdetail(Produk $produk, Image $images)
    {
        return view('template.user.detailproduk', compact('produk', 'images'));
    }

    // public function tag()
    // {
    //     $tag_slug = Tag::all();
    //     // dd($tag_slug);
    //     return view('template.user.produk',compact('tag_slug'));
    // }
    
    public function user()
    {
        return view('user');
    }
}