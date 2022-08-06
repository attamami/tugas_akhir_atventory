<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Barang extends Model
{
    public function barangbaru(){
        return $this->belongsTo(Brgbaru::class,'foreign_key', 'id_barang');
    }
    public function pembelian(){
        return $this->belongsTo(Restok::class,'foreign_key', 'id_barang');
    }
    public function penjualan(){
        return $this->belongsTo(Penjualan::class,'foreign_key', 'id_barang');
    }
}
