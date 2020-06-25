
@extends('layouts.app')

@section('css')
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
<link href="{{ asset('lib/btnswitch/jquery.btnswitch.css') }}" rel="stylesheet">
<link href="{{ asset('lib/flexdatalist/jquery.flexdatalist.min.css') }}" rel="stylesheet">
<style>
.note-editable { background-color: #3742FA!important; color: white; }
.tgl-sw-swipe + .btn-switch {
  background: #4e73df;
}
</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Sección Información</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"></div>
    <div class="col-md-12">
      <!-- LINE/SPACE -->
      @foreach($orders as $item)
        @if($item->id == 7)
      <form method="POST" action="{{route('line.update', 7)}}">
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
          <div id="collapse7">
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

          <form method="POST" action="{{route('section3.update', $contenidosection3s[0]->id)}}" enctype="multipart/form-data">
            @csrf

              <div class="form-group d-none d-sm-block d-md-block d-lg-none">
                <img class="img-fluid px-3 px-sm-4" src="{{asset('img/sections/section3.png')}}">
              </div>
              <div class="form-group">
                <label for="title" class="col-form-label">Titulo</label>
                <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{ $contenidosection3s[0]->title }}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="contenido" class="col-form-label">Contenido</label>
                <textarea id="contenido" name="contenido" class="form-control @error('contenido') is-invalid @enderror"  >{{ $contenidosection3s[0]->contenido }}</textarea>

                  @error('contenido')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="button" class="col-form-label">Botón</label>
                <input id="button" type="input" name="button" class="form-control @error('button') is-invalid @enderror"  value="{{ $contenidosection3s[0]->button }}">
                  @error('button')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <!-- Link-FILE -->
                <div class="form-group">
                  <label for="media_type">Acción del Boton</label>
                  <div id="media_type"></div>

                  <div class="form-row mb-4">
                    <div class="col-md-6" id="type_link">
                      <label for="link" class="col-form-label">Enlace</label>
                      <input id="link" type="input" placeholder="Https://" name="link" class="form-control flexdatalist @error('link') is-invalid @enderror"  value="{{ $contenidosection3s[0]->link }}">
                    </div>
                    <div class="col-md-6" id="type_file">
                      <label class="col-form-label">Seleccionar Archivo:</label><br>
                      <select name="file">
                        <option value="">--Seleccionar Archivo--</option>
                        @foreach($files as $file)
                          @if($contenidosection3s[0]->link == 'storage/' . $file->file)
                            <option value="{{'storage/' . $file->file}}" selected>{{$file->display_name}}</option>
                          @elseif($contenidosection3s[0]->link != 'storage/' . $file->file)
                            <option value="{{'storage/' . $file->file}}">{{$file->display_name}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              <!-- /Link-FILE -->

              <div class="form-group">
                <label for="background_color" class="col-form-label">Color de Fondo</label>
                <input id="background_color" type="input" name="background_color" class="form-control @error('background_color') is-invalid @enderror"  value="{{ $contenidosection3s[0]->background_color }}">
                  @error('background_color')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="text_color" class="col-form-label">Color del Texto</label>
                <input id="text_color" type="input" name="text_color" class="form-control @error('text_color') is-invalid @enderror"  value="{{ $contenidosection3s[0]->text_color }}">
                  @error('text_color')
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
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.0/classic/ckeditor.js"></script>
<script>
ClassicEditor.create( document.querySelector( '#contenido' ), {
      removePlugins: [ 'Heading', 'Link' ],
      toolbar: [ 'bold', 'italic', 'mediaEmbed'],


    }).then( editor => {
        console.log( Array.from( editor.ui.componentFactory.names() ) );
    } ).catch( error => {
        console.error( error );
    } );


</script>
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
  @if($contenidosection3s[0]->link_type == 1)
  $('#type_link').hide();
  @else
  $('#type_file').hide();
  @endif
});

$('#media_type').btnSwitch({
Theme:'Swipe',
OnText: "Link",
OffText: "File",
OnValue: '0',
OnCallback: function(val) {
  $('#type_file').hide();
  $('#type_link').show();

  $.ajax({
         type:'POST',
         dataType: 'json',
         url:'/updatesection3/1',
         data:{"_token": "{{ csrf_token() }}",
         val:val
        },
         success:function(data){
            alert(data.success);
         }
      });
  },
OffValue: '1',
OffCallback: function (val) {
  $('#type_link').hide();
  $('#type_file').show();

  $.ajax({
         type:'POST',
         dataType: 'json',
         url:'/updatesection3/1',
         data:{"_token": "{{ csrf_token() }}",
         val:val
        },
         success:function(data){
            alert(data.success);
         }
      });
},
@if($contenidosection3s[0]->link_type == 1)
ToggleState: true
@else
ToggleState: false
@endif
});



  $('#background_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
  $('#text_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
</script>
@endsection
