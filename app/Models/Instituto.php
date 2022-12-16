<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    use HasFactory;

    //relacion uno a muchos
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    //relacion uno a muchos
    public function aulas(){
        return $this->hasMany('App\Models\Aula');
    }

    //relacion uno a muchos
    public function incidencias(){
        return $this->hasMany('App\Models\Incidencia');
    }

}
