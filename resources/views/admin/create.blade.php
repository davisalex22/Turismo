@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Administración de Usuarios</h1>
@stop

@section('content')
<h2>Crear registro</h2>

<form action="/admin/users" method = "POST">
    @csrf
    <div class = "mb-3">
        <label for="" class = "form-label">Nombre</label>
        <input id = "name" name = "name"  type="text" class ="form-control" tabindex = "2">
    </div>
    <div class = "mb-3">
        <label for="" class = "form-label">Correo</label>
        <input id = "email" name = "email"  type="email" class ="form-control" tabindex = "3">
    </div>
    <div class = "mb-3">
        <label for="" class = "form-label">Rol</label>
        <input id = "rol" name = "rol"  type="text" class ="form-control" tabindex = "4">
    </div>
    <div class = "mb-3">
        <label for="" class = "form-label">Contraseña</label>
        <input id = "password" name = "password"  type="password" class ="form-control" tabindex = "4">
    </div>


    <!-- botones -->
    <a href="/admin/users" class ="btn btn-secondary" tabindex = "5">Cancelar</a>
    <button type = "submit" class ="btn btn-primary" tabindex = "4">Guardar</button>

</form>


@endsection