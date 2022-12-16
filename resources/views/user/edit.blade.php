@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Editar Incidencia</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($incidencia, ['route' => ['user.update', $incidencia], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{$incidencia->id}}" disabled>
                </div>
                <div >
                    <label for="aula_id" class="form-label">Aula</label>
                    <select class="form-control" name='aula_id' id='aula_id' required>
                        @foreach ($aulas as $aula)
                            @if($aula->id==$incidencia->aula_id)
                                <option value="{{$aula->id}}" selected>{{$aula->cod_aula}}</option>
                            @else
                                <option value="{{$aula->id}}">{{$aula->cod_aula}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div >
                    <label for="tipo_id" class="form-label">Tipo de incidencia</label>
                    <select class="form-control" name='tipo_id' id='tipo_id' required>
                        @foreach ($tipos as $tipo)
                            @if($tipo->id==$incidencia->tipo_id)
                                <option value="{{$tipo->id}}" selected>{{$tipo->tipo_incidencia}}</option>
                            @else
                                <option value="{{$tipo->id}}">{{$tipo->tipo_incidencia}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div >
                    <label for="descripcion" class="form-label">Descripción de la Incidencia</label>
                    <textarea style="height:100px; width:30%; resize:none;" type="text" class="form-control" placeholder="" name='descripcion' id="descripcion" value="" maxlength="249" required >{{$incidencia->descripcion}}</textarea>
                </div>
                <br>
                <div>
                    <button class="btn btn-secondary col-md-2" name="EditarIncidencia" type="submit">Editar Incidencia</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

        $(document).ready(function(){
                
            $("#tipo_id").change(function(){
         
        
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            
                var id=$("select[name=tipo_id]").val();
                if (id!=0){
                    $.ajax({
                        url: '{{route('ajax.tipo')}}',
                        method:'post',
                        data:{'id':id},
                        success:function(data){
                            var datos=JSON.parse(data);
                            $("#descripcion").attr("placeholder", datos.descripcion);
                        
                        }
                    });
                
                }else{
                    alert("Tipo de incidencia no seleccionada");
                }
            
            });
        });
    </script>
@stop