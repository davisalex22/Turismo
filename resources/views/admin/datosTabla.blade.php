@extends('adminlte::page')

@section('title', 'Administración')



@section('content_header')
    <h1>Datos de Archivos almacenados</h1>
@stop

@section('content')
<section>
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                @if(auth()->user()->rol == 'Administrador')
                <div class="card-header">
                    <h3 class="card-title">Filtros</h3>
                </div>
                @endif  
                <div class="card-body">                        
                    <form action="" method = "POST">
                        @csrf
                        <div class="row">
                            @if(auth()->user()->rol == 'Administrador')
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Selecciona un hotel</label>
                                    <select class="form-control" id="filtroHotel" name="filtroHotel">
                                        <option disabled selected>Selecciona un Hotel</option>
                                        @foreach ($hoteles as $hotel)                                        
                                        <option>{{ $hotel->nombre_hotel }}</option>                                       
                                        @endforeach   
                                    </select>
                                </div>                      
                            <button class="btn btn-primary">Filtrar</button>     
                            </div>
                            <div class="col-8">
                            @else
                            <div class="col-12">
                            @endif    
                                <div class="card card-widget widget-user">
                                    <div class="widget-user-header text-white" style="background: #212529">
                                    @if(auth()->user()->rol == 'Administrador') 
                                      <h3 class="widget-user-username text-center">{{ $hotelSelect }}</h3>
                                    @else
                                      <h3 class="widget-user-username text-center">{{ auth()->user()->hotel }}</h3>
                                    @endif  
                                      <h5 class="widget-user-desc text-centert">Datos Generales</h5>
                                    </div>
                                    <div class="widget-user-image">
                                      <img class="img-circle" src="../img/edificio.png" alt="User Avatar">
                                    </div>
                                </div>
                            </div>                          
                        </div>                                  
                    </form>    
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
                            <h3 class="card-title">Datos destacados del último mes</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered " id="hoteles" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre Hotel</th>
                                        <th>Fecha</th>
                                        <th>Checkins</th>
                                        <th>Checkouts</th>
                                        <th>Pernoctaciones</th>
                                        <th>Nacionales</th>
                                        <th>Extranjeros</th>
                                        <th>H_ocupadas</th>
                                        <th>H_disponibles</th>
                                        <th>Tipo_tarifa</th>
                                        <th>Tarifa_promedio</th>
                                        <th>Tar_per</th>
                                        <th>Ventas_netas</th>
                                        <th>Porcentaje_ocupacion</th>
                                        <th>Revpar</th>
                                        <th>Empleados Temporales</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historiales as $historial)
                                        <tr>
                                            <td>{{ $historial->nombre_hotel }}</td>
                                            <td>{{ $historial->fecha }}</td>
                                            <td>{{ $historial->checkins }}</td>
                                            <td>{{ $historial->checkouts }}</td>
                                            <td>{{ $historial->pernoctaciones }}</td>
                                            <td>{{ $historial->nacionales }}</td>
                                            <td>{{ $historial->extranjeros }}</td>
                                            <td>{{ $historial->habitaciones_ocupadas }}</td>
                                            <td>{{ $historial->habitaciones_disponibles }}</td>
                                            <td>{{ $historial->tipo_tarifa }}</td>
                                            <td>{{ $historial->tarifa_promedio }}</td>
                                            <td>{{ $historial->tar_per }}</td>
                                            <td>{{ $historial->ventas_netas }}</td>
                                            <td>{{ $historial->porcentaje_ocupacion }}</td>
                                            <td>{{ $historial->revpar }}</td>
                                            <td>{{ $historial->empleados_temporales }}</td>
                                            <td>{{ $historial->estado }}</td>
                                            <td>{{ $historial->opciones }}</td>                                          
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
    <script>
        $(document).ready(function() {
            $('#hoteles').DataTable({
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
