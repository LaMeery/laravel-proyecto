@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Crear Incidencias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.gestionusers.store']) !!}
                <div >
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Introduce el nombre del usuario" name='name' id="name" maxlength="100" required />
                </div>
                <div >
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Introduce el email del usuario" name='email' id="email" maxlength="249" required />
                </div>
                <br>
                <p>La contraseña por defecto es '12345678' deberá cambiarla una vez inicie sesión dicho usuario</p>
                <div>
                    <button class="btn btn-secondary col-md-2" name="CrearUsuario" type="submit">Crear Usuario</button>
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