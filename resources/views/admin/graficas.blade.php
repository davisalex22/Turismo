@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Gráficas</h1>
@stop

@section('content')
    @if (auth()->user()->rol != 'Administrador')
        <section>
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card card-widget widget-user">
                                <div class="widget-user-header text-white" style="background: #212529">
                                    <h3 class="widget-user-username text-center">Establecimiento: {{ auth()->user()->hotel }}</h3>
                                    <h5 class="widget-user-desc text-centert">Gráficas</h5>
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle" src="../img/edificio.png" alt="User Avatar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Filtros</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <label>Rango de Fecha</label>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="dateIncio"
                                                        name="dateInicio" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="dateFin" name="dateFin" />
                                                </div>
                                            </div>
                                        </div>
                                        @if (auth()->user()->rol != 'Administrador')
                                            <button class="btn btn-primary">Generar Gráfica</button>
                                        @endif
                                    </div>
                                    @if (auth()->user()->rol == 'Administrador')
                                        <div class="col-6 col-md-4">
                                            <div class="form-group">
                                                <label>Selecciona Hotel</label>
                                                <select class="form-control" id="hotelGrafica" name="hotelGrafica">
                                                    <option disabled selected>Selecciona un Hotel</option>
                                                    @foreach ($hoteles as $hotel)
                                                        <option>{{ $hotel->nombre_hotel }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label>Selecciona Columna</label>
                                            <select class="form-control" id="varGrafica" name="varGrafica">
                                                <option disabled selected>Selecciona una variable</option>
                                                <option>Checkins</option>
                                                <option>Checkouts</option>
                                                <option>Pernoctaciones</option>
                                                <option>Nacionales</option>
                                                <option>Extranjeros</option>
                                                <option>Habitaciones Ocupadas</option>
                                                <option>Habitaciones Disponibles</option>
                                                <option>Tipo Tarifa</option>
                                                <option>Tarifa Promedio</option>
                                                <option>TarPer</option>
                                                <option>Ventas Netas</option>
                                                <option>Porcentaje Ocupación</option>
                                                <option>Revpar</option>
                                                <option>Empleados Temporales</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label>Selecciona Gráfica</label>
                                            <select class="form-control" name="tipoGrafica" id="tipoGrafica"
                                                onchange="generarGrafica();">
                                                <option value="" disabled selected>Selecciona una gráfica</option>
                                                <option value="bar">Gráfica de Barras</option>
                                                <option value="line">Gráfica de Líneas</option>
                                                <option value="pie">Gráfica de Pastel</option>
                                                <option value="scatter">Gráfica de Dispersión</option>
                                            </select>
                                        </div>
                                        @if (auth()->user()->rol == 'Administrador')
                                            <button class="btn btn-primary">Generar Gráfica</button>
                                        @endif
                                    </div>
                                </div>
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
                            <h3 class="card-title">Gráfica</h3>
                        </div>
                        <div class="card-body">
                            <div class="row col-12">
                                <canvas id="myChart" width="400" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="..vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../vendor/daterangepicker/daterangepicker.css">

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="../vendor/moment/moment.min.js"></script>
    <script src="../vendor/inputmask/jquery.inputmask.min.js"></script>
    <script src="../vendor/daterangepicker/daterangepicker.js"></script>
    <script src="../vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../js/graficas.js"></script>
    <script>
        $(function() {
            $('input[name="dateInicio"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            });
            $('input[name="dateInicio"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });
            $('input[name="dateInicio"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });

    </script>
    <script>
        $(function() {
            $('input[name="dateFin"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10)
            });
            $('input[name="dateFin"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });
            $('input[name="dateFin"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });

    </script>
@stop
