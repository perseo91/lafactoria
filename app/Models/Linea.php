<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estacion;

class Linea extends Model
{
    use HasFactory;
    public function estaciones(){
        return $this->hasMany(Estacion::class);
    }
}
