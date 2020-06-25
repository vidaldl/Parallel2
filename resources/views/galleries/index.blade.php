@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Galería</h1>
</div>

<div class="card mt-3 mb-5">
  <div class="card-body ">
    <form class="" action="{{route('galleries.section', $gallery_sections[0]->id)}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title" class="col-form-label">Título</label>
        <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{ $gallery_sections[0]->title }}">
          @error('title')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
      <div class="form-group">
        <label for="subtitle" class="col-form-label">Subtítulo</label>
        <input id="subtitle" type="input" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"  value="{{ $gallery_sections[0]->subtitle }}">
          @error('subtitle')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
      <div class="form-group">
        <label for="back_color">Color de Fondo</label><br>
        <input onchange="this.form.submit()" class="form-control col-md-6"  name="back_color" type="text" id="back_color" value="{{ $gallery_sections[0]->back_color }}">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success float-right">Actualizar</button>
      </div>
    </form>
  </div>
</div>
</div>
<div class="d-sm-flex container align-items-center justify-content-between mb-4">
  <a href="#" data-toggle="modal" data-target="#addImageModal" class="d-none ml-auto d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-edit fa-sm "></i></span><span class="text"> &nbsp;Contenido<span></a>
</div>
@if($galleries->count() > 0)
<div class="container">
  <div class="card">
    <div class="card-body table-hover" >
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th colspan="4" scope="col">Contenido</th>
              <th scope="col">Tipo</th>
              <th scope="col">Titulo</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="table-striped">

            @foreach($galleries as $object)
            <tr>
                <td colspan="4" style="word-break: break-all;">
                  @if($object->type == "image")
                  <img src="{{ '/storage/' . $object->object }}" height="90" width="100" alt="">
                  @endif
                  @if($object->type == "text")
                  <h5>{{$object->object}}</h5>
                  @endif
                </td>
                <td>
                    {{ $object->type }}
                </td>
                <td>
                  <h4>{{ $object->title }}</h4>
                </td>

              @endforeach
            </tr>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>

  @else

    <h3 class="h3 text-center text-gray-800">Ahora mismo no hay Fotos</h3>

  @endif




<!--modal Image-->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="modalImages" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4066D4;">
      <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Editar/Agregar</th>
                <th scope="col">Contenido</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

            @foreach($galleries as $object)
            <tr>
              <td class="row">
                <a href="{{route('galleries.edit', $object->id)}}" class="btn btn-success mt-auto mx-auto"><i class="fas fa-edit"></i>&nbsp; Editar</a>
              </td>
              <td>
                @if($object->type == "image")
                  <img style="height:200px; " class="img-thumbnail{{ $object->id }}" src="{{'/storage/' . $object->object}}">
                @endif

                @if($object->type == "video")
                  @php

                    $url = "$object->object";
                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                    $youtube_id = $match[1];

                  @endphp
                  <iframe  height="315" src="https://www.youtube.com/embed/{{$youtube_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
                @if($object->type == "text")
                <h4>{{$object->object}}</h4>

                @endif

              </td>

            @if($loop ->last)
              <td class="delTD{{ $object->id }}">
                <form  method="POST" action="{{route('galleries.destroy', $object->id)}}">
                  @csrf
                  @method('DELETE')
                  <input type="submit" class="btn btn-danger" value="X">
                </form>
              </td>
              </tr>
            @endif
            @endforeach


            @if($galleries->count() < 25)
            <tr class="inputs">
              <td>
                <a id="image" class="btn btn-success" style="color:white"><i class="fas fa-image"></i>&nbsp; Imagen</a>
                <a id="video" class="btn btn-success" style="color:white"><i class="fas fa-video"></i>&nbsp; Video</a>
                <a id="text" class="btn btn-success" style="color:white"><i class="fas fa-align-left"></i>&nbsp; Texto</a>
              </td>
            </tr>

            <!-- image Input -->
            <tr class="imageInput">
              <td>
                  <form id="imageForm" method="POST"  action="{{route('galleries.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div id="picture" class="dropzone"></div>
                    <input id="type" type="hidden" name="type" value="image" class="form-control @error('type') is-invalid @enderror">
                    <div class="form-group">
                      <label for="title" class="col-form-label">Título</label>
                      <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <button id="submitImage" type="submit" class="btn btn-success float-right">Actualizar</button>
                    </div>

                  </form>
              </td>
              <!-- Editor -->
              <td colspan="2">
                <div class="editor d-none" style="height:450px; width: 450px; background-color: #000;">
                </div>
                <button class="buttonConfirm btn btn-primary float-right mt-2 d-none">Confirmar</button>
              </td>
            </tr>
            <!-- /Image Input -->

            <!-- Video Input -->
            <tr class="videoInput">
              <td>
                  <form  method="POST"  action="{{route('galleries.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input id="type" type="hidden" name="type" value="video" class="form-control @error('type') is-invalid @enderror">
                    <div class="form-group">
                      <label for="link" class="col-form-label">Enlace</label>
                      <input id="link" type="input" name="link" class="form-control @error('link') is-invalid @enderror">
                        @error('link')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-form-label">Título</label>
                      <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror">
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

              </td>
            </tr>
            <!-- /Video Input -->

            <!-- Text Input -->
            <tr class="textInput">
              <td>
                  <form method="POST"  action="{{route('galleries.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input id="type" type="hidden" name="type" value="text" class="form-control @error('type') is-invalid @enderror">

                    <div class="form-group">
                      <label for="link" class="col-form-label">Título</label>
                      <input id="link" type="input" name="link" class="form-control @error('link') is-invalid @enderror">
                        @error('link')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="title" class="col-form-label">SubTítulo</label>
                      <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror">
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

              </td>
            </tr>
            <!-- /Text Input -->
            @else
            <tr>
              <td>
                <div class="alert alert-danger" role="alert">
                  Ya existe demasiado contenido en la Galería
                </div>
              </td>
            </tr>
            @endif
            <tr style="height: 200px;">
            </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #4066D4;">
          <a id="addImage" class="btn btn-primary col-md-3 mr-auto" style="color:white;">Agregar&nbsp;<i class="fas fa-plus-square"></i></a>
        </div>

    </div>
  </div>
</div>
</div>
<!-- End modal logo -->

@endsection

@section('script')
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script>
  $('#back_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
</script>

<script>
$(document).ready(function() {
  $('.textInput').hide();
  $('.videoInput').hide();
  $('.imageInput').hide();
  $('.inputs').hide();
  $('#addImage').click(function() {
    $('.inputs').show();
    $('#image').click(function() {
      $('.inputs').hide();
      $('.imageInput').show();
    });
    $('#video').click(function() {
      $('.inputs').hide();
      $('.videoInput').show();
    });
    $('#text').click(function() {
      $('.inputs').hide();
      $('.textInput').show();
    });


  });
});
</script>

<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script>
// Dropzone.options.video = {
//    paramName: "video",
//    init: function () {
//       this.on("complete", function (file) {
//         if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
//
//           setTimeout(
//             function()
//             {
//               location.reload();
//             }, 1500);
//         }
//       });
//     }
// };


Dropzone.autoDiscover = false;
$("#picture").dropzone({
  url: 'galleries',
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


</script>

@endsection

@section('css')
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
@endsection
