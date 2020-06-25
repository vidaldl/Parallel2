
@extends('layouts.app')
@section('css')
  @include('bladeStyles.fonts')
  <link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/ui/trumbowyg.min.css')}}">
  <link rel="stylesheet" href="{{asset('lib/trumbowyg/dist/plugins/colors/ui/trumbowyg.colors.min.css')}}">
  <link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Editar Modal del Inicio</h1>
  <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Secciones<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"></div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">
          <form class="form-group" action="{{route('modal.update', 1)}}" method="post">
            @csrf
              <div class="form-group d-none d-sm-block d-md-block d-lg-none">
              </div>
              <div class="form-group">
                <label for="content_style">Estilo</label>
                <select onchange="this.form.submit()" class="" name="content_style">
                @if($modal[0]->content_style == 0)
                  <option value="0" selected>Contenido</option>
                  <option value="1">Imagen</option>
                @elseif($modal[0]->content_style == 1)
                  <option value="0">Contenido</option>
                  <option value="1" selected>Imagen</option>
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="width">Ancho del Modal</label>
                <select onchange="this.form.submit()" name="width">
                  @foreach($modal as $item)
                    <option value="1" {{$item->width == 1 ? 'selected' : ''}}>8%</option>
                    <option value="2" {{$item->width == 2 ? 'selected' : ''}}>17%</option>
                    <option value="3" {{$item->width == 3 ? 'selected' : ''}}>25%</option>
                    <option value="4" {{$item->width == 4 ? 'selected' : ''}}>33%</option>
                    <option value="5" {{$item->width == 5 ? 'selected' : ''}}>41%</option>
                    <option value="6" {{$item->width == 6 ? 'selected' : ''}}>50%</option>
                    <option value="7" {{$item->width == 7 ? 'selected' : ''}}>58%</option>
                    <option value="8" {{$item->width == 8 ? 'selected' : ''}}>65%</option>
                    <option value="9" {{$item->width == 9 ? 'selected' : ''}}>75%</option>
                    <option value="10" {{$item->width == 10 ? 'selected' : ''}}>83%</option>
                    <option value="11" {{$item->width == 11 ? 'selected' : ''}}>91%</option>
                    <option value="12" {{$item->width == 12 ? 'selected' : ''}}>100%</option>
                  @endforeach
                </select>
              </div>
          </form>
          <form class="form-group" action="{{route('modal.update', 1)}}" method="post">
            @csrf
              @if($modal[0]->content_style == 1)
              <div class="form-group">
                <label for="image" class="col-form-label">Imagen</label><br>
                <div class="form-row">
                  <a href="#" class="btn btn-primary"  data-toggle="modal" data-target="#modalScreenshot">Imagen de la Descripción &nbsp;&nbsp;<i class="fas fa-image"></i></a>
                  <a href="#" class="btn btn-warning ml-3"  data-toggle="modal" data-target="#deleteImg"><i class="fas fa-trash"></i></a>
                </div>
              </div>

              @elseif($modal[0]->content_style == 0)
              <div class="form-group col-md-4">
                <label for="back_color">Color de Fondo:</label><br>
                <input onchange="this.form.submit()" class="form-control" name="back_color" type="text" id="back_color" value="{{ $modal[0]->back_color }}">
              </div>
              <div class="form-group">
                <label for="image" class="col-form-label">Imagen</label><br>
                <div class="form-row">
                  <a href="#" class="btn btn-primary"  data-toggle="modal" data-target="#modalScreenshot">Imagen de la Descripción &nbsp;&nbsp;<i class="fas fa-image"></i></a>
                  <a href="#" class="btn btn-warning ml-3"  data-toggle="modal" data-target="#deleteImg"><i class="fas fa-trash"></i></a>
                </div>

              </div>
              <div class="form-group">
                <label for="contenido" class="col-form-label">Contenido</label>
                <textarea id="contenido" type="input" name="contenido" class="form-control @error('contenido') is-invalid @enderror">{{ $modal[0]->contenido }}</textarea>
                  @error('contenido')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="button" class="col-form-label">Boton Título</label>
                <input id="button" type="input" name="button" class="form-control @error('button') is-invalid @enderror"  value="{{ $modal[0]->button }}">
                  @error('button')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="button_sub" class="col-form-label">Boton Subtitulo</label>
                <input id="button_sub" type="input" name="button_sub" class="form-control @error('button_sub') is-invalid @enderror"  value="{{ $modal[0]->button_sub }}">
                  @error('button_sub')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <label for="link" class="col-form-label">Boton Enlace</label>
                <input placeholder="Dejar Vacio Para Cierre de Modal" id="link" type="input" name="link" class="form-control @error('link') is-invalid @enderror"  value="{{ $modal[0]->link }}">
                  @error('link')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="back_color">Color de Boton Activado:</label><br>
                <input onchange="this.form.submit()" class="form-control" name="button_color_sec" type="text" id="button_color_sec" value="{{ $modal[0]->button_color_sec }}">
              </div>
              <div class="form-group col-md-4">
                <label for="back_color">Color del Texto del Boton:</label><br>
                <input onchange="this.form.submit()" class="form-control" name="color" type="text" id="color" value="{{ $modal[0]->color }}">
              </div>

              @endif
              <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>

        </div>
    </div>
  </div>
</div>
<!-- IMAGE -->
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
              <label for="image" class="col-form-label">Imagen de la Descripción</label>
              <form id="screenshot" method="POST" class="image dropzone" action="{{route('modal.update', 1)}}" enctype="multipart/form-data">
                @csrf
              </form>
              <label class="col-form-label">Tamaños de la Imagen:</label>
              <p>Resolución: 1920x1080</p>
              <p>Aspect Ratio: Libre</p>
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="col-md-8">

              <img style="width:100%;" src="{{'/storage/' . $modal[0]->image}}" class="logoThumb1 img-fluid img-thumbnail rounded">

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
<!-- /IMAGE -->
<!-- DELETE IMAGE -->
<div class="modal fade" id="deleteImg" tabindex="-1" role="dialog" aria-labelledby="modalScreenshot" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4066D4;">
      <button style="color:white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
          <div class="row justify-content-center">
              <div class="form-group">
              <label for="image" class="col-form-label">Eliminar Imagen de la Descripción?</label>
              <form id="screenshot" method="POST" class="" action="{{route('modal.deleteImg', 1)}}" enctype="multipart/form-data">
                @csrf
                <button class="btn btn-secondary" type="button">Cancelar</button>
                <button class="btn btn-danger" type="submit">Eliminar</button>
              </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- /DELETE IMAGE -->
@endsection
@section('script')
<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script src="{{asset('lib/cropper/cropper.js')}}"></script>
<script type="text/javascript">
Dropzone.options.screenshot = {
  paramName: "image",

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
</script>

<script src="{{asset('lib/trumbowyg/dist/trumbowyg.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontsize/trumbowyg.fontsize.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/colors/trumbowyg.colors.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/noembed/trumbowyg.noembed.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/pasteimage/trumbowyg.pasteimage.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/base64/trumbowyg.base64.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js')}}"></script>
<script src="{{asset('lib/trumbowyg/dist/plugins/allowtagsfrompaste/trumbowyg.allowtagsfrompaste.min.js')}}"></script>
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
  <script type="text/javascript">
  $('#contenido').trumbowyg({
    btns: [
      ['viewHTML'],
      ['fontfamily'],
      ['fontsize'],
      ['foreColor', 'backColor'],
      ['strong', 'em', 'del'],
      ['link'],
      ['base64'],
      ['noembed'],
      ['insertAudio'],
      ['image'],
      ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
      ['unorderedList', 'orderedList'],
      ['horizontalRule'],
      ['removeformat'],
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

  $('#button_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });

  $('#button_color_sec').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });

  $('#color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });

  $('#back_color').spectrum({
    preferredFormat: "rgb",
    showAlpha: true,
    showInput: true,
  });

  $('#footer_color').spectrum({
    preferredFormat: "hex",
   showInput: true,
  });
  </script>
@endsection
