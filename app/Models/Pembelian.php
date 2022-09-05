<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    public function barang(){
        return $this->hasOne(Barang::class, 'id_barang','id_barang');
    }
    public function supplier(){
        return $this->hasOne(Supplier::class, 'id_supplier','id_supplier');
    }
}
