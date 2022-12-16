@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('user.create')}}">Añadir Incidencia</a>
    <h1>Mis Incidencias</h1>
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