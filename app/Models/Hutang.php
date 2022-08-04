<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    public function supplier(){
        return $this->hasOne(Supplier::class, 'id_supplier','id_supplier');
    }
}
