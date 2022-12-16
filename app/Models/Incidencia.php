<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function instituto(){
        return $this->belongsTo('App\Models\Instituto');
    }

    //relacion uno a muchos
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    //relacion uno a muchos
    public function estados(){
        return $this->hasMany('App\Models\Estado');
    }

    //relacion uno a muchos
    public function tipos(){
        return $this->hasMany('App\Models\Tipo');
    }

    //relacion uno a muchos (inversa)
    public function aula(){
        return $this->belongsTo('App\Models\Aula');
    }

}
