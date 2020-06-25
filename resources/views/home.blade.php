@extends('layouts.app')
@section('css')
@include('bladeStyles.fonts')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link href="{{ asset('lib/btnswitch/jquery.btnswitch.css') }}" rel="stylesheet">
<style media="screen">
.tgl-sw-swipe + .btn-switch {
  background: #e74a3b;
}

.highlight {
    border:3px dotted #385ECD;
    height:80px;
    margin:10px;
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
}
.actives {
	background: #466699 !important;
	border-bottom: 4px solid #2165D1 !important;
}

.actives A {
	color: white !important;
}

</style>
<link rel="stylesheet" href="{{asset('lib/iconpicker/css/fontawesome-iconpicker.css')}}">
<link rel="stylesheet" href="{{asset('lib/tooltipster/css/tooltipster.bundle.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('lib/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-borderless.min.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('lib/magnific/magnific-popup.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
@endsection
@section('content')
<div class="d-sm-flex align-items-center  mb-4" >
<form autocomplete="off" class="col-md-12" method="POST" action="{{route('style.update', $styles[0]->id)}}">
  @csrf
 <h1 class="h3 mb-3 text-gray-800">Manejador</h1>
<div class="row">
  <div class="card col-md-4">
    <div class="row justify-content-center">
        <div class="form-group col-md-12">
          <label for="page_title">Titulo del Sitio</label><br>
          <input onchange="this.form.submit()" class="form-control col-md-6"  name="page_title" type="text" id="page_title" value="{{ $styles[0]->page_title }}">
        </div>
        <!-- <div class="form-group col-md-4">
          <label for="primary_color">Color Principal</label><br>
          <input onchange="this.form.submit()" class="form-control" name="primary_color" type="text" id="primary_color" value="{{ $styles[0]->primary_color }}">
        </div> -->
        <div class="form-group col-md-4">
          <label for="button_primary">Botón Desactivado</label><br>
          <input onchange="this.form.submit()" class="form-control" name="button_primary" type="text" id="button_primary" value="{{ $styles[0]->button_primary }}">
        </div>
        <div class="form-group col-md-4">
          <label for="button_secondary">Botón Activado</label><br>
          <input onchange="this.form.submit()" class="form-control" name="button_secondary" type="text" id="button_secondary" value="{{ $styles[0]->button_secondary }}">
        </div>

      </div>
      <div class="form-group">
        <label>FAV Icon</label><br>
        <a href="#" class="btn btn-primary"  data-toggle="modal" data-target="#modalfavicon">FavIcon &nbsp;&nbsp;<i class="fas fa-image"></i></a>
      </div>
  </div>
  </form>



  <div class="card col-md-7 offset-md-1">
    <h5 class="mt-3">Estilo de Letras(Fuentes):</h5>
    <div class="row justify-content-center">


        <div class="form-group">
          <label for="">Tus Fuentes</label><br>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fontsModal">
            Estilo de Fuente &nbsp;
            <i class="fad fa-font-case"></i>
          </button>

        </div>
        <form class="col-md-12" action="{{route('fontStyle.update')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="">Fuente para los Titulos</label><br>
            <select onchange="this.form.submit()" class="form-control" name="titles" type="text">
              @foreach($font_styles as $item)
                @if($fonts[0]->font_name == $item->name)
                  <option value="{{$item->id}}" selected>{{$item->name}}</option>
                @elseif($fonts[0]->font_name != $item->name)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endif
              @endforeach
            </select>
          </div>
        </form>
        <form class="col-md-12" action="{{route('fontStyle.update')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="">Fuente para el Cuerpo</label><br>
            <select onchange="this.form.submit()" class="form-control" name="body" type="text">
              @foreach($font_styles as $item)
                @if($fonts[1]->font_name == $item->name)
                  <option value="{{$item->id}}" selected>{{$item->name}}</option>
                @elseif($fonts[1]->font_name != $item->name)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endif

              @endforeach
            </select>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- FONTS MODAL =====================================================-->
<div class="modal fade" id="fontsModal" tabindex="-1" role="dialog" aria-labelledby="fontsModal" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lista de Fuentes Disponibles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Fuente</th>
              <th scope="col">Ejemplo</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($font_styles as $item)
              <tr>
                <td>{{$item->name}}</td>
                <td style="font-family: '{{$item->name}}'; font-size: 42px">{{$item->name}}</td>
                <form method="POST" action="{{route('font.delete', $item->id)}}">
                  @csrf
                  <td><button type="submit" class="btn btn-danger"><i class="far fa-trash"></i></button></td>
                </form>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

        <div class="modal-footer">
          <form class="col-md-12" method="POST" action="{{route('font.store')}}">
            @csrf
            <div class="row">
              <input type="text" class="form-control col-md-3 mr-1" name="name" id="fontName" placeholder="Nombre">
              <input type="text" class="form-control col-md-3 mr-1" name="link" id="fontLink" placeholder="Link">
              <a href="https://www.youtube.com/watch?v=7bUVjJWA6Vw" class="mfp-iframe my-auto" id="iframe" data-dismiss="modal"><i class="fad fa-question-circle fa-lg"></i></a>
              <button type="submit" class=" offset-md-2 btn btn-primary ml-auto"><i class="far fa-plus-square"></i>  Agregar</button>
            </div>
          </form>
        </div>

    </div>
  </div>
</div>
</div>
<!-- /FONTS MODAL =====================================================-->
<div class="tabs">

    <ul class="tabs-navigation horizontal">
      <li class="li actives"><a class="a" href="#activo">Activas</a></li>
      <li class="li"><a class="a" href="{{route('home.inactive')}}">Inactivas</a></li>
      <!-- <li class="li"><a class="a" href="#paginas">Páginas</a></li> -->
    </ul>

<!-- ACTIVO -->
  <div id="activo" class=" tabdiv">
    <div class="row">
      <div class="container">
        <div class="col-md-12">
          <!-- Inicio -->
          <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="row">
                  <span class="col-md-6"><h6 class="m-0 font-weight-bold text-primary">Inicio</h6></span>
                </div>
              </div>
              <div class="card-body row">
                <div class="col-md-6">
                  <img class="img-fluid" src="{{asset('img/sections/section1.png')}}">
                </div>
                <div class=" col-md-6">
                  <div class="row">
                    <a class="btn btn-success mx-auto mt-5" href="editsection1/{{$contenidosection1s[0]->id}}">Editar contenido &rarr;</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Inicio -->
        </div>

        <div class="" id="sort">
          @foreach($orders as $order)
            <div id="{{$order->id}}" class="col-md-12 sortable">
              @if($order->display == 1)
                <div id="sect{{$order->id}}" class="col-md-12 mb-4">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <div class="row">
                        <div class="col-md-1">
                          <div class="handle"><i class="fas fa-arrows-alt"></i></div>
                        </div>
                        <span class="col-md-6"><h6 class="m-0 font-weight-bold text-primary">{{$order->name}}</h6></span>
                        <div class="ml-auto mr-5">
                          <div class="row">
                            <h5>Mostrar:</h5>&nbsp;&nbsp;
                            <div id="display{{$order->id}}"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body row">
                      <div class="col-md-6">
                        <img class="img-fluid" src="{{asset('img/sections/') .'/'. $order->section  }}.png">
                      </div>
                      <div class=" col-md-6">
                        <div class="row">
                          <a class="btn btn-success mx-auto mt-5" href="{{$order->edit_link}}">Editar contenido &rarr;</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            </div>

          @endforeach
        </div>

        <div class="col-md-12">
          <!-- FOOTER -->
          <div class="col-md-12 mb-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="row">
                  <span class="col-md-6"><h6 class="m-0 font-weight-bold text-primary">Footer</h6></span>
                </div>
              </div>
              <div class="card-body row">
                <div class="col-md-6">
                  <img class="img-fluid" src="{{asset('img/sections/footer.png')}}">
                </div>
                <div class=" col-md-6">
                  <div class="row">
                    <a class="btn btn-success mx-auto mt-5" href="editsectionFooter/1">Editar contenido &rarr;</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /FOOTER -->
        </div>
      </div>
    </div>
  </div>

</div>

<!--FAVICON-->
<div class="modal fade" id="modalfavicon" tabindex="-1" role="dialog" aria-labelledby="modalfavicon" aria-hidden="true">
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
              <label for="favicon" class="col-form-label">Subir Favicon</label>
              <form id="favicon" method="POST" class="favicon dropzone" action="{{route('style.update', 1)}}" enctype="multipart/form-data">
                @csrf
              </form>
              <label class="col-form-label">Tamaños de la Imagen:</label>
              <p>Resolución: 32x32</p>
              <p>Aspect Ratio: 1:1</p>
              </div>
            </div>
            <div class="col-md-8">

              <img style="width:50px;" src="{{'/storage/' . $styles[0]->favicon}}" class="logoThumb img-fluid img-thumbnail rounded">
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
<!-- FAVICON -->
@endsection
@section('script')
<script src="{{ asset('lib/tooltipster/js/tooltipster.bundle.js') }}"></script>
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script src="{{asset('lib/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
<script src="{{ asset('lib/magnific/jquery.magnific-popup.min.js') }}"></script>
<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script>
Dropzone.options.favicon = {
   paramName: "favicon",
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
           width: 32,
           height: 32
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


$('#iframe').magnificPopup({
    type: 'iframe'
});
$(document).ready(function () {
  $("#sort").sortable({
        axis: 'y',
        placeholder: 'highlight',
        handle: '.handle',
        containment: '.tabdiv',
        scroll:'auto',
        cursor: 'move',
        tolerance: 'pointer',
        revert: 'invalid',
        forceHelperSize: true,
        sort: function(e) {
          $('.line-space').fadeOut();
        },
        update: function( ) {
          $('.line-space').fadeIn();
        },
        stop: function() {
          $.map($(this).find('.sortable'), function(el) {
            var itemID = el.id;
            var itemIndex = $(el).index();
            console.log(itemID);
            console.log(itemIndex);
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              url: '/order',
              type: 'POST',
              dataType: 'json',
              data: {itemID: itemID, itemIndex: itemIndex},

            })
          });
        }
     });
});

@foreach($orders as $order)
  $('#display{{$order->id}}').btnSwitch({
    Theme:'Swipe',
    OnText: "Si",
    OffText: "No",
    OnValue: '1',
    OnCallback: function(val) {

      $.ajax({
             type:'POST',
             dataType: 'json',
             url:'/display-{{$order->section}}',
             data:{"_token": "{{ csrf_token() }}",
             val:val
            },
             success:function(data){
                alert(data.success);
             }
          });

          setTimeout(
            function()
            {
              $('#sect{{$order->id}}').fadeOut();
            }, 500);
      },
    OffValue: '0',
    OffCallback: function (val) {
      $.ajax({
             type:'POST',
             dataType: 'json',
             url:'/display-{{$order->section}}',
             data:{"_token": "{{ csrf_token() }}",
             val:val
            },
             success:function(data){
                alert(data.success);
             }
          });

          setTimeout(
            function()
            {
              $('#sect{{$order->id}}').fadeOut();
            }, 500);

    },
    @if($order->display == 0)
    ToggleState: false
    @else
    ToggleState: true
    @endif
  });
@endforeach
</script>
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script>
  $('#primary_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
  $('#button_primary').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
  $('#button_secondary').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
</script>



@endsection
