<div>
    <div class="card">

        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
        </div>
        
        @if($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.gestionusers.edit', $user)}}">Editar</a>
                                    </td>
                                    <td width="10px">
                                        @can('admin.gestionusers.destroy')
                                            <form method="POST" action="{{route('admin.gestionusers.destroy', $user)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        @endcan
                                        
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>

                </table>
            
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No se encuentran registros.</strong>
            </div>
        @endif
    </div>
</div>

