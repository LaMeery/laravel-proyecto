<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function instituto(){
        return $this->belongsTo('App\Models\Instituto');
    }

    //relacion uno a muchos
    public function incidencias(){
        return $this->hasMany('App\Models\Incidencia');
    }
}
