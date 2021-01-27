@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Administración de Usuarios</h1>
@stop

@section('content')
@if(auth()->user()->rol == 'Administrador')
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">                    
                    <div class="card-header">
                        <a href="users/create" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear
                            nuevo usuario</a>
                    </div>
                    <div class="card-body">                        
                        <table class="table table-striped " id="users" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Hotel</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->rol }}</td>
                                        <td>{{ $user->hotel }}</td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" class="formulario-eliminar" method="POST">
                                                <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-info ">Editar</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="formulario-eliminar" class="btn btn-danger">Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Creación de Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="formulario" id="formulario" action="/admin/users" method="POST">
                        @csrf
                        <div class="mb-3" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede
                                contener numeros, letras y guion bajo.</p>
                        </div>
                        <div class="mb-3" id="grupo__correo">
                            <label for="correo" class="formulario__label">Correo Electrónico</label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="form-control" name="correo" id="correo"
                                    placeholder="correo@correo.com">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos,
                                guiones y guion bajo.</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Rol</label>
                            <select class="form-control" id="rol" name="rol" type="text" placeholder="Nombre">
                                <option>Administrador</option>
                                <option>Usuario</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Selecciona un hotel</label>
                                    <select class="form-control" id="hotel" name="hotel">
                                        <option disabled selected>Selecciona un Hotel</option>
                                        <option value="" >Administrador</option>
                                        @foreach ($hoteles as $hotel)                                        
                                        <option>{{ $hotel->nombre_hotel }}</option>                                       
                                        @endforeach   
                                    </select>
                        </div>
                        <div class="mb-3" id="grupo__password">
                            <label for="password" class="formulario__label">Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="form-control" name="password" id="password">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">La contraseña tiene que ser de 8 a 12 dígitos.</p>
                        </div>
                        <div class="mb-3" id="grupo__password2">
                            <label for="password2" class="formulario__label">Repetir Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="form-control" name="password2" id="password2">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                        </div>
                        <div class="formulario__mensaje" id="formulario__mensaje">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario
                                correctamente. </p>
                        </div>
                        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado
                            exitosamente!</p>

                        <div class="modal-footer">
                            <a href="/admin/users" class="btn btn-secondary" tabindex="5">Cancelar</a>                           
                            <button type="submit" class="btn btn-primary">Guardar</button>                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @stop


    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="/css/estilos.css">
        <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    @stop

    @section('js')
        <!-- <script> console.log('Hi!'); </script> -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <!-- importaciones para descarga  -->
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
           $('.formulario-eliminar').submit(function(e){
               e.preventDefault();
               swal({
                title: "¿Esta seguro de eliminar este usuario?",
                text: "El usuario se eliminara definitivamente del sistema",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {                    
                    swal("Usuario eliminado correctamente", {
                    icon: "success",
                    });
                    this.submit();
                } else {
                    swal("El usuario no ha sido eliminado");
                }
                });
           });  
        </script>
        <script>
            $(document).ready(function() {
                $('#users').DataTable({
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Entradas",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    dom: 'Blfrtip',
                    "scrollX": true,
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ]
                });
            });

        </script>
        <script src="/js/formulario.js"></script>


@stop
