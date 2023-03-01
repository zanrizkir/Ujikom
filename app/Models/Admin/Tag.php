<?php

namespace App\Models\Admin;

use App\Models\Admin\Produk;
use App\Models\Admin\ProdukTag;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function produks()
    {
        return $this->belongsToMany(Produk::class)->as('produks');
    }
    public function produkTag()
    {
        return $this->hasMany(ProdukTag::class,'tag_id');
    }


    public  function getRouteKeyName(){
        return 'slug';
    }
}
