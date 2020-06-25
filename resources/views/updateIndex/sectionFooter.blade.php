@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/ui/trumbowyg.min.css')}}">
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Pie de Página</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <!-- LINE/SPACE -->
        <form method="POST" action="{{route('sectionFooter.update', $contenidosectionfooters[0]->id)}}">
        @csrf
        <div class="line-space card col-md-8 offset-md-2 mt-4 mb-4">
          <a href="#" style="text-decoration: none">
            <div class="card-header py-3">
            <div class="row">
              <span class="col-md-6"><h6 class="m-0 font-weight-bold text-primary">Espacio entre:</h6></span>
                  @if($contenidosectionfooters[0]->line == 0)
                    <select onchange="this.form.submit()" name="line-hidden" class="col-md-6  float-right">
                      <option selected>Nada</option>
                      <option value = "1">Línea</option>
                      <option value = "2">Espacio</option>
                    </select>
                  @endif
            </div>
          </div>
          </a>
          @if($contenidosectionfooters[0]->line != 0)
          <div id="collapse9">
            <div class="card-body row">
            <div class="col-md-6 offset-md-3">
              <div class="row">
                <div class="col-md-6">
                  <label for="line-display">Espacio Encima de la Sección:</label>
                  <select name="line-display" onchange="this.form.submit()">
                    <option value="0">No Mostrar</option>
                  @if($contenidosectionfooters[0]->line == 1)
                    <option value="1" selected>Línea</option>
                    <option value="2">Espacio</option>
                    @elseif($contenidosectionfooters[0]->line == 2)
                    <option value="1">Línea</option>
                    <option value="2" selected>Espacio</option>
                    @endif
                  </select>
                </div>
                <div class="col-md-6 {{$contenidosectionfooters[0]->line == 2 ? 'd-none' : ''}}">

                    <label for="line-style">Estilo de Línea:</label>
                    <select name="line-style" onchange="this.form.submit()">
                      @if($contenidosectionfooters[0]->line_style == 1)
                        <option value="1" selected>Parcial</option>
                        <option value="2">Completo</option>
                      @elseif($contenidosectionfooters[0]->line_style == 2)
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
      <!-- END LINE/SPACE -->
    </div>
    <div class="card col-md-8">
      <div class="card-body">
      <form method="POST" action="{{route('sectionFooter.update', $contenidosectionfooters[0]->id)}}" enctype="multipart/form-data">
        @csrf
        <label for="style">Estilo del Footer:</label>
        <select onchange="this.form.submit()" class="col-md-3 offset-md-4" name="style">
          @if($contenidosectionfooters[0]->style == 1)
            <option value="1" selected>Simple</option>
            <option value="2">Acerca de</option>
          @elseif($contenidosectionfooters[0]->style == 2)
            <option value="1">Simple</option>
            <option value="2" selected>Acerca de</option>
          @endif
        </select>
      </form>
      </div>
    </div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">

          <form method="POST" action="{{route('sectionFooter.update', $contenidosectionfooters[0]->id)}}" enctype="multipart/form-data">
            @csrf


              <div class="form-group">
                <label for="copy" class="col-form-label">Nombre de la Empresa</label>
                <input id="copy" type="input" name="copy" class="form-control @error('copy') is-invalid @enderror"  value="{{ $contenidosectionfooters[0]->copy }}">
                  @error('copy')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              @if($contenidosectionfooters[0]->style == 2)
              <div class="form-group" id="type_image">
                <label for="image" class="col-form-label">Imagen de Logo</label><br>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalLogo">Subir Imagen &nbsp;&nbsp;<i class="fas fa-image"></i></a>
              </div>
              <div class="form-group col-md-4">
                <label for="back_color">Color de Fondo:</label><br>
                <input onchange="this.form.submit()" class="form-control" name="back_color" type="text" id="back_color" value="{{ $contenidosectionfooters[0]->back_color }}">
              </div>

              <div class="form-group col-md-4">
                <label for="color">Color del Texto</label><br>
                <input onchange="this.form.submit()" class="form-control" name="color" type="text" id="color" value="{{ $contenidosectionfooters[0]->color }}">
              </div>

              <div class="form-group col-md-4">
                <label for="color">Color del Texto(enlaces)</label><br>
                <input onchange="this.form.submit()" class="form-control" name="color_sec" type="text" id="color_sec" value="{{ $contenidosectionfooters[0]->color_sec }}">
              </div>
              <div class="form-group">
                <label for="acerca" class="col-form-label">Acerca de la Empresa</label>
                <textarea id="acerca" type="input" name="acerca" class="form-control @error('copy') is-invalid @enderror">{{ $contenidosectionfooters[0]->acerca }}</textarea>
                  @error('copy')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="social_title" class="col-form-label">Titulo Enlaces</label>
                <input id="social_title" type="input" name="social_title" class="form-control @error('copy') is-invalid @enderror"  value="{{ $contenidosectionfooters[0]->social_title }}">
                  @error('social_title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              @endif
              <div class="form-group">
                <a class="btn btn-primary" href="{{route('footer.index')}}" style="text-decoration: none"><i class="fad fa-link"></i>&nbsp;Enlaces</a>
                <button type="submit" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>


        </div>
    </div>
  </div>

  <!--modal logo-->
  <div class="modal fade" id="modalLogo" tabindex="-1" role="dialog" aria-labelledby="modalBack" aria-hidden="true">
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
                <label for="logo" class="col-form-label">Imagen de Logo</label>
                <form id="logo" method="POST" class="logo dropzone" action="{{route('sectionFooter.update', $contenidosectionfooters[0]->id)}}" enctype="multipart/form-data">
                  @csrf
                </form>
                @error('logo')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
              </div>
              <div class="col-md-8">
              <img style="width:100%;" src="{{'/storage/' . $contenidosectionfooters[0]->logo}}" class="logoThumb img-fluid img-thumbnail rounded">
              <div class="editador d-none" style="height:450px; background-color: #000;">
              </div>
              </div>
            </div>
        </div>
        <div class="modal-footer buttons">
          <button class="buttonConfirm btn btn-primary d-none">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal logo -->
</div>
@endsection
@section('script')
<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script src="{{asset('lib/trumbowyg/dist/trumbowyg.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js')}}"></script>
<script>
$('#acerca').trumbowyg({
  btns: [
    ['fontsize'],
    ['strong', 'em', 'del'],
    ['link'],
    ['image'],
    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
    ['unorderedList', 'orderedList'],
    ['horizontalRule'],
    ['removeformat'],
    ['fullscreen']
  ]
});
$('#back_color').spectrum({
  preferredFormat: "hex",
 showInput: true,
});

$('#color').spectrum({
  preferredFormat: "hex",
 showInput: true,
});

$('#color_sec').spectrum({
  preferredFormat: "hex",
 showInput: true,
});

Dropzone.options.logo = {
   paramName: "logo",
   addRemoveLinks: true,
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
           height: 405
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
     var cropper = new Cropper(image);



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
