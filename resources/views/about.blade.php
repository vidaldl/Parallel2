@extends('layouts.index')
@section('style')
<style>
    .portfolio h2 {
    color: #3742fa;
    margin-bottom: 25px;
    }

    .portfolio-grid {
    margin-top: 65px;
    }

    .portfolio-grid .row {
    margin: 0;
    }

    .portfolio-grid .row > div {
    padding: 0;
    }

    .portfolio-grid .row > div .card img {
    width: 100%;

    }
    .portfolio-grid .row > div .card {

    margin-bottom: 0px;
    }
    /* BUTTON STYLE */
    .btn {
      background-color: {{$styles[0]->button_primary}};
    }

    .btn:hover {
      background-color: {{$styles[0]->button_secondary}};
    }
    #contact .form button[type="submit"] {
      background: {{$styles[0]->button_primary}};
    }
    #contact .form button[type="submit"]:hover {
      background: {{$styles[0]->button_secondary}};
    }

    /* PRIMARY COLOR STYLES */
    .h1color {
      color: {{$styles[0]->primary_color}};
    }

    .btn-ghost:hover {

      color: {{$styles[0]->primary_color}};
    }
    .scrolltop {
      background: {{$styles[0]->primary_color}};
    }
    #header {
      background: {{$styles[0]->primary_color}};
    }
    .nav-menu ul li:hover {
      background: {{$styles[0]->primary_color}};
    }
    #mobile-nav ul .menu-has-children i.fa-chevron-up {
      color: {{$styles[0]->primary_color}};
    }
    #mobile-nav ul .menu-item-active {
      color: {{$styles[0]->primary_color}};
    }
    .stats-col .circle {
      border: 6px solid {{$styles[0]->primary_color}};
    }
    .features h2 {
      color: {{$styles[0]->primary_color}};
    }
    .feature-col .feature-icon {
      background: {{$styles[0]->primary_color}};
    }
    .feature-col h3 {
      color: {{$styles[0]->primary_color}};
    }
    .cta {
      background-color: {{$styles[0]->primary_color}};
    }
    .portfolio h1 {
      color: {{$styles[0]->primary_color}};
    }
    .team h2 {
      color: {{$styles[0]->primary_color}};
    }
    .team .card:hover .card-title-wrap {
      background-color: {{$styles[0]->primary_color}};
    }

    #contact .info i {
      color: {{$styles[0]->primary_color}};
    }

    .site-footer .bottom .list-inline a:hover {
      color: {{$styles[0]->primary_color}};
    }
    .site-footer .credits a {
      color: {{$styles[0]->primary_color}};
    }

    #contact {
      min-height: 85vh;
      background-color: {{$contenidoabouts[0]->back_color}};

    }
</style>
@endsection
@section('content')
    <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <a href="index.html"><img src="img/logo-hidalgo-small.png" alt="" title="" /></a> -->
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="/">Inicio</a></li>
          <li><a href="/about">Acerca De</a></li>
          <li><a href="#contact">Contacto</a></li>

        </ul>
        <ul class="nav-menu pull-right">
          <li ><a href="ghidalgo.com/webapp/login"><i class="fa fa-user-alt" style="font-size:17px;"></i>&nbsp;&nbsp;Clientes</a></li>
          <li><a href="ghidalgo.com/webapp/login"><i class="fa fa-building" style="font-size:17px;"></i>&nbsp;&nbsp;Administración</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
      <nav class="nav social-nav pull-right d-none d-lg-inline">

      </nav>

    </div>
  </header>
  <!-- #header -->
@foreach($contenidosection5s as $contenidosection5)
<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
            <h2 style="font-size:45px ">Sobre Nosotros</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i style="font-size: 28px" class="fa fa-mobile"></i>
                <p>
                  {{$contenidosection5->number}}<br>
                  <span>{{$contenidoabouts[0]->hours}}</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i style="font-size: 28px" class="fa fa-envelope"></i>
                <p>
                  Email: {{$contenidosection5->email}}<br>
                  <span>{{$contenidoabouts[0]->web_address}}</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i style="font-size: 28px" class="fa fa-map-marker-alt"></i>
                <p>
                  {!! $contenidosection5->address !!}
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row">
@foreach($contenidoabouts as $contenidoabout)
          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12" id="ifram">
            <!-- Start Map -->
            {!! $contenidoabout->map !!}
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <h2 class="h2">Misión</h2>
            <p class="p">{{$contenidoabout->mision}}</p>
            <h2 class="h2">Visión</h2>
            <p class="p">{{$contenidoabout->mision}}</p>
            <h2 class="h2">Valores</h2>
            <p class="p">{{$contenidoabout->mision}}</p>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection

@section('footer')
  @foreach($contenidosectionfooters as $contenidosectionfooter)
  <footer class="site-footer" id="footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-xs-12 text-lg-left text-center">
            <p class="copyright-text">
              © {{$contenidosectionfooter->copy}}
            </p>
            <div class="credits">

             Designed by <a href="https://siscop.net">Siscop</a>
            </div>
          </div>

          <div class="col-lg-9 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="/#inicio">Inicio</a>
              </li>

              <li class="list-inline-item">
                <a href="/#servicios">Servicios</a>
              </li>

              <li class="list-inline-item">
                <a href="/about">Acerca de</a>
              </li>

              <li class="list-inline-item">
                <a href="/#articulos">Artículos</a>
              </li>

              <li class="list-inline-item">
                <a href="/#contact">Contacto</a>
              </li>
              <li class="list-inline-item">
                <a target="_blank" href="{{$contenidosectionfooter->twitter_link}}"><i class="fab fa-twitter"></i></a> <a target="_blank" href="{{$contenidosectionfooter->facebook_link}}"><i class="fab fa-facebook"></i></a> <a target="_blank" href="{{$contenidosectionfooter->instagram_link}}"><i class="fab fa-instagram"></i></a>
              </li>
            </ul>

          </div>

        </div>
      </div>
    </div>
  </footer>
  @endforeach
@endsection
