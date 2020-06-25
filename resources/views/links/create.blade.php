@extends('layouts.app')
@section('css')
<link href="{{ asset('lib/summernote/summernote.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
<style>
.modal-dialog{
  position: relative;
  display: table;
  overflow-y: auto;
  overflow-x: auto;
  width: auto;
  min-width: 600px;
}
</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{isset($links) ? 'Editar Enlace' : 'Añadir Enlace'}}</h1>
  <a href="{{route('links.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Enlaces<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"><iframe class="" src="/#links"  width="100%" height="450"></iframe></div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">

          <form method="POST" id="formulario" action="{{ isset($links) ? route('links.update', $links->id) : route('links.store') }}" enctype="multipart/form-data">
            @csrf

            @if(isset($links))
              @method('PUT')
            @endif
            <!-- LINK SECTION LIST -->
            <datalist id="sections">
              <option value="#inicio">Inicio</option>
              <option value="#servicios">Servicios</option>
              <option value="#infoSlider">Slider de Info.</option>
              <option value="#articulos">Artículos</option>
              <option value="#contact">Contacto</option>
            </datalist>
            <!-- /LINK SECTION LIST -->
              <div class="form-group d-none d-sm-block d-md-block d-lg-none">
                <img class="img-fluid px-3 px-sm-4" src="{{asset('img/sections/infoSlider.png')}}">
              </div>
              <div class="form-group">
                <label for="title" class="col-form-label">Titulo</label>
                <input id="title" onchange="{{isset($links) ? '' : 'this.form.submit()'}}" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{isset($links) ? $links->title : ''}}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="link" class="col-form-label">Enlace</label>
                <input list="sections" id="link" type="input" name="link" class="form-control @error('button') is-invalid @enderror"  placeholder="Http://" value="{{isset($links) ? $links->link : ''}}">
                <small class="form-text text-muted">Asegurece de que el Link Contiene &nbsp;HTTP:// &nbsp;Antes de la Dirección</small>
                  @error('link')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="image" class="col-form-label">Imagen</label><br>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImage">Imagen &nbsp;&nbsp;<i class="fas fa-image"></i></a>
              </div>
              <div class="form-group">
                <button type="submit" id="mandar" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>

        </div>
    </div>
  </div>
</div>

<!--modal image-->
<div class="modal fade" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="modalBack" aria-hidden="true">
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
              <label for="logo" class="col-form-label">Imagen</label>
              <form id="image" method="POST" class="image dropzone" action="{{ isset($links) ? route('links.update', $links->id) : route('links.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($links))
                  @method('PUT')
                @endif
              </form>
              <label class="col-form-label">Tamaños de la Imagen:</label>
              <p>Resolución: 940.5x627</p>
              <p>Aspect Ratio: 3:2</p>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="col-md-8">
              @if(isset($links))
              <img style="width:100%;" src="{{'/storage/' . $links->image}}" class="logoThumb img-fluid img-thumbnail rounded">
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
<!-- End modal image -->
@endsection
@section('script')
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script>
  $('#back_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
</script>


<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script>

    Dropzone.options.image = {
      paramName: "image",

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
               width: 940.5,
               height: 627
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
         var cropper = new Cropper(image, { aspectRatio: 3/2 });
     },
     init: function () {

        this.on("complete", function (file) {
          $('#modalImage').modal('toggle');
        });
      }
    };


</script>
@endsection
