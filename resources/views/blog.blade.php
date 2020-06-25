@extends('layouts.index')
@section('style')
<style>
    .portfolio h2 {
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
    #contact h2 {
      color: {{$styles[0]->primary_color}};
    }
    #contact .info i {
      color: {{$styles[0]->primary_color}};
    }
    #contact .form #sendmessage {
      color: {{$styles[0]->primary_color}};
      border-color: {{$styles[0]->primary_color}};
    }
    .site-footer .bottom .list-inline a:hover {
      color: {{$styles[0]->primary_color}};
    }
    .site-footer .credits a {
      color: {{$styles[0]->primary_color}};
    }
</style>
@endsection
@section('content')
<section class="hero" id="inicio" style="background-image: url({{ '/storage/' . $contenidosection1s[0]->background_image }});height:100px;background-position:center;">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">

        </div>
      </div>

      <div class="col-md-12" id="h1color">
          <h1>
            @if($contenidosection1s[0]->carousel == 1)
              {{$contenidosection1s[1]->title}}
            @else
              {{$contenidosection1s[0]->title}}
            @endif
          </h1>

          <div class="tagline">
            @if($contenidosection1s[0]->carousel == 1)
              {!! $contenidosection1s[1]->tagline !!}
            @else
              {!! $contenidosection1s[0]->tagline !!}
            @endif
          </div>

      </div>
    </div>

  </section>

  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <a href="#inicio"><img src="img/logo-hidalgo-small.png" alt="" title="" /></a> -->
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
          <li ><a href="{{redirect('http://ghidalgo.com/webapp/login')}}"><i class="fa fa-user-alt" style="font-size:17px;"></i>&nbsp;&nbsp;Clientes</a></li>
          <li><a href="{{redirect('http://ghidalgo.com/webapp/login')}}"><i class="fa fa-building" style="font-size:17px;"></i>&nbsp;&nbsp;Administración</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
      <nav class="nav social-nav pull-right d-none d-lg-inline">

      </nav>

    </div>
  </header>
  <!-- #header -->

  <section class="portfolio" id="articulos">




    <!-- Isotope Menu -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h1 class="text-center mb-5">
          {{$contenidosection4s[0]->title}}
        </h1>
      <div class="awesome-menu ">
        <ul class="project-menu">
          <li>
            <a href="#" class="active" data-filter="*">Todo</a>
          </li>

            @foreach($categories as $category)
            <li>
              <a  href="#" data-filter=".{{$category->name}}">{{$category->name}}</a>
            </li>
            @endforeach

        </ul>
      </div>
    </div>
    <!-- /Isotope Menu -->
    <!--Portfolio -->

    <div id="isotope-wrapper" class="isotope-wrapper">
       <div class="portfolio-grid">
         <div class="container">
           <div class="row">
           @foreach($posts->sortByDesc('published_at') as $post)
             <div class="col-lg-4 col-sm-12 col-xs-12 item {{$post->category->name}}">
                 <div class="card card-block">
                   <a href="#" data-toggle="modal" data-target="#modal{{$post->id}}"><img class="img-thumbnail" alt="" src="{{ '/storage/' . $post->image }}">
                     <div class="portfolio-over">
                       <div>
                         <h3 class="card-title">
                           {{ $post->title }}
                         </h3>
                         <p class="card-text">
                           {{ $post->description }}
                         </p>
                       </div>
                     </div></a>
                 </div>
             </div>
             <!--MODAL1 BEGINNIG-->
             <div class="modal fade" id="modal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $post->id }}" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                 <div class="modal-content  super-iframe-holder">
                   <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                   <div class="modal-body" >
                     <div class="row" style="padding: 5px;">

                         <div class="post-information col-md-12" style="padding: 15px">
                           <h2>{{ $post->title }}</h2>
                             <span><i class="fa fa-user"></i> <small>{{$users[0]->username}}</small></span> &nbsp;
                             <span><i class="fa fa-clock-o"></i> <small>{{$post->published_at->format('d M Y')}}</small></span> &nbsp;
                             <span><i class="fa fa-tags"></i> <small>{{$post->category->name}}</small></span> &nbsp;
                         </div>
                         <div class="col-md-6 imgModal" >
                         <img src="{{ '/storage/' . $post->image }}" style="width:100%" class="img-fluid rounded" alt="">
                       </div>
                       <div class="col-md-6 mb-3 textModal">
                         <div class="container">
                           {!! $post->contenido !!}
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="modal-footer">

                       <div class="row">
                         <a href="#contact" onclick="$('#modal{{ $post->id }}').modal('hide')" class="btn btn-sm mr-3" style="border-radius: 0px; margin-bottom: 0px;">Más Información &rarr;</a>
                       </div>

                   </div>

                 </div>
               </div>
             </div>

             <!--END MODAL1-->
           @endforeach

             </div>
           </div>
        </div>
     </div>

    <!--/Portfolio-->

  </section>

<!--Contacto-->
@foreach($contenidosection5s as $contenidosection5)
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="section-title">{{$contenidosection5->title}}</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4">
          <div class="info">
            <div>
              <i class="fa fa-map-marker-alt"></i>
              <p>{!! $contenidosection5->address !!}</p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              <p>{{$contenidosection5->email}}</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>{{$contenidosection5->number}}</p>
            </div>


          </div>
        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Escribe algo para nosotros!" placeholder="Mensaje"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Enviar</button></div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
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
              <a href="#inicio">Inicio</a>
            </li>

            <li class="list-inline-item">
              <a href="#servicios">Servicios</a>
            </li>

            <li class="list-inline-item">
              <a href="/about">Acerca de</a>
            </li>

            <li class="list-inline-item">
              <a href="#articulos">Artículos</a>
            </li>

            <li class="list-inline-item">
              <a href="#contact">Contacto</a>
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
