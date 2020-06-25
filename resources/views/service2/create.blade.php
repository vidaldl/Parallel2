@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('lib/iconpicker/css/fontawesome-iconpicker.css')}}">
  <link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/ui/trumbowyg.min.css')}}">
  <link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
  <style>
  .modal-dialog{
    position: relative;
    display: table;
    overflow-y: auto;
    overflow-x: auto;
    width: auto;
    min-width: 600px;
  }

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
  </style>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{isset($servicio) ? 'Editar Servicio' : 'Nuevo Servicio'}}</h1>
  <a href="{{route('servicios2.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Servicios<span></a>
</div>


<div class="row justify-content-center">
  <div class="card col-md-8 mb-5">
    <div class="card-body">
      <form autocomplete="off" method="POST" action="{{ isset($servicio) ? route('servicio2.update', $servicio->id) : route('servicios2.store') }}">
        @csrf

        <div class="row justify-content-center">
          <div class="tabs col-md-8">
            <ul class="tabs-navigation horizontal">
              <li class="li"><a class="a" href="#portada">Portada</a></li>
              <li class="li"><a class="a" href="#detalles">Detalles</a></li>
            </ul>

            <div class="tabdiv" id="portada">
              <div class="form-group">
                <label for="icon" class="col-form-label">Ícono</label><br>
                @if($section2[0]->icon_style == 0)
                  <div class="input-group">
                    <input id="icon" type="text" data-placement="bottomRight" class="form-control @error('icon') is-invalid @enderror"  name="icon" value="{{isset($servicio) ? $servicio->icon : ''}}">
                    <div class="btn-group">
                       <button type="button" class="btn btn-primary iconpicker-component"><i
                               class="{{ isset($servicio) ? $servicio->icon : 'fab fa-font-awesome-alt' }}"></i></button>
                       <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                               data-selected="fa-car" data-toggle="dropdown">
                           <span class="caret"></span>
                           <span class="sr-only">Toggle Dropdown</span>
                       </button>
                       <div class="dropdown-menu"></div>
                   </div>

                  </div>
                @else
                  <a href="#" class="btn btn-primary {{isset($servicio) ? '' : 'disabled'}}"  data-toggle="modal" data-target="#modalIcon">Icono &nbsp;&nbsp;<i class="fas fa-image"></i></a>
                @endif
              </div>

              <div class="form-group mt-5">
                <label for="title" class="col-form-label">Titulo del Post</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{isset($servicio) ? $servicio->title : ''}}">
                @error('title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group mt-5">
                <label for="contenido" class="col-form-label">Breve Descripción</label>
                <textarea id="contenido" name="contenido" class="form-control @error('contenido') is-invalid @enderror" > {{ isset($servicio) ? $servicio->contenido : '' }} </textarea>
                @error('contenido')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div id="detalles" class="tabdiv {{isset($servicio) ? '' : 'disabled'}}">
              <div class="form-group">
                <label for="image" class="col-form-label">Imagen</label><br>
                <a href="#" class="btn btn-primary {{isset($servicio) ? '' : 'disabled'}}"  data-toggle="modal" data-target="#modalScreenshot">Imagen de la Descripción &nbsp;&nbsp;<i class="fas fa-image"></i></a>
              </div>

              <div class="form-group mt-5">
                <label for="contenido" class="col-form-label">Descripción Detallada</label>
                <textarea id="contenido_modal" name="contenido_modal" class="form-control @error('contenido_modal') is-invalid @enderror" > {{ isset($servicio) ? $servicio->contenido_modal : '' }} </textarea>
                @error('contenido_modal')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

          </div>
        </div>




        <div class="form-group mt-5">
          <button type="submit" class="btn btn-success float-right">
            {{ isset($servicio) ? 'Guardar' : 'Publicar' }}
          </button>
        </div>

      </form>
    </div>
  </div>
</div>
</div>


@if(isset($servicio))
<!-- ICON -->
<div class="modal fade" id="modalIcon" tabindex="-1" role="dialog" aria-labelledby="modalIcon" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4066D4;">
      <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
              <label for="image" class="col-form-label">Subir Icono</label>
              <form id="icon" method="POST" class="icon dropzone" action="{{route('servicio2.update', $servicio->id)}}" enctype="multipart/form-data">
                @csrf
              </form>
              <label class="col-form-label">Tamaños de la Imagen:</label>
              <p>Resolución: 720x720</p>
              <p>Aspect Ratio: 1:1</p>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="col-md-8 docs-buttons">
              @if(isset($servicio))
              <img style="width:100%;" src="{{'/storage/' . $servicio->icon_img}}" class="logoThumb img-fluid img-thumbnail rounded">
              @endif
              <div class="editador d-none" style="width:450px; height: 600px; background-color: #000;">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer ">
        <button class="buttonConfirm btn btn-primary d-none">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- /ICON -->
<!-- IMAGE -->
<div class="modal fade" id="modalScreenshot" tabindex="-1" role="dialog" aria-labelledby="modalScreenshot" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4066D4;">
      <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
              <label for="image" class="col-form-label">Imagen de la Descripción</label>
              <form id="screenshot" method="POST" class="image dropzone" action="{{route('servicio2.update', $servicio->id)}}" enctype="multipart/form-data">
                @csrf
              </form>
              <label class="col-form-label">Tamaños de la Imagen:</label>
              <p>Resolución: 1280x720</p>
              <p>Aspect Ratio: 16:9</p>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="col-md-8">
              @if(isset($servicio))
              <img style="width:100%;" src="{{'/storage/' . $servicio->image}}" class="logoThumb1 img-fluid img-thumbnail rounded">
              @endif
              <div class="editador1 d-none" style="width:450px; height: 600px; background-color: #000;">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer ">
        <button class="buttonConfirm1 btn btn-primary d-none">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- /IMAGE -->
@endif

@endsection



@section('script')
<script src="{{ asset('lib/tabslet/jquery.tabslet.js') }}"></script>
<script src="{{asset('lib/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
<script>
$(document).ready(function () {
  $('.icp-dd').iconpicker();
});
$('.icp').on('iconpickerSelected', function (e) {
    $('#icon').get(0).value = e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
  });
</script>
<script src="{{asset('lib/trumbowyg/dist/trumbowyg.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/cleanpaste/trumbowyg.cleanpaste.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/noembed/trumbowyg.noembed.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js')}}"></script>
<script>
$('.tabs').tabslet();

$('#contenido_modal').trumbowyg({
  btnsDef: {
      // Create a new dropdown
      image: {
          dropdown: ['insertImage', 'noembed'],
          ico: 'insertImage'
      }
  },
  btns: [
      ['viewHTML'],
      ['formatting'],
      ['strong', 'em', 'del'],
      ['link'],
      ['image'],
      ['insertAudio'],
      ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
      ['unorderedList', 'orderedList'],
      ['horizontalRule'],
      ['removeformat'],
      ['fullscreen']
  ]
});

$('#contenido').trumbowyg({
  btns: [
      ['viewHTML'],
      ['formatting'],
      ['strong', 'em', 'del'],
      ['link'],
      ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
      ['unorderedList', 'orderedList'],
      ['horizontalRule'],
      ['removeformat'],
      ['fullscreen']
  ]
});
</script>


<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<!-- IMAGE -->
<script>
// <!--Screenshot-->
  Dropzone.options.screenshot = {
    paramName: "image",

     transformFile: function(file, done) {
        var myDropZone = this;
        var editor = $('.editador1');
        var logoThumb = $('.logoThumb1');
        $(logoThumb).addClass('d-none');
        $(editor).removeClass('d-none');
        $(editor).addClass('d-block');
        // Create confirm button at the top left of the viewport
        var buttonConfirm = $('.buttonConfirm1');
        $(buttonConfirm).removeClass('d-none');
        $(buttonConfirm).addClass('d-block');
        $(buttonConfirm).click(function() {
          // Get the canvas with image data from Cropper.js
           var canvas = cropper.getCroppedCanvas({
             width: 1280,
             height: 720
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

  Dropzone.options.icon = {

    paramName: "icon_img",
     transformFile: function(file, done) {
        var myDropZone = this;
        var editor = $('.editador');
        var logoThumb = $('.logoThumb');
        $(logoThumb).addClass('d-none');
        $(editor).removeClass('d-none');
        $(editor).addClass('d-block');
        // Create confirm button at the top left of the viewport
        var buttonConfirm = $('.buttonConfirm');
        $(buttonConfirm).removeClass('d-none');
        $(buttonConfirm).addClass('d-block');
        $(buttonConfirm).click(function() {
          // Get the canvas with image data from Cropper.js
           var canvas = cropper.getCroppedCanvas({
             width: 720,
             height: 720
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
       var cropper = new Cropper(image, { aspectRatio: 1/1 });
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
</script>

@endsection
