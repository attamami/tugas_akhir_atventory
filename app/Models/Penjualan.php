<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    public function barang(){
        return $this->hasOne(Barang::class, 'id_barang','id_barang');
    }
    public function sales(){
        return $this->hasOne(Salesd::class, 'id_sales','id_sales');
    }
    public function outlet(){
        return $this->hasOne(Outlet::class, 'id_outlet','id_outlet');
    }
}
