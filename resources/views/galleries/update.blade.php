@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Modificar Foto</h1>
  <a href="{{route('galleries.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Galería<span></a>
</div>

@if(isset($gallery))
<div class="row justify-content-center">
  <div class="card col-md-8 mb-5">
    <div class="card-body">
      @if($gallery->type == "image")
    <td>
      <form id="imageForm" method="POST"  action="{{route('gal.update', $gallery->id)}}" enctype="multipart/form-data">
        @csrf
        <div id="picture" class="dropzone"></div>
        <div class="form-group">
          <label for="title" class="col-form-label">Título</label>
          <input id="title" type="input" name="title" value="{{$gallery->title}}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
          <a id="submitImage" class="btn btn-success float-right mb-3">Actualizar</a>
        </div>

      </form>
    </td>
    <td class="editor">

      <img style="width: 100%" class="img-thumbnail" src="{{'/storage/' . $gallery->object}}">
      <div class="editor d-none" style="height:450px; background-color: #000;">
      </div>
      <button class="buttonConfirm btn btn-primary float-right mt-2 d-none">Confirmar</button>
    </td>
    @endif
    @if($gallery->type == "video")
    <form method="POST"  action="{{route('gal.update', $gallery->id)}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="link" class="col-form-label">Enlace</label>
        <input id="link" type="input" name="link" value="{{$gallery->object}}" class="form-control @error('link') is-invalid @enderror">
          @error('link')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
      <div class="form-group">
        <label for="title" class="col-form-label">Título</label>
        <input id="title" type="input" name="title" value="{{$gallery->title}}" class="form-control @error('title') is-invalid @enderror">
          @error('title')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success float-right">Actualizar</button>
      </div>
    </form>
    @endif
    @if($gallery->type == "text")
    <form method="POST"  action="{{route('gal.update', $gallery->id)}}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="link" class="col-form-label">Título</label>
        <input id="link" type="input" name="link" value="{{$gallery->object}}" class="form-control @error('link') is-invalid @enderror">
          @error('link')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
      <div class="form-group">
        <label for="title" class="col-form-label">SubTítulo</label>
        <input id="title" type="input" name="title" value="{{$gallery->title}}" class="form-control @error('title') is-invalid @enderror">
          @error('title')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success float-right">Actualizar</button>
      </div>
    </form>
    @endif
    </div>
  </div>
</div>
</div>
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

@endsection



@section('script')
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/12.3.0/classic/ckeditor.js"></script> -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <script>
      // ClassicEditor.create( document.querySelector( '#contenido' ), {
      //       removePlugins: [ 'Heading', 'Link' ],
      //       toolbar: ['undo', 'redo','imageUpload', 'imageStyle:full', 'numberedList', 'bulletedList', 'bold', 'italic', 'mediaEmbed'],
      //     }).then( editor => {
      //         console.log( Array.from( editor.ui.componentFactory.names() ) );
      //     } ).catch( error => {
      //         console.error( error );
      //     } );
      $(document).ready(function() {
        $('#contenidos').summernote();
      });

  </script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script type="text/javascript">
    defaultDate: new Date()
    flatpickr('#published_at', {
      defaultDate: new Date()
    })
  </script>
  <script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
  <script src="{{asset('lib/cropper/cropper.js')}}"></script>
  <script>

  </script>
  <script>
  @if(isset($gallery))
  Dropzone.autoDiscover = false;
  $("#picture").dropzone({
    url: '{{route('gal.update', $gallery->id)}}',
    autoProcessQueue: false,
    dictDefaultMessage: 'Arrastra el nuevo archivo aqui',
    paramName: 'image',
    transformFile: function(file, done) {
        var myDropZone = this;
        var editor = $('.editor');
        var imgThumbnail = $('.img-thumbnail');
        $(imgThumbnail).addClass('d-none');
        $(editor).removeClass('d-none');
        $(editor).addClass('d-block');

        // Delete Button


        // Create confirm button at the top left of the viewport
        var buttonConfirm = $('.buttonConfirm');
        $(buttonConfirm).removeClass('d-none');
        $(buttonConfirm).addClass('d-block');
        $(buttonConfirm).click(function() {
          // Get the canvas with image data from Cropper.js
           var canvas = cropper.getCroppedCanvas({
             width: 1760,
             height: 990
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


        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

          // for Dropzone to process the queue (instead of default form behavior):
          document.getElementById("submitImage").addEventListener("click", function(e) {
              // Make sure that the form isn't actually being sent.
              e.preventDefault();
              e.stopPropagation();
              dzClosure.processQueue();
          });

          //send all the form data along with the files:
          this.on('sending', function(file, xhr, formData) {
            // Append all form inputs to the formData Dropzone will POST
            var data = $('#imageForm').serializeArray();
            $.each(data, function(key, el) {
                formData.append(el.name, el.value);
            });

        });

      }
  });
  @endif

  </script>

@endsection

@section('css')

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endsection
