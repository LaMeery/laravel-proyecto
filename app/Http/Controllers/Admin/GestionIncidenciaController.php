<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Incidencia;
use App\Models\Estado;
use App\Models\Tipo;
use App\Models\Aula;
use App\Models\Instituto;
use Spatie\Permission\Models\Role;

class GestionIncidenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.gestiontickets.index')->only('index');
        $this->middleware('can:admin.gestiontickets.edit')->only('edit', 'update');
        $this->middleware('can:admin.gestiontickets.create')->only('create', 'store');
        $this->middleware('can:admin.gestiontickets.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.gestiontickets.index');
    }

    public function edit(Incidencia $gestionticket)
    {
        User::select(['instituto_id']);
        $tipos = Tipo::all();
        $estados = Estado::all();
        $institutos = User::query()->select(['instituto_id'])
        ->where('id', auth()->user()->id)
        ->get();

        foreach ($institutos as $instituto){
            $instituto_id = $instituto->instituto_id;
        }

        $aulas = Aula::where('instituto_id', $instituto_id)->get();
        return view('admin.gestiontickets.edit', ['gestionticket'=>$gestionticket, 'tipos'=>$tipos, 'aulas'=>$aulas, 'estados'=>$estados]);
    }

    public function update(Request $request, Incidencia $gestionticket)
    {
        $institutos = User::query()->select(['instituto_id'])
        ->where('id', auth()->user()->id)
        ->get();

        foreach ($institutos as $instituto){
            $instituto_id = $instituto->instituto_id;
        }

       $gestionticket->estado_id = $request->estado_id;
       $gestionticket->user_id = $gestionticket->user_id;
       $gestionticket->tipo_id = $gestionticket->tipo_id;
       $gestionticket->aula_id = $gestionticket->aula_id;
       $gestionticket->descripcion = $gestionticket->descripcion;
       $gestionticket->instituto_id = $instituto_id;

       $gestionticket->update();

       return redirect()->route('admin.gestiontickets.index');
    }

    public function destroy(Incidencia $gestionticket)
    {
        $gestionticket->delete();

        return redirect()->route('admin.gestiontickets.index');
    }
}
