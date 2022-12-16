@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.gestionusers.create')}}">Añadir Usuario</a>
    <h1>Gestión usuarios</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop