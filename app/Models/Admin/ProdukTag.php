<?php

namespace App\Models\Admin;

use App\Models\Admin\Tag;
use App\Models\Admin\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukTag extends Model
{
    use HasFactory;

    protected $table = 'produk_tag';
    protected $fillable = ['produk_id', 'tag_id'];

    
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    

}
