@extends('layouts.interna')

@section('header')
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
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
              {{-- <li><a href="{{ url('contactos') }}">Contactos</a></li> --}}
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
    {{-- <header id="header">
        <div class="container-fluid">
            <div id="logo" class="logo">
                <!--<h1><a href="#intro" class="scrollto">Observatorio de Turismo</a></h1>-->
            </div>
            <h5 class="titlelogo">Observatorio de Turismo<br>Región Sur del Ecuador</h5>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('estadisticas') }}">Estadísticas</a></li>
                    <li><a href="{{ url('lugares') }}">Lugares Turísticos</a></li>
                    <li><a href="{{ url('contactos') }}">Contactos</a></li>
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
    </header> --}}
@stop
@section('contenido')
    <!-- ======= Intro Section ======= -->
    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active" style="background-image: url(assets/img/intro-carousel/1.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Visita la Región Sur del Ecuador</h2>
                                <a href="#featured-services"
                                    class="btn-get-started scrollto animate__animated animate__fadeInUp">Empezar</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/2.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Visita sus parques</h2>
                                <a href="#featured-services"
                                    class="btn-get-started scrollto animate__animated animate__fadeInUp">Empezar</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/3.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Conoce sus Hoteles</h2>
                                <a href="#featured-services"
                                    class="btn-get-started scrollto animate__animated animate__fadeInUp">Empezar</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/4.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Diviertete en sus sitios turísticos</h2>
                                <a href="#featured-services"
                                    class="btn-get-started scrollto animate__animated animate__fadeInUp">Empezar</a>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/5.jpg)">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">Disfruta de su Gente</h2>
                                <a href="#featured-services"
                                    class="btn-get-started scrollto animate__animated animate__fadeInUp">Empezar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section><!-- End Intro Section -->

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h3>Bienvenido</h3>
                    <p>El Observatorio Turístico, Región Sur de Ecuador se crea en el año 2016 desde la Sección de Hotelería
                        y
                        Turismo de la UTPL, con el apoyo de los departamentos Administración de Empresas y Economía, de esta
                        misma
                        universidad. Además, como socios externos de este proyecto se encuentra el Ministerio de Turismo de
                        Ecuador
                        y el Municipio de Loja. </p>
                    <h3>Gráficos Destacados</h3>
                    <img src="assets/img/infografia.png" class="img-header" alt="">
                </header>
            </div>
        </section>
        <!-- End About Us Section -->
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3 class="section-title">Lugares Turísticos</h3>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class=" col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Todo</li>
                            <li data-filter=".filter-app">Parques</li>
                            <li data-filter=".filter-card">Hoteles</li>
                            <li data-filter=".filter-web">Sitios Turísticos</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/San-Sebastian.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/app1.jpg" data-lightbox="portfolio" data-title="App 1"
                                    class="link-preview"><i class="ion ion-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="ion ion-android-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Parque San Sebastian</h4>
                                <p>Loja</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/cisne.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/cisne.jpg" class="link-preview venobox"
                                    data-gall="portfolioGallery" title="Web 3"><i class="ion ion-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="ion ion-android-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Santuraio El Cisne</a></h4>
                                <p>El Cisne</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/jipiro.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/jipiro.jpg" class="link-preview venobox"
                                    data-gall="portfolioGallery" title="App 2"><i class="ion ion-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="ion ion-android-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Parque Jipiro</a></h4>
                                <p>Loja</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/sonesta.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/sonesta.jpg" class="link-preview venobox"
                                    data-gall="portfolioGallery" title="Card 2"><i class="ion ion-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="ion ion-android-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Hotel Sonesta</a></h4>
                                <p>Loja</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/Guayabal.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/Guayabal.jpg" class="link-preview venobox"
                                    data-gall="portfolioGallery" title="Web 2"><i class="ion ion-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="ion ion-android-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Guayabal</a></h4>
                                <p>Catamayo</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/parque-Bolivar.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/parque-Bolivar.jpg" class="link-preview venobox"
                                    data-gall="portfolioGallery" title="App 3"><i class="ion ion-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="ion ion-android-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Parque Simón Bolívar</a></h4>
                                <p>Loja</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/zamorano.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/zamorano.jpg" class="link-preview venobox"
                                    data-gall="portfolioGallery" title="Card 1"><i class="ion ion-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="ion ion-android-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Zamorano Real Hotel</a></h4>
                                <p>Loja</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/hotel-victoria.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/hotel-victoria.jpg" class="link-preview venobox"
                                    data-gall="portfolioGallery" title="Card 3"><i class="ion ion-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="ion ion-android-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Grand Victoria Boutique Hotel</a></h4>
                                <p>Loja</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="assets/img/portfolio/eolico.jpg" class="img-fluid" alt="">
                                <a href="assets/img/portfolio/eolico.jpg" class="link-preview venobox"
                                    data-gall="portfolioGallery" title="Web 1"><i class="ion ion-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                        class="ion ion-android-open"></i></a>
                            </figure>

                            <div class="portfolio-info">
                                <h4><a href="portfolio-details.html">Parque Eólico Villonaco</a></h4>
                                <p>Loja</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Services Section ======= -->
        <section id="services">
            <div class="container" data-aos="fade-up">

                <header class="section-header wow fadeInUp">
                    <h3>Enlaces de Interés</h3>
                </header>

                <div class="row">

                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><img src="assets/img/EnlacesInteres/universidad.png" class="img-fluid" alt="">
                        </div>
                        <h4 class="title"><a href="https://www.utpl.edu.ec/">Universidad Técnica Particular de Loja</a></h4>
                        <p class="description">La UTPL es una institución autónoma con finalidad social y pública, imparte
                            enseñanza, desarrolla investigaciones con libertad científica administrativa, y participa en
                            planes de
                            desarrollo del país.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><img src="assets/img/EnlacesInteres/ciudad-mitad-del-mundo.png" class="img-fluid"
                                alt=""></div>
                        <h4 class="title"><a href="https://www.ecuador.com/">Ecuador</a></h4>
                        <p class="description">Ubicado en el noroeste de América del Sur, "Ecuador", cuando se traduce al
                            inglés,
                            significa "ecuador". El ecuador pasa por Ecuador, así como por Colombia y Brasil en América del
                            Sur.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><img src="assets/img/EnlacesInteres/ubicacion.png" class="img-fluid" alt=""></div>
                        <h4 class="title"><a href="https://ecuador.travel/es/">Ecuador Travel</a></h4>
                        <p class="description">¡Elige a Ecuador como el destino de tus vacaciones! Este bello país es un
                            paraíso por
                            donde lo mires. Déjate deslumbrar por su cultura expresada en sus iglesias, edificaciones y
                            ciudades
                            patrimoniales.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><img src="assets/img/EnlacesInteres/analitica.png" class="img-fluid" alt=""></div>
                        <h4 class="title"><a href="https://www.turismo.gob.ec/">Ministerio de Turismo de Ecuador</a></h4>
                        <p class="description">Somos el ente rector que planifica, gestiona, promociona, regula y controla,
                            al
                            turismo sostenible del Ecuador.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><img src="assets/img/EnlacesInteres/guia-turistico.png" class="img-fluid" alt="">
                        </div>
                        <h4 class="title"><a href="http://www.visitecuador.travel/">Visita Ecuador</a></h4>
                        <p class="description">Cómo viajar en Ecuador,a dónde ir,calendario cultural,destinos & rutas.<br>
                            Conoce experiencias de los viajeros en Ecuador !!</p>
                    </div>
                </div>


            </div>

            </div>
        </section><!-- End Services Section -->







        <!-- ======= Our Clients Section ======= -->
        <section id="clients">
            <div class="container" data-aos="zoom-in">

                <header class="section-header">
                    <h3>Hoteles</h3>
                </header>

                <div class="owl-carousel clients-carousel">
                    <img src="assets/img/clients/hotel-QuoVadis.png" alt="">
                    <img src="assets/img/clients/hotel-sonesta.png" alt="">
                    <img src="assets/img/clients/hotel-libertador.png" alt="">
                </div>

            </div>
        </section><!-- End Our Clients Section -->






    </main><!-- End #main -->
@stop
