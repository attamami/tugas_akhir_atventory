<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function hutang(){
        return $this->belongsTo(Hutang::class,'foreign_key', 'id_hutang');
    }
    public function pembelian(){
        return $this->belongsTo(Pembelian::class,'foreign_key', 'id_pembelian');
    }
}
