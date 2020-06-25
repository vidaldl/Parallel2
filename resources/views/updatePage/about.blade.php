
@extends('layouts.app')
@section('css')
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Acerca de</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"><iframe class="" src="/about"  width="100%" height="450"></iframe></div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">

          <form method="POST" action="{{route('about.update', $contenidoabouts[0]->id)}}" enctype="multipart/form-data">
            @csrf

              <div class="form-group d-none d-sm-block d-md-block d-lg-none">
                <img class="img-fluid px-3 px-sm-4" src="{{asset('img/sections/sectionAbout.png')}}">
              </div>
              <div class="form-group">
                <label for="hours">Horarios</label>
                <input id="hours" name="hours" class="form-control @error('hours') is-invalid @enderror" value="{{$contenidoabouts[0]->hours}}">
                @error('hours')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="web_address">Dirección Web</label>
                <input id="web_address" name="web_address" class="form-control @error('web_address') is-invalid @enderror" value="{{$contenidoabouts[0]->web_address}}">
                @error('web_address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="mision" class="col-form-label">Misión</label>
                <textarea id="mision" name="mision" class="editors form-control @error('mision') is-invalid @enderror"  >{{ $contenidoabouts[0]->mision }}</textarea>
                  @error('mision')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="vision" class="col-form-label">Visión</label>
                <textarea id="vision"  name="vision" class="editors form-control @error('vision') is-invalid @enderror">{{ $contenidoabouts[0]->vision }}</textarea>
                  @error('vision')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="valores" class="col-form-label">Valores</label>
                <textarea id="valores"  name="valores" class="editors form-control @error('valores') is-invalid @enderror">{{ $contenidoabouts[0]->valores }}</textarea>
                  @error('valores')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="map" class="col-form-label">Mapa</label>
                <input id="map" name="map" class="form-control @error('map') is-invalid @enderror" value="{{ $contenidoabouts[0]->map }}">
                  @error('map')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="back_color">Color de Fondo</label><br>
                <input onchange="this.form.submit()" class="form-control col-md-6"  name="back_color" type="text" id="back_color" value="{{ $contenidoabouts[0]->back_color }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>


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
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.0/classic/ckeditor.js"></script>
<script>
var allEditors = document.querySelectorAll('.editors');
for (var i = 0; i < allEditors.length; ++i) {
  ClassicEditor.create( allEditors[i], {
        removePlugins: ['Autoformat', 'Heading', 'Link' ],
        toolbar: ['undo', 'redo', 'bold', 'italic', 'numberedList', 'bulletedList']
      });
}
</script>

@endsection
