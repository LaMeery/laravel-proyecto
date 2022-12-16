<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.gestionusers.index')->only('index');
        $this->middleware('can:admin.gestionusers.edit')->only('edit', 'update');
        $this->middleware('can:admin.gestionusers.destroy')->only('destroy');
    }

    
    
    public function index()
    {
        return view('admin.gestionusers.index');
    }

    public function create()
    {
        User::select(['instituto_id']);
        $institutos = User::query()->select(['instituto_id'])
        ->where('id', auth()->user()->id)
        ->get();

        foreach ($institutos as $instituto){
            $instituto_id = $instituto->instituto_id;
        }

        return view('admin.gestionusers.create', ['instituto'=>$instituto_id]);
    }

    public function store(Request $request)
    {
        User::select(['instituto_id']);
        $institutos = User::query()->select(['instituto_id'])
        ->where('id', auth()->user()->id)
        ->get();

        foreach ($institutos as $instituto){
            $instituto_id = $instituto->instituto_id;
        }

       $user = new User();

       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = '$2y$10$iPiC4oPV/ct0Oy1j.Plvq.XiHyWflGdV2fWLUWQ2R6LmUn90wxIIe';
       $user->instituto_id = $instituto_id;

       $user->save();

       return redirect()->route('admin.gestionusers.index');

    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.gestionusers.edit', compact('user', 'roles'));
    }

    
    public function update(Request $request, User $user)
    {
       $user->roles()->sync($request->roles);
       
       return redirect()->route('admin.gestionusers.edit', $user)->with('info', 'Se asignaron los roles correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.gestionusers.index');
    }
}
