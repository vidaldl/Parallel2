
@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Sección de Precios</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
  <!-- <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"><iframe class="" src="/#pricing"  width="100%" height="450"></iframe></div> -->
  <div class="col-md-12">
    <!-- LINE/SPACE -->
    @foreach($orders as $item)
      @if($item->id == 5)
    <form method="POST" action="{{route('line.update', 5)}}">
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
        <div id="collapse5">
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
    <div class="card mt-3 col-md-12 mb-5">
      <div class="card-body">
        <div class="card-body">
          <div class="row justify-content-center">
            <form autocomplete="off" method="POST" action="{{route('pricingSection.update', 1)}}">
              @csrf
              <div class="form-group">
                <h3>Sección de Precios</h3>
              </div>
              <div class="form-group">
                <label for="title">Título de la sección</label>
                <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{ $pricing_sections[0]->title }}">
                @error('title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="subtitle">Subtitulo</label>
                <input id="subtitle" type="input" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"  value="{{ $pricing_sections[0]->subtitle }}">
                @error('subtitle')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group mb-3">
                <button type="submit" class="btn btn-success">Actualizar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="tabs">
        <ul class="tabs-navigation horizontal">
          @foreach($pricings as $price)
          <li class="li"><a class="a" href="#price{{$price->id}}">Tabla {{$loop->iteration}}</a></li>
          @endforeach
          <li class="li"><a class="a" href="#nuevo"><i class="fas fa-plus-square"></i></a></li>
        </ul>
        @foreach($pricings as $price)
        <div id="price{{$price->id}}" class="tabdiv">
          <!-- PRICING  -->
            <div class="col-md-12">
              <div class="container">
                <h4>Tabla {{$loop->iteration}}</h4>

                <div class="row">
                  <a class="btn btn-danger mr-5 ml-auto" style="color:white;" data-toggle="modal" data-target="#modalDestroy{{$price->id}}">Eliminar &nbsp;<i class="fas fa-trash"></i></a>
                </div>

                <form autocomplete="off" method="POST" action="{{route('pricing.update', $price->id)}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label class="col-md-12 col-form-label">Imagen </label><br>
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal{{$price->id}}">Subir Imagen &nbsp;&nbsp;<i class="fas fa-image"></i></a>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-md-12 col-form-label">Titulo</label>
                      <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{ $price->title }}">
                        @error('title')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="price" class="col-md-12 col-form-label">Precio</label>
                      <input id="price" type="input" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="$" value="{{ $price->price }}">
                        @error('button')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="recurrence" class="col-md-12 col-form-label">Recurrencia</label>
                      <input id="recurrence" type="input" name="recurrence" class="form-control @error('recurrence') is-invalid @enderror" placeholder="$" value="{{ $price->recurrence }}">
                        @error('recurrence')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="button" class="col-md-12 col-form-label">Botón</label>
                      <input id="button" type="input" name="button" class="form-control @error('button') is-invalid @enderror"  value="{{ $price->button }}">
                        @error('button')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="link" class="col-form-label">Enlace</label>
                      <input list="sections" id="link" type="input" name="link" class="form-control @error('button') is-invalid @enderror"  placeholder="Http://" value="{{$price->link}}">
                      <small class="form-text text-muted">Asegurece de que el Link Contiene &nbsp;HTTP:// &nbsp;Antes de la Dirección</small>
                        @error('link')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <button type="submit" class="btn btn-success ml-auto">Actualizar</button>
                      </div>
                    </div>
                </form>
              </div>

              <!-- CARACTERISTICAS -->
            <div class="row">
                  <h4>Características</h4>

                  <div class="form-group">
                    @foreach($price->pricing_item as $item)
                      <form autocomplete="off" class="form-inline mt-3" action="{{route('pricing.update', $item->pivot->pricing_item_id)}}" method="post">
                        @csrf
                        <div class="form-group">
                          <button id="delete{{$item->pivot->pricing_item_id}}" class="btn btn-danger mr-2" type="button">X</button>
                        </div>
                        <div class="form-group">
                          <input id="items" type="input" name="items" class="form-control @error('button') is-invalid @enderror"  value="{{ $item->item }}">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-success ml-2" type="submit"><i class="fas fa-check"></i>Actualizar</button>
                        </div>
                      </form>
                    @endforeach
                    <form autocomplete="off" class="form-inline mt-5" action="{{route('pricingItem.create', $price->id)}}" method="post">
                      @csrf
                      <div class="form-group">
                        <input placeholder="Nuevo" id="items" type="input" name="item" class="form-control @error('item') is-invalid @enderror">
                        @error('item')
                          <span class="invalid-feedback" role="alert">
                            <strong>Es cecesario que escribas algo</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <button class="btn btn-primary ml-2" type="submit"><i class="fas fa-plus"></i>  Agregar</button>
                      </div>
                    </form>
                  </div>
              </div>
              <!-- /CARACTERISTICAS -->
            </div>
          <!-- /Pricing 1 -->
        </div>
        @endforeach

        <div id="nuevo" class="tabdiv">
          <!-- PRICING Add  -->
            <div class="col-md-12">
              <div class="container">
                <h4>Nueva Tabla</h4>
                <form autocomplete="off" method="POST" action="{{route('pricing.store')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="title" class="col-md-12 col-form-label">Titulo</label>
                      <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="price" class="col-md-12 col-form-label">Precio</label>
                      <input id="price" type="input" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="$">
                        @error('button')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="recurrence" class="col-md-12 col-form-label">Recurrencia</label>
                      <input id="recurrence" type="input" name="recurrence" class="form-control @error('recurrence') is-invalid @enderror">
                        @error('recurrence')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="button" class="col-md-12 col-form-label">Botón</label>
                      <input id="button" type="input" name="button" class="form-control @error('button') is-invalid @enderror">
                        @error('button')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="link" class="col-form-label">Enlace</label>
                      <input list="sections" id="link" type="input" name="link" class="form-control @error('button') is-invalid @enderror"  placeholder="Http://">
                      <small class="form-text text-muted">Asegurece de que el Link Contiene &nbsp;HTTP:// &nbsp;Antes de la Dirección</small>
                        @error('link')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success float-right">Crear</button>
                    </div>
                </form>
              </div>
            </div>
          <!-- /Pricing Add -->
        </div>

      </div>
        </div>

      </div>
    </div>
  </div>


@foreach($pricings as $pricing)
<!-- MODAL DESTROY -->
<div class="modal fade" id="modalDestroy{{$pricing->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDestroy" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4066D4;">
      <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
          Estás seguro que deseas eliminar la Tabla?
      </div>

      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="{{route('pricing.destroy', $price->id)}}" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <button id="sendLista" class="btn btn-warning">Confirmar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /MODAL DESTROY -->

<!--modal image1-->
<div class="modal fade" id="modal{{$pricing->id}}" tabindex="-1" role="dialog" aria-labelledby="modalBack" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4066D4;">
      <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label for="logo" class="col-form-label">Imagen{{$pricing->id}}</label>
              <form id="image{{$pricing->id}}" method="POST" class="image dropzone" action="{{ route('pricing.update', $pricing->id) }}" enctype="multipart/form-data">
                @csrf
              </form>
              <label class="col-form-label">Tamaños de la Imagen:</label>
              <p>Resolución: 720x360</p>
              <p>Aspect Ratio: 16/9</p>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="col-md-6">
              <img style="width:100%;" src="{{'/storage/' . $pricing->image}}" class="imgThumb{{$pricing->id}} img-fluid img-thumbnail ">
              <div class="editor{{$pricing->id}} d-none" style="height:450px; background-color: #000;">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer ">
        <button class="buttonConfirm{{$pricing->id}} btn btn-primary d-none">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- End modal image1 -->
@endforeach

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
<style>


  .tabdiv {
  	/*border-top: 1px solid #c7c7c7*/
    min-height: 450px;
  	background: white !important;
    padding: 10px 0;
  	/*border-bottom: 4px solid #E95855 !important;*/
  }

  .spans {
  	border-bottom: 4px solid #E5E5E5 !important;
  	color: #ccc !important;
  	font-weight: 300;
  	line-height: 186px !important;
  	display: block;
  	text-align: center;
  	font-size: 24px;
  }

  .tabs UL.horizontal {
  	list-style: none outside none;
  	margin: 0;
  }

  .li {
  	background: white;
  	border-bottom: 4px solid #E5E5E5;
  	margin: 0 10px 0 0;
  	display: inline-block;
  }

  .a {
  	color: #ccc;
  	display: block;
  	font-size: 18px;
  	font-weight: 300;
  	padding: 14px 24px;
  	text-decoration: none;
  }

  .li:hover {
  	background: #466699;
  	border-bottom: 4px solid #2165D1;
  }

  .tabs .li:hover A {
  	color: white;
    text-decoration: none;
  }
  .actives {
  	background: #466699 !important;
  	border-bottom: 4px solid #2165D1 !important;
  }

  .actives A {
  	color: white !important;
  }


  /* .cropper-crop-box, .cropper-view-box {
    border-radius: 50%;
  }

  .cropper-view-box {
    box-shadow: 0 0 0 1px #39f;
    outline: 0;
  }

  .cropper-face {
  background-color:inherit !important;
  }

  .cropper-dashed, .cropper-point.point-se, .cropper-point.point-sw, .cropper-point.point-nw,   .cropper-point.point-ne, .cropper-line {
  display:none !important;
  }

  .cropper-view-box {
  outline:inherit !important;
  } */
</style>
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
@endsection

@section('script')
<script src="{{ asset('lib/tabslet/jquery.tabslet.js') }}"></script>
<script>
$('.tabs').tabslet();
@foreach($pricings as $price)
  @foreach($price->pricing_item as $item)
    $('#delete{{$item->pivot->pricing_item_id}}').click(function() {
      var idDel = {{$item->pivot->pricing_item_id}};
          $.ajax({
                 type:'POST',
                 dataType: 'json',
                 url:'{{route("pricingItem.destroy", $price->id)}}',
                 data:{"_token": "{{ csrf_token() }}",
                 idDel:idDel
               },
              });
      location.reload();
    });
  @endforeach
@endforeach


</script>
<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script>
@foreach($pricings as $images)
Dropzone.options.image{{$images->id}} = {
   paramName: "image",
   transformFile: function(file, done) {
      var myDropZone = this;
      var editor = $('.editor{{$images->id}}');
      var imgThumbnail = $('.imgThumb{{$images->id}}');
      $(imgThumbnail).addClass('d-none');
      $(editor).removeClass('d-none');
      $(editor).addClass('d-block');

      // Create confirm button
      var buttonConfirm = $('.buttonConfirm{{$images->id}}');
      $(buttonConfirm).removeClass('d-none');
      $(buttonConfirm).addClass('d-block');
      $(buttonConfirm).click(function() {
        // Get the canvas with image data from Cropper.js
         var canvas = cropper.getCroppedCanvas({
           width: 720,
           height: 360
         });
         // Turn the canvas into a Blob (file object without a name)
         canvas.toBlob(function(blob) {
           // Create a new Dropzone file thumbnail
            myDropZone.createThumbnail(
              blob,
              myDropZone.options.thumbnailWidth,
              myDropZone.options.thumbnailHeight,
              myDropZone.options.thumbnailMethod,
              false,
              function(dataURL) {

                // Update the Dropzone file thumbnail
                myDropZone.emit('thumbnail', file, dataURL);
                // Return the file to Dropzone
                done(blob);
            });
         });
        // Remove the editor from the view
        $(buttonConfirm).removeClass('d-block');
        $(buttonConfirm).addClass('d-none');
      });
      // Create an image node for Cropper.js
     var image = new Image();
     image.src = URL.createObjectURL(file);
     // editor.appendChild(image);
     $(image).appendTo(editor)
     // Create Cropper.js
     var cropper = new Cropper(image, { aspectRatio: 16/9 });
   },
   init: function () {
      this.on("complete", function (file) {
        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

          setTimeout(
            function()
            {
              location.reload();
            }, 1500);
        }
      });
    }
  };
@endforeach
</script>
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script>
  $('#back_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
</script>
@endsection
