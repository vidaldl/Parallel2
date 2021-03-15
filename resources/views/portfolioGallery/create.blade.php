@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/ui/trumbowyg.min.css')}}">
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
<link href="{{ asset('lib/btnswitch/jquery.btnswitch.css') }}" rel="stylesheet">
<style>
.modal-dialog{
  position: relative;
  display: table;
  overflow-y: auto;
  overflow-x: auto;
  width: auto;
  min-width: 600px;
}

.tgl-sw-swipe + .btn-switch {
  background: #4e73df;
}
</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{isset($gallery_items) ? 'Editar Articulo' : 'Añadir Articulo'}}</h1>
  <a href="{{route('portfolioGallery.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Articulos<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"></div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">

          <form method="POST" id="formulario" action="{{ isset($gallery_items) ? route('portfolioGallery.update', $gallery_items->id) : route('portfolioGallery.store') }}" enctype="multipart/form-data">
            @csrf

              <div class="form-group">
                <label for="title" class="col-form-label">Titulo</label>
                <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{isset($gallery_items) ? $gallery_items->title : ''}}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="subtitle" class="col-form-label">Subtitulo</label>
                <input id="subtitle" type="input" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{isset($gallery_items) ? $gallery_items->subtitle : ''}}">
                  @error('subtitle')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <h4>Detalle:</h4>
              </div>
              <div class="container">
                <div class="form-group">
                  <label for="desc_title" class="col-form-label">Titulo Detalle</label>
                  <input id="desc_title" type="input" name="desc_title" class="form-control @error('desc_title') is-invalid @enderror" value="{{isset($gallery_items) ? $gallery_items->desc_title : ''}}">
                    @error('desc_title')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="desc" class="col-form-label">Contenido Detalle</label>
                  <textarea id="desc" name="desc" class="form-control @error('desc') is-invalid @enderror"  >{{isset($gallery_items) ? $gallery_items->desc : ''}}</textarea>
                    @error('desc')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

@if(isset($gallery_items))
<!-- IMAGEN -->
              <div class="form-group">
                <label for="media_type">Tipo de Multimedia</label>
                <div id="media_type"></div>

                <div class="form-row mb-4">
                  <div class="col-md-6" id="type_image">
                    <label class="col-form-label">Imagenes</label><br>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImages">Imagenes &nbsp;&nbsp;<i class="fas fa-image"></i></a>
                  </div>
                  <div class="col-md-6" id="type_video">
                    <label class="col-form-label">Video:</label><br>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalVideo">Video &nbsp;&nbsp;<i class="fas fa-video"></i></a>
                  </div>
                </div>
              </div>
<!--/IMAGEN -->
              <div class="form-group">
                <label for="display_simple">Vista Simple:</label>
                <div id="display_simple"></div>
              </div>

              <div class="form-group" id="tool-Tips">
                <label for="media_type">Frase Encima de los Botones:</label>
                <div id="tooltips"></div>
              <!-- BOTONES DE LA GALERÍA -->
              <div id="toolDisplay">
                <div class="form-group" id="left_btn">
                  <label for="left_btn" class="col-form-label">Botón Izquierdo</label>
                  <input id="left_btn" name="left_btn" class="form-control @error('left_btn') is-invalid @enderror" value="{{isset($gallery_items) ? $gallery_items->left_btn : ''}}">
                    @error('left_btn')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group" id="right_btn">
                  <label for="right_btn" class="col-form-label">Botón Derecho</label>
                  <input id="right_btn" name="right_btn" class="form-control @error('right_btn') is-invalid @enderror" value="{{isset($gallery_items) ? $gallery_items->right_btn : ''}}">
                    @error('right_btn')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>
              </div>
@endif
              <div class="form-group">
                <button type="submit" id="mandar" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>

        </div>
    </div>
  </div>
</div>

@if(isset($gallery_items))
<!-- MODAL IMAGE -->
<div class="modal fade" id="modalImages" tabindex="-1" role="dialog" aria-labelledby="modalImages" aria-hidden="true">
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
                  <th scope="col">Imagen</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($gallery_items->gallery_images as $images)

                <tr>
                  <td>
                    <div class="form-group">
                      <form method="POST" id="slide{{ $images->id}}" class="dropzone" action="{{route('portfolioGalleryImage.update', $images->id)}}" enctype="multipart/form-data">
                      @csrf
                      </form>
                    </div>
                  </td>
                <td class="editorTD{{ $images->id }}">

                  <img style="height:200px; " class="img-thumbnail{{ $images->id }}" src="{{'/storage/' . $images->thumbnail}}">
                  <div class="editor{{ $images->id }} d-none" style="height:450px; width: 450px; background-color: #000;">
                  </div>
                  <button class="buttonConfirm{{ $images->id }} btn btn-primary float-right mt-2 d-none">Confirmar</button>
                </td>
                <td class="delTD{{ $images->id }}">
                  <form  method="POST" action="{{route('portfolioGalleryImage.destroy', $gallery_items->id)}}">
                    @csrf
                    <input type="hidden" name="idDel" value="{{$images->id}}">
                    <input type="submit" class="btn btn-danger" value="X">
                  </form>
                </td>
                </tr>

              @endforeach
              <tr class="imageInput">
                <td>
                  <div class="form-group">
                    <form method="POST" id="slide" class="dropzone" action="{{route('portfolioGalleryImage.create', $gallery_items->id)}}" enctype="multipart/form-data">
                      @csrf
                    </form>
                    <label class="col-form-label">Tamaños de la Imagen:</label>
                    <p>Resolución: 1770x990</p>
                    <p>Aspect Ratio: 4:3</p>
                    @error('slide')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </td>
                <!-- Editor -->
                <td colspan="2">
                  <div class="editorNew d-none" style="height:450px; width: 450px; background-color: #000;">
                  </div>
                  <button class="buttonConfirm btn btn-primary float-right mt-2 d-none">Confirmar</button>
                  <button class="buttonConfirm2 btn btn-primary float-right mt-2 d-none">thumbnail</button>
                </td>
              </tr>


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
<!-- /MODAL IMAGE -->

<!--Modal Video-->

<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="modalVideo" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4066D4;">
        <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body">
        <div class="col-md-12 mb-4">
          <form method="POST" action="{{route('portfolioGallery.update', $gallery_items->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="video" class="col-form-label">subtitle</label>
              <input id="video" type="input" name="video" class="form-control @error('video') is-invalid @enderror" value="{{isset($gallery_items) ? $gallery_items->video : ''}}">
              <small class="form-text text-muted">Pegue la dirección del video que desea mostrar</small>
                @error('video')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
              <button type="submit" id="mandar" class="btn btn-success float-right">Actualizar</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>
</div>
@endif

@endsection
@section('script')
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script src="{{asset('lib/trumbowyg/dist/trumbowyg.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js')}}"></script>
<script>
$('#desc').trumbowyg({
  btns: [
    ['viewHTML'],
    ['fontsize'],
    ['fontfamily'],
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

@if(isset($gallery_items))
  $(document).ready(function() {
    @if($gallery_items->display_tooltip == 0)
      $('#toolDisplay').hide();
    @endif
    @if($gallery_items->display_type == 1)
      $('#type_image').hide();
    @else
      $('#type_video').hide();
    @endif
    @if($gallery_items->display_simple == 1)
      $('#tool-Tips').hide();
    @endif

    $('.imageInput').hide();
    $('#addImage').click(function() {
      $('.imageInput').show();
    });
  });
  $('#back_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });

  $('#media_type').btnSwitch({
    Theme:'Swipe',
    OnText: "Image",
    OffText: "Video",
    OnValue: '0',
    OnCallback: function(val) {
      $('#type_video').hide();
      $('#type_image').show();

      $.ajax({
             type:'POST',
             dataType: 'json',
             url:'{{route('portfolioGallery.update', $gallery_items->id)}}',
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
      $('#type_image').hide();
      $('#type_video').show();

      $.ajax({
             type:'POST',
             dataType: 'json',
             url:'{{route("portfolioGallery.update", $gallery_items->id)}}',
             data:{"_token": "{{ csrf_token() }}",
             val:val
            },
             success:function(data){
                alert(data.success);
             }
          });
    },

      @if($gallery_items->display_type == 1)
      ToggleState: true
      @else
      ToggleState: false
      @endif
  });

// Button DISPLAY Simple

$('#display_simple').btnSwitch({
  Theme:'Swipe',
  OnText: "Si",
  OffText: "No",
  OnValue: '1',
  OnCallback: function(val) {
    $('#tool-Tips').hide();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("portfolioGallery.update", $gallery_items->id)}}',
           data:{"_token": "{{ csrf_token() }}",
           simple:val
          },
           success:function(data){
              alert(data.success);
           }
        });

    },
  OffValue: '0',
  OffCallback: function (val) {
    $('#tool-Tips').show();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("portfolioGallery.update", $gallery_items->id)}}',
           data:{"_token": "{{ csrf_token() }}",
           simple:val
          },
           success:function(data){
              alert(data.success);
           }
        });

  },
  @if($gallery_items->display_simple == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});


// BUTTON TOOLTIPS

  $('#tooltips').btnSwitch({
    Theme:'Swipe',
    OnText: "Si",
    OffText: "No",
    OnValue: '1',
    OnCallback: function(val) {
      $('#toolDisplay').show();

      $.ajax({
             type:'POST',
             dataType: 'json',
             url:'{{route("portfolioGallery.update", $gallery_items->id)}}',
             data:{"_token": "{{ csrf_token() }}",
             valBtn:val
            },
             success:function(data){
                alert(data.success);
             }
          });
      },
    OffValue: '0',
    OffCallback: function (val) {
      $('#toolDisplay').hide();

      $.ajax({
             type:'POST',
             dataType: 'json',
             url:'{{route('portfolioGallery.update', $gallery_items->id)}}',
             data:{"_token": "{{ csrf_token() }}",
             valBtn:val
            },
             success:function(data){
                alert(data.success);
             }
          });
    },

      @if($gallery_items->display_tooltip == 1)
      ToggleState: true
      @else
      ToggleState: false
      @endif
  });
@endif
</script>


<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script>
$(document).ready(function() {
$('.buttonConfirm2').hide();
});




// ======================IMAGES====================


Dropzone.options.slide = {
     paramName: "slide",
     transformFile: function(file, done) {

       var editor = $('.editorNew');
       var buttonConfirm = $('.buttonConfirm');
         $(buttonConfirm).removeClass('d-none');
         $(buttonConfirm).addClass('d-block');

        var myDropZone = this;
        // var editor = $('.editorNew');
        $(editor).removeClass('d-none');
        $(editor).addClass('d-block');
        // Create confirm button at the top left of the viewport

          // Create an image node for Cropper.js
         var image = new Image();

         image.src = URL.createObjectURL(file);

         // editor.appendChild(image);
         $(image).appendTo(editor)
         // Create Cropper.js
         var cropper = new Cropper(image, { aspectRatio: 4/3 });

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
          // $(buttonConfirm2).show();

        });

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
@if(isset($gallery_images))
    @foreach($gallery_images as $images)
        Dropzone.options.slide{{$images->id}} = {
           paramName: "slide",
           transformFile: function(file, done) {
              var myDropZone = this;
              var editor = $('.editor{{ $images->id }}');
              var imgThumbnail = $('.img-thumbnail{{ $images->id }}');
              $(imgThumbnail).addClass('d-none');
              $(editor).removeClass('d-none');
              $(editor).addClass('d-block');

              // Delete Button
              $('.delTD{{ $images->id }}').addClass('d-none');
              $('.editorTD{{ $images->id }}').attr('colspan',2);
              // Create confirm button at the top left of the viewport
              var buttonConfirm = $('.buttonConfirm{{ $images->id }}');
              $(buttonConfirm).removeClass('d-none');
              $(buttonConfirm).addClass('d-block');
              $(buttonConfirm).click(function() {
                // Get the canvas with image data from Cropper.js
                 var canvas = cropper.getCroppedCanvas({
                   width: 1200,
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
             var cropper = new Cropper(image, { aspectRatio: 4/3 });



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
@endif
</script>
@endsection
