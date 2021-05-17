@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/ui/trumbowyg.min.css')}}">
<link href="{{ asset('lib/btnswitch/jquery.btnswitch.css') }}" rel="stylesheet">
<style>
.note-editable { background-color: #3742FA!important; color: white; }
.tgl-sw-swipe + .btn-switch {
  background: #4e73df;
}
.modal-dialog{
  position: relative;
  display: table;
  overflow-y: auto;
  overflow-x: auto;
  width: auto;
  min-width: 600px;
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
  text-decoration: none;
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
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{isset($portfolioItem) ? 'Portfolio: Editar Artículo' : 'Portfolio: Añadir Artículo'}}</h1>
  <a href="{{route('portfolioItems.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Portfolio: Artículos<span></a>
</div>
  <div class="row justify-content-center">
    <!-- <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"><iframe class="" src="/#links"  width="100%" height="450"></iframe></div> -->
    <div class="card mt-3 col-md-8 mb-5">
      <div class="card-body">

        <div class="row justify-content-center">
          <div class="tabs col-md-8" >
            <ul class="tabs-navigation horizontal">
              <li class="li"><a class="a" href="#portada">Portada</a></li>
              <li class="li"><a class="a" href="#detalles">Detalles</a></li>
            </ul>
          <!--Portada-->
            <div id="portada" class="tabdiv">
              <div class="col-md-12">
                <div class="container">
                  @if(isset($portfolioItem))
                  <div class="form-group">
                    <label for="title" class="col-form-label">Titulo</label>
                    <input id="title" type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{$portfolioItem->title}}">
                      @error('title')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  @else
                  <form method="POST" id="formulario" action="{{route('portfolioItems.store')}}" enctype="multipart/form-data">
                    @csrf
                      <!-- <div class="form-group d-none d-sm-block d-md-block d-lg-none">
                        <img class="img-fluid px-3 px-sm-4" src="{{asset('img/sections/infoSlider.png')}}">
                      </div> -->
                      <div class="form-group">
                        <label for="title" class="col-form-label">Titulo</label>
                        <input id="title" onchange="this.form.submit()" type="input" name="title" class="form-control @error('title') is-invalid @enderror">
                          @error('title')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                  </form>
                  @endif

                  <div class="form-group">
                    <label for="subtitle" class="col-form-label">Subtitulo</label>
                    <input {{isset($portfolioItem) ? '' : 'disabled'}} id="subtitle" type="input" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror"  value="{{isset($portfolioItem) ? $portfolioItem->subtitle : ''}}">
                      @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>

                  @if($portfolioCategories->count() > 0)
                  <div class="form-group">
                    <label for="categories" class="col-form-label">Categorías</label>

                      <select {{isset($portfolioItem) ? '' : 'disabled'}} multiple id="categories" type="select" name="categories[]" class="form-control select @error('categories') is-invalid @enderror">
                      @if(isset($portfolioItem))
                        @foreach($portfolioCategories as $cat)
                          <option value="{{$cat->id}}"
                            @if(in_array($cat->id, $portfolioItem->portfolio_category->pluck('id')->toArray()))
                              selected
                            @endif
                            >
                            {{$cat->name}}
                          </option>
                        @endforeach
                      @endif
                      </select>

                      @error('categories')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  @endif

                  <div class="form-group">
                    <label for="image" class="col-form-label">Logo</label><br>
                    <a href="#" class="btn btn-primary {{isset($portfolioItem) ? '' : 'disabled'}}"  data-toggle="modal" data-target="#modalImage">Imagen &nbsp;&nbsp;<i class="fas fa-image"></i></a>
                  </div>
                  <div class="form-group">
                    <label for="media_type">Acción del Logo</label>
                    <div id="logo_link"></div>
                  </div>
                  <div class="form-group enlace">

                    <label for="media_type">Acción del Boton</label>
                    <div id="media_type"></div>

                    <div class="form-row mb-4">
                      <div class="col-md-6" id="type_link">
                        <label for="link_address" class="col-form-label">Enlace</label>
                        <input id="link_address" type="input" placeholder="Https://" name="link_address" class="form-control flexdatalist @error('link_address') is-invalid @enderror"  value="{{isset($portfolioItem) ? $portfolioItem->logo_link_address : ''}}">
                      </div>
                      <div class="col-md-6" id="type_file">
                        <label class="col-form-label">Seleccionar Archivo:</label><br>
                        <select name="file" id="file">
                          <option value="">--Seleccionar Archivo--</option>
                          @foreach($files as $file)
                          @if(isset($portfolioItem))
                            @if($portfolioItem->logo_link_address == 'storage/' . $file->file)
                              <option value="{{'storage/' . $file->file}}" selected>{{$file->display_name}}</option>
                            @elseif($portfolioItem->logo_link_address != 'storage/' . $file->file)
                              <option value="{{'storage/' . $file->file}}">{{$file->display_name}}</option>
                            @endif
                           @endif
                          @endforeach
                        </select>
                      </div>
                    </div>

                  </div>
                  <div class="form-group">
                    <button class="ajButton btn btn-success float-right">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>



          <!--Detalles-->
            <div id="detalles" class="tabdiv {{isset($portfolioItem) ? '' : 'disabled'}}">
              <div class="form-group">
                <label for="image" class="col-form-label">Screenshot</label><br>
                <a href="#" class="btn btn-primary {{isset($portfolioItem) ? '' : 'disabled'}}"  data-toggle="modal" data-target="#modalScreenshot">Imagen Destacada &nbsp;&nbsp;<i class="fas fa-image"></i></a>
              </div>

              <div class="form-group">
                <label for="contenido" class="col-form-label">Contenido</label>
                <textarea  id="contenido" name="contenido" class="form-control @error('contenido') is-invalid @enderror" >{{isset($portfolioItem) ? $portfolioItem->contenido : ''}}</textarea>
                  @error('contenido')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="author" class="col-form-label">Autor</label>
                <input {{isset($portfolioItem) ? '' : 'disabled'}} id="author" type="input" name="author" class="form-control @error('author') is-invalid @enderror"  value="{{isset($portfolioItem) ? $portfolioItem->author : ''}}">
                  @error('author')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="author_bio" class="col-form-label">Bio del Autor</label>
                <input {{isset($portfolioItem) ? '' : 'disabled'}} id="author_bio" type="input" name="author_bio" class="form-control @error('author_bio') is-invalid @enderror"  value="{{isset($portfolioItem) ? $portfolioItem->author_bio : ''}}">
                  @error('author_bio')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="link_title" class="col-form-label">Título sobre el Link</label>
                <input {{isset($portfolioItem) ? '' : 'disabled'}} id="link_title" type="input" name="link_title" class="form-control @error('link_title') is-invalid @enderror"  value="{{isset($portfolioItem) ? $portfolioItem->link_title : ''}}">
                  @error('link_title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="button_text" class="col-form-label">Título del Botón</label>
                <input {{isset($portfolioItem) ? '' : 'disabled'}} id="button_text" type="input" name="button_text" class="form-control @error('button_text') is-invalid @enderror"  value="{{isset($portfolioItem) ? $portfolioItem->button_text : ''}}">
                  @error('button_text')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              @if(isset($portfolioItem))
              <!-- ICONOS1 -->
                <div class="form-group">
                  <label for="button_icon">Seleccine Ícono</label>
                  <div class="input-group">
                    <input id="button_icon" type="hidden" data-placement="bottomRight" class="form-control @error('button_icon') is-invalid @enderror"  name="button_icon" value="{{isset($portfolioItem) ? $portfolioItem->button_icon : ''}}">
                    <div class="btn-group {{isset($portfolioItem) ? '' : 'disabled'}}">
                     <button type="button" class="btn btn-primary iconpicker-component"><i
                             class="{{ isset($portfolioItem) ? $portfolioItem->button_icon : '' }}"></i></button>
                     <button type="button" class="icp1 icp-dd1 btn btn-primary dropdown-toggle"
                             data-selected="fa-car" data-toggle="dropdown">
                         <span class="caret"></span>
                     </button>
                     <div class="dropdown-menu"></div>
                   </div>
                  </div>
                </div>
              <!-- /ICONOS1 -->
            <div class="form-group">
              <label for="button_text" class="col-form-label">Link del Botón</label>
              <input {{isset($portfolioItem) ? '' : 'disabled'}} id="link" type="input" name="link" class="form-control @error('link') is-invalid @enderror"  value="{{isset($portfolioItem) ? $portfolioItem->link : ''}}">
                @error('link')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            @endif
            <div class="form-group">
              <button class="ajButton btn btn-success float-right">Actualizar</button>
            </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@if(isset($portfolioItem))
<!--modal Screenshot-->
<div class="modal fade" id="modalScreenshot" tabindex="-1" role="dialog" aria-labelledby="modalScreenshot" aria-hidden="true">
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
              <label for="image" class="col-form-label">Screenshot</label>
              <form id="screenshot" method="POST" class="image dropzone" action="{{route('portfolioItems.update', $portfolioItem->id)}}" enctype="multipart/form-data">
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
              @if(isset($portfolioItem))
              <img style="width:100%;" src="{{'/storage/' . $portfolioItem->screenshot}}" class="logoThumb1 img-fluid img-thumbnail rounded">
              @endif
              <div class="editador1 d-none" style="width:450px; height: 600px; background-color: #000;">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer ">
        <button class="buttonConfirm1 btn btn-primary d-none">Confirmar</button>
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
              <form id="logo" method="POST" class="image dropzone" action="{{route('portfolioItems.update', $portfolioItem->id)}}" enctype="multipart/form-data">
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
              @if(isset($portfolioItem))
              <img style="width:100%;" src="{{'/storage/' . $portfolioItem->logo}}" class="logoThumb img-fluid img-thumbnail rounded">
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
@endif
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="{{asset('lib/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
@if(isset($portfolioItem))
<script>

  $('#logo_link').btnSwitch({
  Theme:'Swipe',
  OnText: "Detail",
  OffText: "Link",
  OnValue: '0',
  OnCallback: function(val) {
    $('.enlace').hide();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'/portfolioItem/{{$portfolioItem->id}}',
           data:{"_token": "{{ csrf_token() }}",
           logoLink:val
          },
           success:function(data){
              alert(data.success);
           }
        });
    },
  OffValue: '1',
  OffCallback: function (val) {
    $('.enlace').show();
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'/portfolioItem/{{$portfolioItem->id}}',
           data:{"_token": "{{ csrf_token() }}",
           logoLink:val
          },
           success:function(data){
              alert(data.success);
           }
        });
  },
  @if($portfolioItem->logo_link == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
  });



//logo_link_type ==============================================
  $('#media_type').btnSwitch({
  Theme:'Swipe',
  OnText: "Link",
  OffText: "File",
  OnValue: '0',
  OnCallback: function(val) {
    $('#type_file').hide();
    $('#type_link').show();

    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'/portfolioItem/{{$portfolioItem->id}}',
           data:{"_token": "{{ csrf_token() }}",
           logoLinkType:val
          },
           success:function(data){
              alert(data.success);
           }
        });
    },
  OffValue: '1',
  OffCallback: function (val) {
    $('#type_link').hide();
    $('#type_file').show();

    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'/portfolioItem/{{$portfolioItem->id}}',
           data:{"_token": "{{ csrf_token() }}",
           logoLinkType:val
          },
           success:function(data){
              alert(data.success);
           }
        });
  },
  @if($portfolioItem->logo_link_type == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
  });

$(document).ready(function() {
  @if($portfolioItem->logo_link == 0)
    $('.enlace').hide();
  @endif
  @if($portfolioItem->logo_link_type == 1)
  $('#type_link').hide();
  @else
  $('#type_file').hide();
  @endif

  $('.select').select2();

  $('.icp-dd1').iconpicker();
  $('.icp1').on('iconpickerSelected', function (e) {
  $('#button_icon').get(0).value = e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
});
});
</script>
@endif

<script>
//Portada
 // $("#ajButton").click(function(e){
 //    e.preventDefault();
 //
 //    var title = $("#title").val();
 //    var subtitle = $("#subtitle").val();
 //    var categories = $("#categories").val();
 //
 //    $.ajax({
 //           type:'POST',
 //           dataType: 'json',
 //           url:'/portfolioItem/{{isset($portfolioItem) ? "$portfolioItem->id" : ''}}',
 //           data:{"_token": "{{ csrf_token() }}",
 //            title:title,
 //            subtitle:subtitle,
 //            categories:categories
 //          },
 //           success:function(data){
 //              alert(data.success);
 //           }
 //        });
 //      });

//Detalle
$(".ajButton").click(function(e){
   e.preventDefault();
   var title = $("#title").val();
   var subtitle = $("#subtitle").val();
   var categories = $("#categories").val();
   var contenido = $("#contenido").val();
   var author = $("#author").val();
   var author_bio = $("#author_bio").val();
   var link_title = $("#link_title").val();
   var button_text = $("#button_text").val();
   var button_icon = $("#button_icon").val();
   var link = $("#link").val();
   var link_address = $('#link_address').val();
   var file = $('#file').val();

   $.ajax({
          type:'POST',
          dataType: 'json',
          url:'/portfolioItem/{{isset($portfolioItem) ? "$portfolioItem->id" : ''}}',
          data:{"_token": "{{ csrf_token() }}",
          title:title,
          subtitle:subtitle,
          categories:categories,
          contenido:contenido,
          author:author,
          author_bio:author_bio,
          link_title:link_title,
          button_text:button_text,
          button_icon:button_icon,
          link:link,
          link_address:link_address,
          file:file
         },
          success:function(data){
             alert(data.success);
          }
       });
     });
</script>

<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>

<script>
// <!--Logo-->
    Dropzone.options.logo = {
      paramName: "logo",

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

// <!--Screenshot-->
    Dropzone.options.screenshot = {
      paramName: "screenshot",

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
               width: 1920,
               height: 1080
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
      }
    };
</script>
<script src="{{ asset('lib/tabslet/jquery.tabslet.js') }}"></script>
<script src="{{asset('lib/trumbowyg/dist/trumbowyg.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/noembed/trumbowyg.noembed.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js')}}"></script>
<script>


  $('.tabs').tabslet();
  $('#contenido').trumbowyg({
    btns: [
        ['viewHTML'],
        ['fontsize'],
        ['fontfamily'],
        ['insertImage'],
        ['noembed'],
        ['formatting'],
        ['strong', 'em', 'del'],
        ['link'],
        ['insertAudio'],
        ['image'],
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ]
  });
</script>
@endsection
