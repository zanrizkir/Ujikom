<?php

namespace App\Models\Admin;
use App\Models\User;
use App\Models\Admin\City;
use App\Models\Admin\Alamat;
use App\Models\Admin\Province;
use App\Models\Admin\Keranjang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }
    // public function voucher()
    // {
    //     return $this->belongsTo(Voucher::class);
    // }

    // public function voucher_user()
    // {
    //     return $this->belongsTo(VoucherUser::class);
    // }
}