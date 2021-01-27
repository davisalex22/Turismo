@extends('layouts.interna')
@section('header')
    <header id="header" class="fixed-top ">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="{{ url('/') }}">Observatorio de Turismo<br>Región Sur del Ecuador</a></h1>
                    <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li class="menu-active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('estadisticas') }}">Estadísticas</a></li>
                            <li><a href="{{ url('lugares') }}">Lugares Turísticos</a></li>
                            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{ url('admin') }}">Administración</a></li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
@stop
@section('contenido')


@stop

@section('css')
   
@stop

@section('js')
  
@stop