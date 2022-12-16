@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <a class="btn btn-secondary" href="#">Añadir Incidencia</a>
    <h1>Mostrar Incidencia</h1>
@stop

@section('content')
    @livewire('user.incidencias-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop