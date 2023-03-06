<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\City;
use App\Models\Admin\Citie;
use App\Models\Admin\Province;
use App\Models\Admin\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alamat extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
