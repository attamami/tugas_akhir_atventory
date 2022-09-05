<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesd extends Model
{
    public function penjualan(){
        return $this->belongsTo(Penjualan::class,'foreign_key', 'id_penjualan');
    }
}
