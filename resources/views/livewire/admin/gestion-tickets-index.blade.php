<div>
    <div class="card">

        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese un estado, aula, tipo de incidencia o profesor para buscar">
        </div>

        @if($incidencias->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo De Incidencia</th>
                            <th>Descripción</th>
                            <th>Aula</th>
                            <th>Profesor</th>
                            <th>Estado</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($incidencias as $gestionticket)
                            <tr>
                                <td>{{ $gestionticket->id }}</td>
                                @foreach ($tipos as $tipo)
                                    @if($tipo->id == $gestionticket->tipo_id)
                                        <td>{{ $tipo->tipo_incidencia }}</td>
                                    @endif
                                @endforeach
                                <td style="width:50%">{{ $gestionticket->descripcion }}</td>
                                @foreach ($aulas as $aula)
                                    @if($aula->id == $gestionticket->aula_id)
                                        <td>{{ $aula->cod_aula }}</td>
                                    @endif
                                @endforeach
                                @foreach ($users as $user)
                                    @if($user->id == $gestionticket->user_id)
                                        <td>{{ $user->name }}</td>
                                    @endif
                                @endforeach
                                @foreach ($estados as $estado)
                                    @if($estado->id == $gestionticket->estado_id)
                                        <td>{{ $estado->estado }}</td>
                                    @endif
                                @endforeach
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.gestiontickets.edit', $gestionticket)}}">Editar</a>
                                </td>
                                <td width="10px">
                                    @can('admin.gestiontickets.destroy')
                                        <form method="POST" action="{{route('admin.gestiontickets.destroy', $gestionticket)}}">
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
                {{$incidencias->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No se encuentran registros.</strong>
            </div>
        @endif
    </div>
</div>

