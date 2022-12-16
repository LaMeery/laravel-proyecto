<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Incidencia;
use App\Models\Estado;
use App\Models\Tipo;
use App\Models\Aula;
use App\Models\Instituto;
use Spatie\Permission\Models\Role;

class IncidenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user.index')->only('index');
        $this->middleware('can:user.edit')->only('edit', 'update');
        $this->middleware('can:user.create')->only('create', 'store');
        $this->middleware('can:user.destroy')->only('destroy');
    }

    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        User::select(['instituto_id']);
        $tipos = Tipo::all();
        $institutos = User::query()->select(['instituto_id'])
        ->where('id', auth()->user()->id)
        ->get();

        foreach ($institutos as $instituto){
            $instituto_id = $instituto->instituto_id;
        }

        $aulas = Aula::where('instituto_id', $instituto_id)->get();
        return view('user.create', ['tipos'=>$tipos, 'aulas'=>$aulas]);
    }

    public function store(Request $request)
    {
        $institutos = User::query()->select(['instituto_id'])
        ->where('id', auth()->user()->id)
        ->get();

        foreach ($institutos as $instituto){
            $instituto_id = $instituto->instituto_id;
        }

       $incidencia = new Incidencia();

       $incidencia->estado_id = 1;
       $incidencia->user_id = auth()->user()->id;
       $incidencia->descripcion = $request->descripcion;
       $incidencia->tipo_id = $request->tipo_id;
       $incidencia->aula_id = $request->aula_id;
       $incidencia->instituto_id = $instituto_id;

       $incidencia->save();

       return redirect()->route('user.index');

    }

    public function edit(Incidencia $incidencia)
    {
        User::select(['instituto_id']);
        $tipos = Tipo::all();
        $institutos = User::query()->select(['instituto_id'])
        ->where('id', auth()->user()->id)
        ->get();

        foreach ($institutos as $instituto){
            $instituto_id = $instituto->instituto_id;
        }

        $aulas = Aula::where('instituto_id', $instituto_id)->get();
        return view('user.edit', ['incidencia'=>$incidencia, 'tipos'=>$tipos, 'aulas'=>$aulas]);
    }

    public function update(Request $request, Incidencia $incidencia)
    {
        $institutos = User::query()->select(['instituto_id'])
        ->where('id', auth()->user()->id)
        ->get();

        foreach ($institutos as $instituto){
            $instituto_id = $instituto->instituto_id;
        }

       $incidencia->estado_id = $incidencia->estado_id;
       $incidencia->user_id = auth()->user()->id;
       $incidencia->descripcion = $request->descripcion;
       $incidencia->tipo_id = $request->tipo_id;
       $incidencia->aula_id = $request->aula_id;
       $incidencia->instituto_id = $instituto_id;

       $incidencia->update();

       return redirect()->route('user.index');
    }

    public function destroy(Incidencia $incidencia)
    {
        $incidencia->delete();

        return redirect()->route('user.index');
    }
}
