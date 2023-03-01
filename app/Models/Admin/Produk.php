<?php

namespace App\Models\Admin;

use App\Models\Admin\Tag;
use App\Models\Admin\Image;
use App\Models\Admin\Kategori;
use App\Models\Admin\Keranjang;
use App\Models\Admin\ProdukTag;
use App\Models\Admin\RiwayatProduk;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['name','hpp','harga','stok','diskon','deskripsi','slug'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function riwayatProduk()
    {
        return $this->hasMany(RiwayatProduk::class);
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->as('tags');
    }

    public function produkTag()
    {
        return $this->hasMany(ProdukTag::class,'produk_id');
    } 

    public  function getRouteKeyName(){
        return 'slug';
    }
}
