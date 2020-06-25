@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Artículos</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"><iframe class="" src="/#articuloss"  width="100%" height="450"></iframe></div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">

          <form method="POST" action="{{route('section4.update', $contenidosection4s[0]->id)}}" enctype="multipart/form-data">
            @csrf

              <div class="form-group d-none d-sm-block d-md-block d-lg-none">
                <img class="img-fluid px-3 px-sm-4" src="{{asset('img/sections/section4.png')}}">
              </div>
              <div class="form-group">
                <label for="title" class="col-form-label">Titulo</label>
                <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{ $contenidosection4s[0]->title }}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="tagline" class="col-form-label">Sub-Titulo</label>
                <input id="tagline" name="tagline" class="form-control @error('tagline') is-invalid @enderror" value="{{ $contenidosection4s[0]->tagline }}">
                  @error('tagline')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="button" class="col-form-label">Botón</label>
                <input id="button" type="input" name="button" class="form-control @error('button') is-invalid @enderror"  value="{{ $contenidosection4s[0]->button }}">
                  @error('button')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="link" class="col-form-label">Enlace</label>
                <input list="sections" id="link" type="input" name="link" class="form-control @error('button') is-invalid @enderror"  placeholder="Http://" value="{{$contenidosection4s[0]->link}}">
                <small class="form-text text-muted">Asegurece de que el Link Contiene &nbsp;HTTP:// &nbsp;Antes de la Dirección</small>
                  @error('link')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="back_color">Color de Fondo</label><br>
                <input onchange="this.form.submit()" class="form-control col-md-6"  name="back_color" type="text" id="back_color" value="{{ $contenidosection4s[0]->back_color }}">
              </div>
              <div class="form-group">
                <a class="btn btn-primary float-left" href="{{ route('posts.index') }}"><i class="fas fa-newspaper"></i> &nbsp; Editar Artículos</a>
                <button type="submit" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>

          <!-- LINK SECTION LIST -->
          <datalist id="sections">
            <option value="#inicio">Inicio</option>
            <option value="#servicios">Servicios</option>
            <option value="#infoSlider">Slider de Info.</option>
            <option value="#articulos">Artículos</option>
            <option value="#contact">Contacto</option>
            <option value="/blog">Más Artículos</option>
          </datalist>
          <!-- /LINK SECTION LIST -->

        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script>
  $('#back_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
</script>
@endsection
@section('css')
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
@endsection
