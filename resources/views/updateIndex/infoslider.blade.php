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
  <h1 class="h3 mb-0 text-gray-800">Editar Slider de Información</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"></div>
    <div class="col-md-12">
      <!-- LINE/SPACE -->
      @foreach($orders as $item)
        @if($item->id == 2)
      <form method="POST" action="{{route('line.update', 2)}}">
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
          <div id="collapse9">
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

          <form method="POST" action="{{route('infoSlider.update', $info_slider_texts[0]->id)}}" enctype="multipart/form-data">
            @csrf
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
                <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{ $info_slider_texts[0]->title }}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="contenido" class="col-form-label">Contenido</label>
                <textarea id="contenido" name="contenido" class="form-control @error('contenido') is-invalid @enderror"  >{{ $info_slider_texts[0]->contenido }}</textarea>

                  @error('contenido')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="button" class="col-form-label">Botón</label>
                <input id="button" type="input" name="button" class="form-control @error('button') is-invalid @enderror"  value="{{ $info_slider_texts[0]->button }}">
                  @error('button')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="link" class="col-form-label">Enlace</label>
                <input list="sections" id="link" type="input" name="link" class="form-control @error('button') is-invalid @enderror"  placeholder="Http://" value="{{$info_slider_texts[0]->link}}">
                <small class="form-text text-muted">Asegurece de que el Link Contiene &nbsp;HTTP:// &nbsp;Antes de la Dirección</small>
                  @error('link')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
<!-- MULTIMEDIA -->
              <div class="form-group">
                <label for="media_type">Tipo de Multimedia</label>
                <div id="media_type"></div>

                <div class="form-row mb-4">
                  <div class="col-md-6" id="type_image">
                    <label class="col-form-label">Manejar Slideshow</label><br>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImages">Imagenes &nbsp;&nbsp;<i class="fas fa-image"></i></a>
                  </div>
                  <div class="col-md-6" id="type_video">
                    <label class="col-form-label">Video:</label><br>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalVideo">Video &nbsp;&nbsp;<i class="fas fa-video"></i></a>
                  </div>
                </div>
              </div>
<!-- /MULTIMEDIA -->

              <div class="form-group">
                <label for="back_color">Color de Fondo</label><br>
                <input onchange="this.form.submit()" class="form-control col-md-6"  name="back_color" type="text" id="back_color" value="{{ $info_slider_texts[0]->back_color }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>
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
                    <form method="POST" id="video" class="dropzone" action="{{route('infoSlider.update', $info_slider_texts[0]->id)}}" enctype="multipart/form-data">
                      @csrf
                    </form>
                  </div>
                  <div class="col-md-12">
                    <video width="100%" controls muted loop>
                      <source src="{{ '/storage/' . $info_slider_texts[0]->video }}" type="video/mp4">
                    Your browser does not support the video tag.
                    </video>
                  </div>
                </div>
                <div class="modal-footer">
                  <form  method="POST" action="{{route('delete.sliderVideo', $info_slider_texts[0]->id)}}">
                    @csrf
                    @method('DELETE')
                    <div class="form-row">
                      <button type="submit" class="btn btn-danger align-right"><i class="fas fa-trash"></i></button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>


          <!--modal Image-->
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

                      @foreach($info_slider_images as $images)

                        <tr>
                          <td>
                            <div class="form-group">
                              <form method="POST" id="slide{{ $images->id}}" class="dropzone" action="{{route('update.sliderImage', $images->id)}}" enctype="multipart/form-data">
                              @csrf
                              </form>
                            </div>
                          </td>
                        <td class="editorTD{{ $images->id }}">

                          <img style="height:200px; " class="img-thumbnail{{ $images->id }}" src="{{'/storage/' . $images->image}}">
                          <div class="editor{{ $images->id }} d-none" style="height:450px; width: 450px; background-color: #000;">
                          </div>
                          <button class="buttonConfirm{{ $images->id }} btn btn-primary float-right mt-2 d-none">Confirmar</button>
                        </td>
                        <td class="delTD{{ $images->id }}">
                          <form  method="POST" action="{{route('delete.sliderImage', $images->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="X">
                          </form>
                        </td>
                        </tr>

                      @endforeach


                      @if($info_slider_images->count() < 7)

                      <tr class="imageInput">
                        <td>
                          <div class="form-group">
                            <form method="POST" id="slide" class="dropzone" action="{{route('store.sliderImage')}}" enctype="multipart/form-data">
                              @csrf
                            </form>
                            <label class="col-form-label">Tamaños de la Imagen:</label>
                            <p>Resolución: 1760x990</p>
                            <p>Aspect Ratio: 4/3</p>
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
                        </td>
                      </tr>

                      @else
                      <tr class="imageInput">
                        <td>
                          <div class="alert alert-danger" role="alert">
                            Ya existen demasiadas fotos en el Slider
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
          <!-- End modal logo -->

        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script src="{{asset('lib/trumbowyg/dist/trumbowyg.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js')}}"></script>
<script>
  $('#back_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
  $('#contenido').trumbowyg({
    btns: [
      ['viewHTML'],
      ['fontsize'],
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
           url:'/updateInfoSlider/1',
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
           url:'/updateInfoSlider/1',
           data:{"_token": "{{ csrf_token() }}",
           val:val
          },
           success:function(data){
              alert(data.success);
           }
        });
  },
  @if($info_slider_texts[0]->display_type == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});


</script>


<script>
  $(document).ready(function() {
    @if($info_slider_texts[0]->display_type == 1)
    $('#type_image').hide();
    @else
    $('#type_video').hide();
    @endif

    $('.imageInput').hide();
    $('#addImage').click(function() {
      $('.imageInput').show();
    });
  });
</script>

<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script>
  Dropzone.options.video = {
     paramName: "video",
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
    Dropzone.options.slide = {
       paramName: "slide",

       transformFile: function(file, done) {
          var myDropZone = this;
          var editor = $('.editorNew');
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
               height: 540
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


    @foreach($info_slider_images as $images)
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
               width: 720,
               height: 540
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
</script>
@endsection
