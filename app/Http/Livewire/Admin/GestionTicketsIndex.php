<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Incidencia;
use App\Models\Aula;
use App\Models\Tipo;
use App\Models\Estado;
use App\Models\User;
use Livewire\WithPagination;

class GestionTicketsIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $incidencias = Incidencia::where('instituto_id', auth()->user()->instituto_id)->paginate();
        $aulas = Aula::all();
        $tipos = Tipo::all();
        $estados = Estado::all();
        $users = User::all();
        
        return view('livewire.admin.gestion-tickets-index', compact('incidencias','aulas','tipos','estados','users'));
    }
}

