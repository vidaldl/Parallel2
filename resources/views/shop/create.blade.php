@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('lib/iconpicker/css/fontawesome-iconpicker.css')}}">
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
<link href="{{ asset('lib/btnswitch/jquery.btnswitch.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/ui/trumbowyg.css')}}">
<link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css')}}">
<link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/plugins/table/ui/trumbowyg.table.min.css')}}">
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
  <h1 class="h3 mb-0 text-gray-800">{{isset($shop_items) ? 'Editar Artículo' : 'Añadir Artículo'}}</h1>
  <a href="{{route('shop.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Artículos<span></a>
</div>
  <div class="row justify-content-center">

    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">
          @if(isset($shop_items))
          <form method="POST" id="formulario" action="{{route('shop.update', $shop_items->id)}}" enctype="multipart/form-data">
            @csrf

              <div class="form-group">
                <label for="title" class="col-form-label">Titulo</label>
                <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{isset($shop_items) ? $shop_items->title : ''}}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="img_btn" class="col-form-label">Botón en la Imagen</label>
                <input id="img_btn" type="input" name="img_btn" class="form-control @error('img_btn') is-invalid @enderror"  value="{{isset($shop_items) ? $shop_items->img_btn : ''}}">
                  @error('img_btn')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="icon" class="col-form-label">Ícono del Botón en la Imagen</label>
                <div class="input-group">
                  <input id="icon" type="text" data-placement="bottomRight" class="form-control @error('img_icon') is-invalid @enderror"  name="img_icon" value="{{isset($shop_items) ? $shop_items->img_icon : ''}}">
                  <div class="btn-group">
                     <button type="button" class="btn btn-primary iconpicker-component"><i
                             class="{{ isset($shop_items) ? $shop_items->img_icon : 'fab fa-font-awesome-alt' }}"></i></button>
                     <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                             data-selected="fa-car" data-toggle="dropdown">
                         <span class="caret"></span>
                         <span class="sr-only">Toggle Dropdown</span>
                     </button>
                     <div class="dropdown-menu"></div>
                 </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-8">
                  <label for="weight" class="col-md-12 col-form-label">Peso</label>
                  <input id="weight" type="input" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ $shop_items->weight }}">
                    @error('weight')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="col-md-4">
                  <label for="unit" class="col-md-12 col-form-label">Unidad</label>
                  <select id="unit" type="input" name="unit" class="form-control @error('unit') is-invalid @enderror">
                    @if($shop_items->unit == 'lb')
                    <option selected>lb</option>
                    <option>kg</option>
                    @else
                    <option>lb</option>
                    <option selected>kg</option>
                    @endif
                  </select>
                    @error('unit')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="precio" class="col-md-12 col-form-label">Precio</label>
                <input id="precio" type="input" name="precio" class="form-control @error('precio') is-invalid @enderror" placeholder="$" value="{{ $shop_items->precio }}">
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
                  <input id="destacado_title" placeholder="%50 de Descuento" type="input" name="destacado_title" class="form-control @error('destacado_title') is-invalid @enderror"  value="{{isset($shop_items) ? $shop_items->destacado_title : ''}}">
                  @error('destacado_title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group" id="d-precio">
                  <label for="precio_nuevo" class="col-form-label">Destaque Precio</label>
                  <input id="precio_nuevo" placeholder="$" type="input" name="precio_nuevo" class="form-control @error('precio_nuevo') is-invalid @enderror"  value="{{isset($shop_items) ? $shop_items->precio_nuevo : ''}}">
                  @error('precio_nuevo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group" id="d-precio">
                <label for="button" class="col-form-label">Botón</label>
                <input id="button" type="input" name="button" class="form-control @error('button') is-invalid @enderror"  value="{{isset($shop_items) ? $shop_items->button : ''}}">
                @error('button')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="icon" class="col-form-label">Ícono del Botón</label>
                <div class="input-group">
                  <input id="icon2" type="text" data-placement="bottomRight" class="form-control @error('button_icon') is-invalid @enderror"  name="button_icon" value="{{isset($shop_items) ? $shop_items->button_icon : ''}}">
                  <div class="btn-group">
                     <button type="button" class="btn btn-primary iconpicker-component"><i class="{{ isset($shop_items) ? $shop_items->button_icon : 'fab fa-font-awesome-alt' }}"></i></button>
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
                  <input id="button_link" type="input" name="button_link" class="form-control @error('button_link') is-invalid @enderror"  value="{{isset($shop_items) ? $shop_items->button_link : ''}}">
                  @error('button_link')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="link_code" class="col-form-label">Codigo del Artículo</label>
                  <input id="link_code" type="input" name="link_code" class="form-control @error('link_code') is-invalid @enderror"  value="{{isset($shop_items) ? $shop_items->link_code : ''}}">
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

              <div class="form-group">
                <label for="details" class="col-form-label">Detalles del Producto</label>
                <textarea id="details" name="details" class="form-control @error('details') is-invalid @enderror"  >{{isset($shop_items) ? $shop_items->details : ''}}</textarea>
                  @error('details')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="description" class="col-form-label">Contenido Detalle</label>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"  >{{isset($shop_items) ? $shop_items->description : ''}}</textarea>
                  @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
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
          <form method="POST" id="form" action="{{route('shop.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title" class="col-form-label">Titulo</label>
              <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{isset($shop_items) ? $shop_items->title : ''}}">
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
@if(isset($shop_items))
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
              <form id="image" method="POST" class="image dropzone" action="{{ route('shop.update', $shop_items->id) }}" enctype="multipart/form-data">
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
              @if(isset($shop_items))
              <img style="width:100%;" src="{{'/storage/' . $shop_items->img_primaria}}" class="logoThumb img-fluid img-thumbnail rounded">
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
              <form id="image2" method="POST" class="image2 dropzone" action="{{route('shop.update', $shop_items->id)}}" enctype="multipart/form-data">
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
              @if(isset($shop_items))
              <img style="width:100%;" src="{{'/storage/' . $shop_items->img_secundaria}}" class="logoThumb2 img-fluid img-thumbnail rounded">
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
@if(isset($shop_items))
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script src="{{asset('lib/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/trumbowyg.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/noembed/trumbowyg.noembed.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/base64/trumbowyg.base64.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/table/trumbowyg.table.min.js')}}"></script>
<script>
//TEXT EDITOR
$('#details').trumbowyg({
  btns: [
    ['fontfamily'],
    ['formatting'],
    ['fontsize'],
    ['foreColor', 'backColor'],
    ['strong', 'em', 'del'],
    ['link'],
    ['base64'],
    ['noembed'],
    ['image'],
    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
    ['unorderedList', 'orderedList'],
    ['horizontalRule'],
    ['removeformat'],
    ['table'],
    ['fullscreen']
  ],
  plugins: {
      fontfamily: {
          fontList: [
            @foreach($font_styles as $font)
            {name: '{{$font->name}}', family: '{{$font->name}}, sans-serif'},
            @endforeach
              {name: 'Arial', family: 'Arial, Helvetica, sans-serif'},
              {name: 'Open Sans', family: '\'Open Sans\', sans-serif'}
          ]
      }
  }
});

$('#description').trumbowyg({
  btns: [
    ['fontfamily'],
    ['formatting'],
    ['fontsize'],
    ['foreColor', 'backColor'],
    ['strong', 'em', 'del'],
    ['link'],
    ['base64'],
    ['noembed'],
    ['image'],
    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
    ['unorderedList', 'orderedList'],
    ['horizontalRule'],
    ['removeformat'],
    ['table'],
    ['fullscreen']
  ],
  plugins: {
      fontfamily: {
          fontList: [
            @foreach($font_styles as $font)
            {name: '{{$font->name}}', family: '{{$font->name}}, sans-serif'},
            @endforeach
              {name: 'Arial', family: 'Arial, Helvetica, sans-serif'},
              {name: 'Open Sans', family: '\'Open Sans\', sans-serif'}
          ]
      }
  }
});

//DELETE IMAGE
$('#clearImage').on('click', function() {

  $.ajax({
         type:'POST',
         dataType: 'json',
         url:'{{route("sec.img.destroy", $shop_items->id)}}',
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
         url:'/shopUpdate/{{$shop_items->id}}',
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
         url:'/shopUpdate/{{$shop_items->id}}',
         data:{"_token": "{{ csrf_token() }}",
         val:val
        },
         success:function(data){
            alert(data.success);
         }
      });
},
  @if($shop_items->destacado == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});



$(document).ready(function () {
  @if($shop_items->destacado == 0)
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

  @if($shop_sections[0]->img_orientation == 1)
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
  @elseif($shop_sections[0]->img_orientation == 0)
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
