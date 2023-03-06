<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
