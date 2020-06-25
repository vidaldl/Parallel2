@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link href="{{ asset('lib/btnswitch/jquery.btnswitch.css') }}" rel="stylesheet">
<style media="screen">
.tgl-sw-swipe + .btn-switch {
      background: #e74a3b;
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
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
<link rel="stylesheet" href="{{asset('lib/iconpicker/css/fontawesome-iconpicker.css')}}">
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Barra del Menu</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"></div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">

              <div class="form-group d-none d-sm-block d-md-block d-lg-none">
                Aqui va el menu
              </div>

              <div class="form-group">
                  <label class="col-form-label">Logo del Menu</label><br>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalLogo">Subir Logo &nbsp;&nbsp;<i class="fas fa-image"></i></a>

                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalLogoDark">Subir Logo Oscuro &nbsp;&nbsp;<i class="fas fa-image"></i></a>
              </div>
              <div class="form-group mb-3">
                <h4>Secciones Activas:</h4>
              </div>

                <form class="form-group" action="{{route('menu.update', 1)}}" method="POST">
                  @csrf
                  <div class="form-group row">
                    <div class="col-md-4">
                      <label for="menu_style">Estilo del Menu</label>
                      <select name="menu_style" onchange="this.form.submit()">
                        @if($menu_items[0]->menu_style == 0)
                        <option value="0" selected>Light</option>
                        <option value="1">Transparente</option>
                        <option value="2">Fondo</option>
                        <option value="3" >Fondo - No Inicio</option>
                        @elseif($menu_items[0]->menu_style == 1)
                        <option value="0">Light</option>
                        <option value="1" selected>Transparente</option>
                        <option value="2">Fondo</option>
                        <option value="3" >Fondo - No Inicio</option>
                        @elseif($menu_items[0]->menu_style == 2)
                        <option value="0">Light</option>
                        <option value="1">Transparente</option>
                        <option value="2" selected>Fondo</option>
                        <option value="3" >Fondo - No Inicio</option>
                        @elseif($menu_items[0]->menu_style == 3)
                        <option value="0">Light</option>
                        <option value="1">Transparente</option>
                        <option value="2">Fondo - Inicio</option>
                        <option value="3" selected>Fondo - No Inicio</option>
                        @endif
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="menu_borders">Bordes en el Menu:</label>
                      <select name="menu_borders" onchange="this.form.submit()">
                        @if($menu_items[0]->menu_borders == 0)
                        <option value="0" selected>No</option>
                        <option value="1">Si</option>
                        @else
                        <option value="0">No</option>
                        <option value="1" selected>Si</option>
                        @endif
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="menu_sticky">Menu Sticky:</label>
                      <select name="menu_sticky" onchange="this.form.submit()">
                        @if($menu_items[0]->menu_sticky == 0)
                        <option value="0" selected>No</option>
                        <option value="1">Si</option>
                        @else
                        <option value="0">No</option>
                        <option value="1" selected>Si</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <label for="inicio" class="col-form-label">Margen de los lados del Menu</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">px</span>
                    </div>
                    <input id="padding" type="input" name="padding" class="form-control @error('padding') is-invalid @enderror"  value="{{ $menu_items[0]->padding }}">
                      @error('padding')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    <div class="input-group-append">
                      <button class="btn btn-success" type="submit">Actualizar</button>
                    </div>
                  </div>

                  <label for="inicio" class="col-form-label">Inicio</label>
                  <div class="input-group">

                    <input id="inicio" type="input" name="inicio" class="form-control @error('inicio') is-invalid @enderror"  value="{{ $menu_items[0]->item_inicio }}">
                      @error('inicio')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    <div class="input-group-append">
                      <button class="btn btn-success" type="submit">Actualizar</button>
                    </div>
                  </div>



                </form>

              @foreach($order as $menu_item)
                @if($menu_item->display == 1)
                  <div class="form-group">
                    <label for="{{$menu_item->name}}" class="col-form-label">{{$menu_item->name}}</label>
                    <div class="input-group">

                    <input id="{{$menu_item->section}}" type="input" name="{{$menu_item->section}}" class="form-control @error('{{$menu_item->section}}') is-invalid @enderror"  value="{{$menu_item->menu_name}}" {{$menu_item->menu_display == 1 ? "" : "disabled"}}>
                      @error('{{$menu_item->section}}')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      <div class="input-group-append">
                        <button class="btn btn-warning" type="button" id="enable{{$menu_item->id}}"><i class="fas fa-eye"></i></button>
                        <button class="btn btn-warning" type="button" id="disable{{$menu_item->id}}"><i class="fas fa-eye-slash"></i></button>
                        <button class="btn btn-success" type="button" id="update{{$menu_item->id}}">Actualizar</button>

                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
              <!-- <div class="form-group">
                <button id="ajButton" class="btn btn-success float-right">Actualizar</button>
              </div> -->


              <div class="row">
                <!-- LINK 1 ============================= -->
                <div class="card col-md-6">
                  <div class="card-body">
                    <h5>Link Extra 1</h5>&nbsp;&nbsp;
                    <div class="form-group">
                      <label>Mostrar:</label>
                      <div id="display1"></div>
                    </div>
                    <form id="link1" autocomplete="off" class="col-md-12" method="POST" action="{{route('menuSide.update', $styles[0]->id)}}">
                      @csrf
                      <div class="form-group">
                        <label for="custom_link_text_1">Texto del Enlace</label><br>
                        <input class="form-control col-md-12"  name="custom_link_text_1" type="text" id="custom_link_text_1" value="{{ $styles[0]->custom_link_text_1 }}">
                      </div>
                      <div class="form-group">
                        <label for="custom_link_address_1">Especifique Enlace</label><br>
                        <input list="sections" class="form-control col-md-12"  name="custom_link_address_1" type="text" id="custom_link_address_1" placeholder="Http://" value="{{ $styles[0]->custom_link_address_1 }}">
                        <small  class="form-text text-muted">Asegurece de que el Link Contiene &nbsp;HTTP:// &nbsp;Antes de la Dirección</small>
                      </div>
                      <div class="form-group">
                        <label>Estilo de Enlace</label>
                        <div id="enlace1"></div>
                      </div>
                      <div id="iconfind1" class="col-md-12 mt-3 mb-3">

                      <input onchange="this.form.submit()" id="custom_icon_1" data-placement="bottomRight" class="form-control @error('custom_icon_1') is-invalid @enderror"  name="custom_icon_1" value="{{ $styles[0]->custom_icon_1 }}">
                      <div class="btn-group mt-1">
                         <button type="button" class="btn btn-primary iconpicker-component"><i
                                 class="{{  $styles[0]->custom_icon_1 }}"></i></button>
                         <button type="button" class="icp1 icp-dd1 btn btn-primary dropdown-toggle"
                                 data-selected="fa-car" data-toggle="dropdown">
                             <span class="caret"></span>
                         </button>
                         <div class="dropdown-menu"></div>
                       </div>

                      </div>
                      <div class="row">
                        <button type="submit" class="btn btn-success mx-auto mt-5 mb-3">Actualizar</button>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- LINK 2 ============================= -->
                <div class="card col-md-6">
                  <div class="card-body">
                    <h5>Link Extra 2</h5>&nbsp;&nbsp;
                    <div class="form-group">
                      <label>Mostrar:</label>
                      <div id="display2"></div>
                    <form id="link2" autocomplete="off" class="col-md-12" method="POST" action="{{route('menuSide.update', $styles[0]->id)}}">
                      @csrf
                      <div class="form-group">
                        <label for="custom_link_text_1">Texto del Enlace</label><br>
                        <input class="form-control col-md-12"  name="custom_link_text_2" type="text" id="custom_link_text_2" value="{{ $styles[0]->custom_link_text_2 }}">
                      </div>
                      <div class="form-group">
                        <label for="custom_link_address_1">Especifique Enlace</label><br>
                        <input list="sections" class="form-control col-md-12"  name="custom_link_address_2" type="text" id="custom_link_address_2" placeholder="Http://" value="{{ $styles[0]->custom_link_address_2 }}">
                        <small class="form-text text-muted">Asegurece de que el Link Contiene &nbsp;HTTP:// &nbsp;Antes de la Dirección</small>
                      </div>
                      <div class="form-group">
                        <label>Estilo de Enlace</label>
                        <div id="enlace2"></div>
                      </div>

                      <div id="iconfind2" class="col-md-8 mt-3 mb-3">
                          <input id="custom_icon_2" onchange="this.form.submit" data-placement="bottomRight" class="form-control @error('custom_icon_2') is-invalid @enderror"  name="custom_icon_2" value="{{ $styles[0]->custom_icon_2 }}">
                          <div class="btn-group mt-1">
                             <button type="button" class="btn btn-primary iconpicker-component"><i
                                     class="{{  $styles[0]->custom_icon_2 }}"></i></button>
                             <button type="button" class="icp2 icp-dd2 btn btn-primary dropdown-toggle"
                                     data-selected="fa-car" data-toggle="dropdown">
                                 <span class="caret"></span>
                             </button>
                             <div class="dropdown-menu"></div>
                         </div>
                      </div>
                      <div class="row">
                        <button type="submit" class="btn btn-success mx-auto mt-5 mb-3">Actualizar</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
  </div>
</div>

<!--modal logo-->
<div class="modal fade" id="modalLogo" tabindex="-1" role="dialog" aria-labelledby="modalLogo" aria-hidden="true">
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
              <form id="logo" method="POST" class="logo dropzone" action="{{route('menuLogo.update', 1)}}" enctype="multipart/form-data">
                @csrf
              </form>
              <label class="col-form-label">Tamaños de la Imagen:</label>
              <p>Resolución: 720x310</p>
              <p>Aspect Ratio: Libre</p>
              </div>
            </div>
            <div class="col-md-8">

              <img style="width:100%;" src="{{'/storage/' . $menu_items[0]->logo}}" class="logoThumb img-fluid img-thumbnail rounded">
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

<!--modal logo dark-->
<div class="modal fade" id="modalLogoDark" tabindex="-1" role="dialog" aria-labelledby="modalLogoDark" aria-hidden="true">
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
              <form id="dark" method="POST" class="dark dropzone" action="{{route('menuLogo.update', 1)}}" enctype="multipart/form-data">
                @csrf
              </form>
              </div>
            </div>
            <div class="col-md-8">
              <img style="width:100%;" src="{{'/storage/' . $menu_items[0]->logo_dark}}" class="logoThumb1 img-fluid img-thumbnail rounded">
            <div class="editador1 d-none" style="height:450px; background-color: #000;">
            </div>
            </div>
          </div>
      </div>
      <div class="modal-footer buttons">
        <button class="buttonConfirm1 btn btn-primary d-none">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- End modal logo  dark-->
@endsection

@section('script')
<script src="{{asset('lib/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script>

@if($styles[0]->link_mode_1 == '0')
  $('#iconfind1').hide();
@endif

@if($styles[0]->link_mode_2 == '0')
  $('#iconfind2').hide();
@endif

@if($styles[0]->show_link_1 == '0')
  $('#link1').hide();
@endif

@if($styles[0]->show_link_2 == '0')
  $('#link2').hide();
@endif
$('#display1').btnSwitch({
  Theme:'Swipe',
  OnText: "Si",
  OffText: "No",
  OnValue: '1',
  OnCallback: function(val) {
    $('#link1').show();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("menuSide.update", $styles[0]->id)}}',
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
    $('#link1').hide();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("menuSide.update", $styles[0]->id)}}',
           data:{"_token": "{{ csrf_token() }}",
           val:val
          },
           success:function(data){
              alert(data.success);
           }
        });

  },
  @if($styles[0]->show_link_1 == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});

$('#enlace1').btnSwitch({
  Theme:'Swipe',
  OnText: "Ícono",
  OffText: "Texto",
  OnValue: '1',
  OnCallback: function(val) {
    $('#iconfind1').show();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("menuSide.update", $styles[0]->id)}}',
           data:{"_token": "{{ csrf_token() }}",
           enlace1:val
          },
           success:function(data){
              alert(data.success);
           }
        });

    },
  OffValue: '0',
  OffCallback: function (val) {
    $('#iconfind1').hide();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("menuSide.update", $styles[0]->id)}}',
           data:{"_token": "{{ csrf_token() }}",
           enlace1:val
          },
           success:function(data){
              alert(data.success);
           }
        });

  },
  @if($styles[0]->link_mode_1 == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});



$('#display2').btnSwitch({
  Theme:'Swipe',
  OnText: "Si",
  OffText: "No",
  OnValue: '1',
  OnCallback: function(val) {
    $('#link2').show();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("menuSide.update", $styles[0]->id)}}',
           data:{"_token": "{{ csrf_token() }}",
           val1:val
          },
           success:function(data){
              alert(data.success);
           }
        });

    },
  OffValue: '0',
  OffCallback: function (val) {
    $('#link2').hide();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("menuSide.update", $styles[0]->id)}}',
           data:{"_token": "{{ csrf_token() }}",
           val1:val
          },
           success:function(data){
              alert(data.success);
           }
        });

  },
  @if($styles[0]->show_link_2 == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});

$('#enlace2').btnSwitch({
  Theme:'Swipe',
  OnText: "Ícono",
  OffText: "Texto",
  OnValue: '1',
  OnCallback: function(val) {
    $('#iconfind2').show();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("menuSide.update", $styles[0]->id)}}',
           data:{"_token": "{{ csrf_token() }}",
           enlace2:val
          },
           success:function(data){
              alert(data.success);
           }
        });

    },
  OffValue: '0',
  OffCallback: function (val) {
    $('#iconfind2').hide();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("menuSide.update", $styles[0]->id)}}',
           data:{"_token": "{{ csrf_token() }}",
           enlace2:val
          },
           success:function(data){
              alert(data.success);
           }
        });

  },
  @if($styles[0]->link_mode_2 == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});

$(document).ready(function () {
$('.icp-dd1').iconpicker();
$('.icp-dd2').iconpicker();
});
$('.icp1').on('iconpickerSelected', function (e) {
  $('#custom_icon_1').get(0).value = e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
});
$('.icp2').on('iconpickerSelected', function (e) {
  $('#custom_icon_2').get(0).value = e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
});
</script>
<script>
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
           height: 310
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

Dropzone.options.dark = {
     paramName: "logo_dark",
     addRemoveLinks: true,
     transformFile: function(file, done) {
        var myDropZone = this;
        var editor = $('.editador1');
        var logoThumb = $('.logoThumb1');
        $(logoThumb).addClass('d-none');
        $(editor).removeClass('d-none');
        $(editor).addClass('d-block');
        // Create confirm button at the top left of the viewport
        var buttonConfirm = $('.buttonConfirm1');
        $(buttonConfirm).removeClass('d-none');
        $(buttonConfirm).addClass('d-block');
        $(buttonConfirm).click(function() {
          // Get the canvas with image data from Cropper.js
           var canvas = cropper.getCroppedCanvas({
             width: 720,
             height: 310
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



@foreach($order as $menu_item)
  @if($menu_item->display == 1)
    //Update Button
     $("#update{{$menu_item->id}}").click(function(e){
        e.preventDefault();

          var menu_name = $("#{{$menu_item->section}}").val();

          $.ajax({
                 type:'POST',
                 dataType: 'json',
                 url:'/menu-update/{{$menu_item->id}}',
                 data:{"_token": "{{ csrf_token() }}",
                 menu_name:menu_name
                },
                 success:function(data){
                    alert(data.success);
                 }
              });
          });
      //Visibility Button
      //Enable
      $("#enable{{$menu_item->id}}").click(function(e){
        e.preventDefault();
        var menu_display = 1;
        $('#{{$menu_item->section}}').removeAttr('disabled');
        $.ajax({
               type:'POST',
               dataType: 'json',
               url:'/menu-display/{{$menu_item->id}}',
               data:{"_token": "{{ csrf_token() }}",
               menu_display:menu_display
              },

            });
      });
      //Disable
      $("#disable{{$menu_item->id}}").click(function(e){
        e.preventDefault();
        var menu_display = 0;
        $('#{{$menu_item->section}}').attr('disabled', 'disabled');
        $.ajax({
               type:'POST',
               dataType: 'json',
               url:'/menu-display/{{$menu_item->id}}',
               data:{"_token": "{{ csrf_token() }}",
               menu_display:menu_display
              },

            });
      });

    @endif
  @endforeach


</script>
@endsection
