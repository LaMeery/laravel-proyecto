<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipo;

class AjaxController extends Controller
{
    public function tipo(Request $request){

         $tipo=Tipo::find($request->input('id'));
        return response(json_encode($tipo),200);
    }

}
