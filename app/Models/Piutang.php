<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    public function outlet(){
        return $this->hasOne(Outlet::class, 'id_outlet','id_outlet');
    }
}
