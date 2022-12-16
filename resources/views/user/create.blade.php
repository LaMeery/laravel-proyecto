@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Crear Incidencias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'user.store']) !!}
                <div >
                    <label for="aula_id" class="form-label">Aula</label>
                    <select class="form-control" name='aula_id' id='aula_id' required>
                        <option value="0" disabled selected>Selecciona un aula</option>
                        @foreach ($aulas as $aula)
                            <option value="{{$aula->id}}">{{$aula->cod_aula}}</option>
                        @endforeach
                    </select>
                </div>
                <div >
                    <label for="tipo_id" class="form-label">Tipo de incidencia</label>
                    <select class="form-control" name='tipo_id' id='tipo_id' required>
                        <option value="0" disabled selected>Selecciona un tipo</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->tipo_incidencia}}</option>
                        @endforeach
                    </select>
                </div>
                <div >
                    <label for="descripcion" class="form-label">Descripción de la Incidencia</label>
                    <textarea style="height:100px; width:30%; resize:none;" type="text" class="form-control" placeholder="" name='descripcion' id="descripcion" value="" maxlength="249" required ></textarea>
                </div>
                <br>
                <div>
                    <button class="btn btn-secondary col-md-2" name="CrearIncidencia" type="submit">Crear Incidencia</button>
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