@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('lib/iconpicker/css/fontawesome-iconpicker.css')}}">
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
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
  background: #e74a3b;
}
</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{isset($catalog_item2s) ? 'Editar Artículo' : 'Añadir Artículo'}}</h1>
  <a href="{{route('catalog2.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Artículos<span></a>
</div>
  <div class="row justify-content-center">

    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">
          @if(isset($catalog_item2s))
          <form method="POST" id="formulario" action="{{route('catalog2.update', $catalog_item2s->id)}}" enctype="multipart/form-data">
            @csrf

              <div class="form-group">
                <label for="title" class="col-form-label">Titulo</label>
                <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{isset($catalog_item2s) ? $catalog_item2s->title : ''}}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="img_btn" class="col-form-label">Botón en la Imagen</label>
                <input id="img_btn" type="input" name="img_btn" class="form-control @error('img_btn') is-invalid @enderror"  value="{{isset($catalog_item2s) ? $catalog_item2s->img_btn : ''}}">
                  @error('img_btn')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="icon" class="col-form-label">Ícono del Botón en la Imagen</label>
                <div class="input-group">
                  <input id="icon" type="text" data-placement="bottomRight" class="form-control @error('img_icon') is-invalid @enderror"  name="img_icon" value="{{isset($catalog_item2s) ? $catalog_item2s->img_icon : ''}}">
                  <div class="btn-group">
                     <button type="button" class="btn btn-primary iconpicker-component"><i
                             class="{{ isset($catalog_item2s) ? $catalog_item2s->img_icon : 'fab fa-font-awesome-alt' }}"></i></button>
                     <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                             data-selected="fa-car" data-toggle="dropdown">
                         <span class="caret"></span>
                         <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <div class="dropdown-menu"></div>
                 </div>
                </div>
              </div>

              <div class="form-group">
                <label for="precio" class="col-md-12 col-form-label">Precio</label>
                <input id="precio" type="input" name="precio" class="form-control @error('precio') is-invalid @enderror" placeholder="$" value="{{ $catalog_item2s->precio }}">
                  @error('button')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="destacado">Es Destacado el Artículo?</label>
                <div id="destacado"></div>

                <div class="form-group" id="d-titulo">
                  <label for="destacado_title" class="col-form-label">Destaque Titulo</label>
                  <input id="destacado_title" placeholder="%50 de Descuento" type="input" name="destacado_title" class="form-control @error('destacado_title') is-invalid @enderror"  value="{{isset($catalog_item2s) ? $catalog_item2s->destacado_title : ''}}">
                  @error('destacado_title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group" id="d-precio">
                  <label for="precio_nuevo" class="col-form-label">Destaque Precio</label>
                  <input id="precio_nuevo" placeholder="$" type="input" name="precio_nuevo" class="form-control @error('precio_nuevo') is-invalid @enderror"  value="{{isset($catalog_item2s) ? $catalog_item2s->precio_nuevo : ''}}">
                  @error('precio_nuevo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group" id="d-precio">
                <label for="button" class="col-form-label">Botón</label>
                <input id="button" type="input" name="button" class="form-control @error('button') is-invalid @enderror"  value="{{isset($catalog_item2s) ? $catalog_item2s->button : ''}}">
                @error('button')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="icon" class="col-form-label">Ícono del Botón</label>
                <div class="input-group">
                  <input id="icon2" type="text" data-placement="bottomRight" class="form-control @error('button_icon') is-invalid @enderror"  name="button_icon" value="{{isset($catalog_item2s) ? $catalog_item2s->button_icon : ''}}">
                  <div class="btn-group">
                     <button type="button" class="btn btn-primary iconpicker-component"><i class="{{ isset($catalog_item2s) ? $catalog_item2s->button_icon : 'fab fa-font-awesome-alt' }}"></i></button>
                     <button type="button" class="icp2 icp-dd2 btn btn-primary dropdown-toggle" data-selected="fa-car" data-toggle="dropdown">
                         <span class="caret"></span>
                         <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <div class="dropdown-menu"></div>
                 </div>
                </div>
              </div>

              <div class="form-row" id="d-precio">
                <div class="col-md-8">
                  <label for="button_link" class="col-form-label">Link del Botón</label>
                  <input id="button_link" type="input" name="button_link" class="form-control @error('button_link') is-invalid @enderror"  value="{{isset($catalog_items) ? $catalog_items->button_link : ''}}">
                  @error('button_link')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="link_code" class="col-form-label">Codigo del Articulo</label>
                  <input id="link_code" type="input" name="link_code" class="form-control @error('link_code') is-invalid @enderror"  value="{{isset($catalog_items) ? $catalog_items->link_code : ''}}">
                  @error('link_code')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>


<!-- IMAGENES -->
              <div class="form-group">
                <label for="image" class="col-form-label">Imagen Primaria</label><br>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImage">Principal &nbsp;&nbsp;<i class="fas fa-image"></i></a>
              </div>

              <div class="form-group">
                <label for="image" class="col-form-label">Imagen Secundaria(opcional)</label><br>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImage2">Secundaria &nbsp;&nbsp;<i class="fas fa-image"></i></a>
              </div>

              <!-- <div class="input-group mb-3">
              <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImage2">Secundaria &nbsp;&nbsp;<i class="fas fa-image"></i></a>
              <button id="clearImage" class="btn btn-danger ml-4" type="button"><i class="fas fa-trash"></i></button>

              </div> -->

<!-- OTRAS IMAGENES -->
              <!-- <div class="form-group">
                <label for="image" class="col-form-label">Otras Imágenes</label><br>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImage3">Otras &nbsp;&nbsp;<i class="fas fa-image"></i></a>
              </div> -->
<!-- /OTRAS IMAGENES -->
              <div class="form-group">
                <button type="submit" id="mandar" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>
          @else
          <form method="POST" id="form" action="{{route('catalog2.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title" class="col-form-label">Titulo</label>
              <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{isset($catalog_item2s) ? $catalog_item2s->title : ''}}">
                @error('title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success float-right">Añadir</button>
            </div>
          </form>

          @endif

        </div>
    </div>
  </div>
</div>
@if(isset($catalog_item2s))
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
              <form id="image" method="POST" class="image dropzone" action="{{ route('catalog2.update', $catalog_item2s->id) }}" enctype="multipart/form-data">
                @csrf
              </form>
              <label class="col-form-label">Tamaños de la Imagen:</label>
              <p>Resolución: 945x675</p>
              <p>Aspect Ratio: Horizontal 5:7 | Vertical: 3:2</p>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="col-md-8">
              @if(isset($catalog_item2s))
              <img style="width:100%;" src="{{'/storage/' . $catalog_item2s->img_primaria}}" class="logoThumb img-fluid img-thumbnail rounded">
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

<!-- MODAL IMAGEN SECUNDARIA -->
<div class="modal fade" id="modalImage2" tabindex="-1" role="dialog" aria-labelledby="modalBack" aria-hidden="true">
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
              <form id="image2" method="POST" class="image2 dropzone" action="{{route('catalog2.update', $catalog_item2s->id)}}" enctype="multipart/form-data">
                @csrf
              </form>
              <label class="col-form-label">Tamaños de la Imagen:</label>
              <p>Resolución: 945x675</p>
              <p>Aspect Ratio: Horizontal 5:7 | Vertical: 3:2</p>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="col-md-8">
              @if(isset($catalog_item2s))
              <img style="width:100%;" src="{{'/storage/' . $catalog_item2s->img_secundaria}}" class="logoThumb2 img-fluid img-thumbnail rounded">
              @endif
              <div class="editador2 d-none" style="width:450px; height: 600px; background-color: #000;">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer ">
        <button class="buttonConfirm2 btn btn-primary d-none">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- /MODAL IMAGEN SECUNDARIA -->
@endif

@endsection
@section('script')
@if(isset($catalog_item2s))
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script src="{{asset('lib/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
<script>
$('#clearImage').on('click', function() {

  $.ajax({
         type:'POST',
         dataType: 'json',
         url:'{{route("sec.img.destroy", $catalog_item2s->id)}}',
         data:{"_token": "{{ csrf_token() }}",
         val:val
        },
         success:function(data){
           alert('Imagen Eliminada');
         }
      });
});



$('#destacado').btnSwitch({
Theme:'Swipe',
OnText: "Si",
OffText: "No",
OnValue: '1',
OnCallback: function(val) {
  $('#d-titulo').show();
  $('#d-precio').show();

  $.ajax({
         type:'POST',
         dataType: 'json',
         url:'/catalog2Update/{{$catalog_item2s->id}}',
         data:{"_token": "{{ csrf_token() }}",
         val:val
        },
         success:function(data){
            alert(data.success);
         }
      });
  },
OffValue: '0',
OffCallback: function (val) {
  $('#d-titulo').hide();
  $('#d-precio').hide();

  $.ajax({
         type:'POST',
         dataType: 'json',
         url:'/catalog2Update/{{$catalog_item2s->id}}',
         data:{"_token": "{{ csrf_token() }}",
         val:val
        },
         success:function(data){
            alert(data.success);
         }
      });
},
  @if($catalog_item2s->destacado == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});



$(document).ready(function () {
  @if($catalog_item2s->destacado == 0)
    $('#d-titulo').hide();
    $('#d-precio').hide();
  @endif
  $('.icp-dd').iconpicker();
  $('.icp-dd2').iconpicker();
});
$('.icp').on('iconpickerSelected', function (e) {
    $('#icon').get(0).value = e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
  });

  $('.icp2').on('iconpickerSelected', function (e) {
      $('#icon2').get(0).value = e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
    });
</script>


<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script>
@if($catalog_section2s[0]->img_orientation == 1)
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
             width: 675,
             height: 945
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
       var cropper = new Cropper(image, { aspectRatio: 5/7 });
   },
   init: function () {

      this.on("complete", function (file) {
        setTimeout(
          function()
          {
            location.reload();
          }, 1500);
      });
    }
  };

  Dropzone.options.image2 = {
    paramName: "image2",

     transformFile: function(file, done) {
        var myDropZone = this;
        var editor = $('.editador2');
        var logoThumb = $('.logoThumb2');
        $(logoThumb).addClass('d-none');
        $(editor).removeClass('d-none');
        $(editor).addClass('d-block');
        // Create confirm button at the top left of the viewport
        var buttonConfirm = $('.buttonConfirm2');
        $(buttonConfirm).removeClass('d-none');
        $(buttonConfirm).addClass('d-block');
        $(buttonConfirm).click(function() {
          // Get the canvas with image data from Cropper.js
           var canvas = cropper.getCroppedCanvas({
             width: 675,
             height: 945
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
       var cropper = new Cropper(image, { aspectRatio: 5/7 });
   },
   init: function () {

      this.on("complete", function (file) {
        setTimeout(
          function()
          {
            location.reload();
          }, 1500);
      });
    }
  };
@elseif($catalog_section2s[0]->img_orientation == 0)
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
          setTimeout(
            function()
            {
              location.reload();
            }, 1500);
        });
      }
    };

  Dropzone.options.image2 = {
      paramName: "image2",

       transformFile: function(file, done) {
          var myDropZone = this;
          var editor = $('.editador2');
          var logoThumb = $('.logoThumb2');
          $(logoThumb).addClass('d-none');
          $(editor).removeClass('d-none');
          $(editor).addClass('d-block');
          // Create confirm button at the top left of the viewport
          var buttonConfirm = $('.buttonConfirm2');
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
          setTimeout(
            function()
            {
              location.reload();
            }, 1500);
        });
      }
    };
@endif
</script>
@endif
@endsection
