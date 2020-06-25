@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/ui/trumbowyg.css')}}">
  <link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css')}}">
  <link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/plugins/table/ui/trumbowyg.table.min.css')}}">
  <link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/btnswitch/jquery.btnswitch.css') }}" rel="stylesheet">
  <style media="screen">
  .tgl-sw-swipe + .btn-switch {
    background: #e74a3b;
  }
  </style>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Sección Contacto</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"></div>
    <div class="col-md-12">
    @foreach($orders as $item)
      @if($item->id == 8)
        <form method="POST" action="{{route('line.update', 8)}}">
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
            <div id="collapse8">
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
    </div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">

          <form method="POST" action="{{route('section5.update', $contenidosection5s[0]->id)}}" enctype="multipart/form-data">
            @csrf

              <div class="form-group d-none d-sm-block d-md-block d-lg-none">
                <img class="img-fluid px-3 px-sm-4" src="{{asset('img/sections/section4.png')}}">
              </div>
              <div class="form-group">
                <label for="title" class="col-form-label">Titulo</label>
                <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{ $contenidosection5s[0]->title }}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="success" class="col-form-label">Mensaje al enviar</label>
                <input id="success" type="input" name="success" class="form-control @error('success') is-invalid @enderror"  value="{{ $contenidosection5s[0]->success }}">
                  @error('success')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="errors" class="col-form-label">Mensaje de error</label>
                <input id="errors" type="input" name="errors" class="form-control @error('errors') is-invalid @enderror"  value="{{ $contenidosection5s[0]->errors }}">
                  @error('errors')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="map" class="col-form-label">Mapa:</label>
                <div id="map"></div>
              </div>
              <div class="form-group">
                <label for="map_iframe" class="col-form-label">Embed de Google Maps:</label>
                <input id="map_iframe" type="input" name="map_iframe" class="form-control @error('map_iframe') is-invalid @enderror"  value="{{ $contenidosection5s[0]->map_iframe }}">
                  @error('map_iframe')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="info" class="col-form-label">Información de Contacto:</label>
                <textarea id="info" type="input" name="info" class="form-control @error('info') is-invalid @enderror">{{ $contenidosection5s[0]->info }}</textarea>
                  @error('info')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="back_color" class="col-form-label">Color de Fondo:</label>
                <input id="back_color" type="input" name="back_color" class="form-control @error('back_color') is-invalid @enderror"  value="{{ $contenidosection5s[0]->back_color }}">
              </div>
              <div class="form-group">
                <label for="back_form" class="col-form-label">Fondo del Formulário</label>
                <input id="back_form" type="input" name="back_form" class="form-control @error('back_form') is-invalid @enderror"  value="{{ $contenidosection5s[0]->back_form }}">
              </div>
              <div class="form-group">
                <label for="name" class="col-form-label">Name</label>
                <input id="name" type="input" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ $contenidosection5s[0]->name }}">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="email" class="col-form-label">Email</label>
                <input id="email" type="input" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ $contenidosection5s[0]->email }}">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="phone" class="col-form-label">Phone</label>
                <input id="phone" type="input" name="phone" class="form-control @error('phone') is-invalid @enderror"  value="{{ $contenidosection5s[0]->phone }}">
                  @error('phone')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="services" class="col-form-label">Services</label>
                <input id="services" type="input" name="services" class="form-control @error('services') is-invalid @enderror"  value="{{ $contenidosection5s[0]->services }}">
                  @error('services')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="servicios">Servicios Ofrecidos - Contacto</label><br>
                <a href="{{route('contactCategories.index')}}" style="color: white" class="btn btn-primary"><i class="fal fa-edit"></i>&nbsp;Servicios</a>
              </div>
              <div class="form-group">
                <label for="subject" class="col-form-label">Subject</label>
                <input id="subject" type="input" name="subject" class="form-control @error('subject') is-invalid @enderror"  value="{{ $contenidosection5s[0]->subject }}">
                  @error('subject')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="message" class="col-form-label">Message</label>
                <input id="message" type="input" name="message" class="form-control @error('message') is-invalid @enderror"  value="{{ $contenidosection5s[0]->message }}">
                  @error('message')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="send_button" class="col-form-label">Botón de Enviar</label>
                <input id="send_button" type="input" name="send_button" class="form-control @error('send_button') is-invalid @enderror"  value="{{ $contenidosection5s[0]->send_button }}">
                  @error('send_button')
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
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script>
$('#map').btnSwitch({
  Theme:'Swipe',
  OnText: "Si",
  OffText: "No",
  OnValue: '1',
  OnCallback: function(val) {

    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("section5.update", 1)}}',
           data:{"_token": "{{ csrf_token() }}",
           val:val
          },
           success:function(data){
              alert(data.success);
           }
        });

    },
  OffValue: '0',
  OffCallback: function (val) {
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("section5.update", 1)}}',
           data:{"_token": "{{ csrf_token() }}",
           val:val
          },
           success:function(data){
              alert(data.success);
           }
        });

  },
  @if($contenidosection5s[0]->map == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});
</script>

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
$('#back_form').spectrum({
  preferredFormat: "hex",
  showInput: true,
});
$('#info').trumbowyg({
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

</script>
@endsection
