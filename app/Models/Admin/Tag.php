<?php

namespace App\Models\Admin;

use App\Models\Admin\Produk;
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
}
