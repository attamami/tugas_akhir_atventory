<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brgbaru extends Model
{
    public function barang(){
        return $this->hasOne(Barang::class, 'id_barang','id_barang');
    }
}
