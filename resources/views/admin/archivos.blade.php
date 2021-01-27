@extends('adminlte::page')

@section('title', 'Carga de Archivos')

@section('content_header')
<h1>Carga de Archivos</h1>
@stop

@section('content')
@if(auth()->user()->rol == 'Administrador')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <section style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Carga de archivos
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('archivo.import') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Seleccione un archivo</label>
                                    <input type="file" class="form-control" name="files[]" multiple/>
                                </div>
                                <button type="submit" class="btn btn-primary">Cargar Archivo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Registros de archivos</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped " id="archivos" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nombre del archivo</th>
                                        <th scope="col">Fecha de subida</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
                                        <tr>
                                            <th scope="row">{{ $file->id }}</th>
                                            <td>{{ $file->name }}</td>
                                            <td>{{ $file->created_at }}</td>
                                            <td>
                                                <form action="{{ route('archivos.destroy', $file->id) }}" class="formulario-eliminar" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    <a target="_blanck" href="../storage/{{ $file->name }}"
                                                        class="btn btn-info">Descargar</a>
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
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
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
            title: "¿Esta seguro de eliminar este archivo?",
            text: "El usuario se eliminara definitivamente del sistema",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {   
                this.submit();
            } else {
                swal("El archivo no ha sido eliminado");
            }
            });
       });  
    </script>
    <script>
        $(document).ready(function() {
            $('#archivos').DataTable({
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

@stop
