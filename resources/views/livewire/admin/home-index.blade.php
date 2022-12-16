<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css" >
        .tile-stats{
            position: relative;
            display: block;
            margin-bottom: 12px;
            border: 1px solid #E4E4E4;
            overflow: hidden;
            padding-bottom: 5px;
            background-color:rgba(255, 255, 255, 0.205);
            border-radius: 5px;
        }
        .tile-stats .count, .tile-stats h3, .tile-stats p {
            position: relative;
            margin: 0 0 0 10px;
            z-index: 5;
            padding: 0;
            color: rgb(114, 3, 3);
        }
        .tile-stats .count {
            font-size: 38px;
            font-weight: 700;
            line-height: 1.65857;
        }
        .col-xs-12{
            width: 100%;
        }
        div{
            display:block;
        }
        body {
            font-family: "Helvetica Neue",Roboto,Arial,"Droid Sans",sans-serif;
            font-size: 13px;
            font-weight:400;
            line-height: 1.471;
        }
    </style>
</head>
<body>
    
<div>
    <p>Bienvenid@ a la gestión de incidencias: {{$user_name}} </p>
    <p>Centro de procedencia: {{$nombreInstituto}}</p>
    <p>Aquí tiene un resumen de su gestión:</p>
    <br><br>
    <div style="text-align:center">
        <div class="page-title">
            <div class="row top_tiles">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="count">{{$incidenciasCount}}</div>
                      <h3><i class="fa fa-list"></i> Incidencias Pendientes</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon"></div>
                      <div class="count">{{$misIncidenciasCount}}</div>
                      <h3><i class="fa fa-list-alt"></i> Mis Incidencias</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                      <div class="icon"></div>
                      <div class="count">{{$usuariosCount}}</div>
                      <h3><i class="fa fa-users"></i> Usuarios</h3>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


</body>
</html>
