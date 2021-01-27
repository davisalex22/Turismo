@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
@stop

@section('content')
@if(auth()->user()->rol == 'Administrador')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">                    
                    <div class="card-header">
                        Edición del usuario {{$user->name}}
                    </div>
                    <div class="card-body">                        
                        <form action="/admin/users/{{$user->id}}" method = "POST">
                            @csrf
                            @method('PUT')
                            <div class = "mb-3">
                                <label for="" class = "form-label">Nombre</label>
                                <input id = "name" name = "name"  type="text" class ="form-control" value ="{{$user->name}}">
                            </div>
                            <div class = "mb-3">
                                <label for="" class = "form-label">Correo</label>
                                <input id = "email" name = "email"  type="text" class ="form-control" value ="{{$user->email}}">
                            </div>
                            <div class = "mb-3">
                                <label for="" class = "form-label">Rol</label>
                                <select class="form-control" id="rol" name="rol" type="text">                           
                                    <option>Administrador</option>
                                    <option >Usuario</option>
                                </select>  
                            </div>
                            <div class = "mb-3">
                                <label for="" class = "form-label">Contraseña</label>
                                <input id = "password" name = "password"  type="text" class ="form-control" value ="{{$user->password}}">
                            </div>
                    
                    
                            <!-- botones -->
                            <a href="/admin/users" class ="btn btn-secondary" tabindex = "5">Cancelar</a>
                            <button type = "submit" class ="btn btn-primary" tabindex = "4">Guardar</button>
                    
                        </form>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</section>    
@else  
    <div class="alert alert-warning alert-dismissible">
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
        No tiene acceso de Administrador
    </div>
@endif
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop