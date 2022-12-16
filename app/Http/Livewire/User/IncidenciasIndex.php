<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Incidencia;
use App\Models\Aula;
use App\Models\Tipo;
use App\Models\Estado;
use Livewire\WithPagination;

class IncidenciasIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $incidencias = Incidencia::where('user_id', auth()->user()->id)->paginate();
        $aulas = Aula::all();
        $tipos = Tipo::all();
        $estados = Estado::all();
        
        return view('livewire.user.incidencias-index', compact('incidencias','aulas','tipos','estados'));
    }
}
