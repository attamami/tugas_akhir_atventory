<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    public function piutang(){
        return $this->belongsTo(Piutang::class,'foreign_key', 'id_piutang');
    }
    public function penjualan(){
        return $this->belongsTo(Penjualan::class,'foreign_key', 'id_penjualan');
    }
}
