
@extends('layouts.app')
@section('css')
@include('bladeStyles.fonts')
<link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/ui/trumbowyg.css')}}">
<link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css')}}">
<link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/plugins/table/ui/trumbowyg.table.min.css')}}">
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">

@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Seccion de Texto 4</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"></div>
    <div class="col-md-12">
      <!-- LINE/SPACE -->
      @foreach($orders as $item)
        @if($item->id == 22)
      <form method="POST" action="{{route('line.update', 22)}}">
        @csrf
        <div class="line-space card col-md-8 offset-md-2 mt-4 mb-4">
          <a href="#" style="text-decoration: none">
            <div class="card-header py-3">
            <div class="row">
              <span class="col-md-6"><h6 class="m-0 font-weight-bold text-primary">Espacio entre:</h6></span>
                  @if($item->line == 0)
                    <select onchange="this.form.submit()" name="line-display-hidden" class="col-md-6  float-right">
                      <option selected>Nada</option>
                      <option value = "1">Línea</option>
                      <option value = "2">Margen</option>
                    </select>
                  @endif
            </div>
          </div>
          </a>
          @if($item->line != 0)
          <div id="collapse12">
            <div class="card-body row">
            <div class="col-md-6 offset-md-3">
              <div class="row">
                <div class="col-md-6">
                  <label for="line-display">Espacio:</label>
                  <select name="line-display" onchange="this.form.submit()">
                    <option value="0">No Mostrar</option>
                  @if($item->line == 1)
                    <option value="1" selected>Línea</option>
                    <option value="2">Margen</option>
                    @elseif($item->line == 2)
                    <option value="1">Línea</option>
                    <option value="2" selected>Margen</option>
                    @endif
                  </select>
                </div>
                <div class="col-md-6 {{$item->line == 2 ? 'd-none' : ''}}">

                    <label for="line-display">Estilo de Línea:</label>
                    <select name="line-style" onchange="this.form.submit()">
                      @if($item->line_style == 1)
                        <option value="1" selected>Parcial</option>
                        <option value="2">Completo</option>
                      @elseif($item->line_style == 2)
                        <option value="1">Parcial</option>
                        <option value="2" selected>Completo</option>
                      @endif
                    </select>

                </div>
              </div>
            </div>
          </div>
          </div>
          @endif
        </div>
      </form>
        @endif
      @endforeach
      <!-- END LINE/SPACE -->
    </div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">
          <form action="{{route('text4.update')}}" method="post">
            @csrf
              <div class="form-group d-none d-sm-block d-md-block d-lg-none">
                <img class="img-fluid px-3 px-sm-4" src="{{asset('img/sections/text.png')}}">
              </div>
              <div class="form-group">
                <label for="text" class="col-form-label">Texto</label>
                <div style="background-color: #cccccc">
                  <textarea id="text" type="input" name="text"  class="form-control @error('text') is-invalid @enderror">{{ $text->text }}</textarea>
                </div>
                  @error('text')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="back_color" class="col-form-label">Color de Fondo</label>
                <input id="back_color" type="input" name="back_color" class="form-control @error('back_color') is-invalid @enderror"  value="{{ $text->back_color }}">
                  @error('background_color')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>

        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script src="{{asset('lib/trumbowyg/dist/trumbowyg.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/noembed/trumbowyg.noembed.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/base64/trumbowyg.base64.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/table/trumbowyg.table.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js')}}"></script>
<script>
$('#back_color').spectrum({
  preferredFormat: "hex",
  showInput: true,
});
$('#text').trumbowyg({
  btns: [
    ['viewHTML'],
    ['fontfamily'],
    ['formatting'],
    ['fontsize'],
    ['foreColor', 'backColor'],
    ['strong', 'em', 'del'],
    ['link'],
    ['base64'],
    ['noembed'],
    ['insertAudio'],
    ['image'],
    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
    ['unorderedList', 'orderedList'],
    ['horizontalRule'],
    ['removeformat'],
    ['table'],
    ['fullscreen']
  ],
  plugins: {
      fontfamily: {
          fontList: [
            @foreach($font_styles as $font)
            {name: '{{$font->name}}', family: '{{$font->name}}, sans-serif'},
            @endforeach
              {name: 'Arial', family: 'Arial, Helvetica, sans-serif'},
              {name: 'Open Sans', family: '\'Open Sans\', sans-serif'}
          ]
      }
  }
});
// document.getElementById('ifra').contentDocument.location.reload(true);
</script>
@endsection
