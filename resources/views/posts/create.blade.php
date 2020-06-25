@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{isset($post) ? 'Editar Post' : 'Nuevo Post'}}</h1>
  <a href="{{route('posts.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Posts<span></a>
</div>


<div class="row justify-content-center">
  <div class="card col-md-8 mb-5">
    <div class="card-body">
      <form autocomplete="off" method="POST" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="form-group col-md-8">
            <label for="title" class="">Titulo del Post</label>
            <input id="title" onchange="{{isset($post) ? '' : 'this.form.submit()'}}" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{isset($post) ? $post->title : ''}}">
            @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group col-md-4 float-right">
            <label for="category">Categoria</label>
            <select name="category" id="category" class="col-md-10 form-control">
              @foreach($categories as $category)
                <option onchange="{{isset($post) ? '' : 'this.form.submit()'}}" value="{{ $category->id }}"
                  @if(isset($post))
                    @if($category->id == $post->category_id)
                      selected
                    @endif
                  @endif
                  >
                  {{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Descripcion del Post</label>
          <textarea onchange="{{isset($post) ? '' : 'this.form.submit()'}}" id="description" name="description" cols="5" rows="1" class="form-control @error('description') is-invalid @enderror" >{{ isset($post) ? $post->description : '' }}</textarea>
          @error('description')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="contenido" class="col-form-label">Contenido del Post</label>
          <textarea onchange="{{isset($post) ? '' : 'this.form.submit()'}}" id="contenidos" name="contenido" class="@error('contenido') is-invalid @enderror">{{isset($post) ? $post->contenido : ''}}</textarea>

          @error('contenido')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImage">Subir Imagen &nbsp;&nbsp;<i class="fas fa-image"></i></a>
        </div>

        <div class="form-group ">
          <label for="published_at" class="label">Publicado en</label>
          <div class="input-group mb-3 col-md-4">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
            </div>
            <input id="published_at" onchange="{{isset($post) ? '' : 'this.form.submit()'}}" class="form-control @error('published_at') is-invalid @enderror" name="published_at" value="{{ isset($post) ? $post->published_at : ''}}">
          </div>
          @error('published_at')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="button" class="col-form-label">Botón</label>
          <input id="button" type="input" name="button" class="form-control @error('button') is-invalid @enderror"  value="{{ isset($post) ? $post->button : '' }}">
            @error('button')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
          <label for="link" class="col-form-label">Enlace</label>
          <input list="sections" id="link" type="input" name="link" class="form-control @error('button') is-invalid @enderror"  placeholder="Http://" value="{{isset($post) ? $post->link : ''}}">
          <small class="form-text text-muted">Asegurece de que el Link Contiene &nbsp;HTTP:// &nbsp;Antes de la Dirección</small>
            @error('link')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>


        <div class="form-group">
          <button type="submit" class="btn btn-success float-right">
            {{ isset($post) ? 'Guardar' : 'Publicar' }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- LINK SECTION LIST -->
<datalist id="sections">
  <option value="#inicio">Inicio</option>
  <option value="#servicios">Servicios</option>
  <option value="#infoSlider">Slider de Info.</option>
  <option value="#articulos">Artículos</option>
  <option value="#contact">Contacto</option>
</datalist>
<!-- /LINK SECTION LIST -->

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
                <form id="image" method="POST" class="image dropzone" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" enctype="multipart/form-data">
                  @csrf

                </form>
                @error('image')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
              </div>
              <div class="col-md-8">
                @if(isset($post))
                <img style="width:100%;" src="{{'/storage/' . $post->image}}" class="logoThumb img-fluid img-thumbnail rounded">
                @endif
                <div class="editador d-none" style="height:450px; background-color: #000;">
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

    @if(isset($post))
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

       @else
       init: function () {
          this.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {

              setTimeout(
                function()
                {
                  var url = "/redirect1";
                  $(location).attr('href',url);
                }, 1500);
            }
          });
        }
    @endif


    };

  </script>

@endsection

@section('css')

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endsection
