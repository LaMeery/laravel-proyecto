<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function Incidencia(){
        return $this->belongsTo('App\Models\Incidencia');
    }
}
