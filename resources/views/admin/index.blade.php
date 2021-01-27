@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Bienvenido a la Administración</h1>
@stop

@section('content')
  <div class="col-md-6 offset-md-3">
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header text-white" style="background: #212529">
        <h3 class="widget-user-username text-center">{{ auth()->user()->name }}</h3>
        <h5 class="widget-user-desc text-centert">Usted es {{ auth()->user()->rol }}</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="img/userDefault.png" alt="User Avatar">
      </div>
      
      <div class="card-footer">
        <h3 class="widget-user-username text-center">{{ auth()->user()->email }}</h3>
      </div>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop