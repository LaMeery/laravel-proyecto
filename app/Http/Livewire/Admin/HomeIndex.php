<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Incidencia;
use App\Models\Instituto;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class HomeIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $users = User::query()->select(['id','name','instituto_id'])
        ->where('id', auth()->user()->id)
        ->get();

        foreach ($users as $us){
            $user_id = $us->id;
            $user_ins_id = $us->instituto_id;
            $user_name = $us->name;
        }
        
        $users2 = User::all();
        $incidencias = Incidencia::all();
        $instituto = Instituto::all();
        $misIncidenciasCount = 0;
        $incidenciasCount = 0;
        $usuariosCount = 0;
        $nombreInstituto = "";
        foreach ($incidencias as $inc){
            if($inc->user_id == $user_id){
                $misIncidenciasCount = $misIncidenciasCount+1;
            }
        }
        foreach ($users2 as $us2){
            if($us2->instituto_id == $user_ins_id){
                $usuariosCount = $usuariosCount+1;
            }
        }
        foreach ($instituto as $ins){
            if($ins->id == $user_ins_id){
                $nombreInstituto = $ins->name_ies;
            }
        }
        foreach ($incidencias as $inc){
            if($inc->instituto_id == $user_ins_id){
                $incidenciasCount = $incidenciasCount+1;
            }
        }
        return view('livewire.admin.home-index', compact('user_name','incidenciasCount','misIncidenciasCount','nombreInstituto','usuariosCount'));
    }
}
