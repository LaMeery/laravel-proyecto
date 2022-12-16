<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function incidencia(){
        return $this->belongsTo('App\Models\Incidencias');
    }
}
