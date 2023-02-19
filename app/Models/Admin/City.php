<?php

namespace App\Models\Admin;

use App\Models\Admin\Alamat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function alamat()
    {
        return $this->hasMany(Alamat::class);
    }
}
