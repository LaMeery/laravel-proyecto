<div>
    <div class="card">

        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese un estado, aula o tipo de incidencia para buscar">
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
                            <th>Estado</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($incidencias as $incidencia)
                            <tr>
                                <td>{{ $incidencia->id }}</td>
                                @foreach ($tipos as $tipo)
                                    @if($tipo->id == $incidencia->tipo_id)
                                        <td>{{ $tipo->tipo_incidencia }}</td>
                                    @endif
                                @endforeach
                                <td style="width:50%">{{ $incidencia->descripcion }}</td>
                                @foreach ($aulas as $aula)
                                    @if($aula->id == $incidencia->aula_id)
                                        <td>{{ $aula->cod_aula }}</td>
                                    @endif
                                @endforeach
                                @foreach ($estados as $estado)
                                    @if($estado->id == $incidencia->estado_id)
                                        <td>{{ $estado->estado }}</td>
                                    @endif
                                @endforeach
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('user.edit', $incidencia)}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form method="POST" action="{{route('user.destroy', $incidencia)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
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

