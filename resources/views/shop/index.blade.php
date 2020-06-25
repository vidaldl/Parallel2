@extends('layouts.app')
@section('css')
  <link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/btnswitch/jquery.btnswitch.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
  <link rel="stylesheet" href="{{asset('lib/cropper/cropper.css')}}">
  <style media="screen">
  .tgl-sw-swipe + .btn-switch {
    background: #36b9cc;
  }
  </style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tienda de Productos</h1>
  @if (Request::is('trashed-shop'))
    <a href="{{ route('shop.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Artículos<span></a>
</div>

  @else
    <a href="{{ route('shop.create')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-plus fa-sm "></i></span><span class="text"> &nbsp;Nuevo Artículo<span></a>

</div>
<div class="row">
  <!-- =============================== Line ================================= -->
  <div class="col-md-6">
    <!-- LINE/SPACE -->
    @foreach($orders as $item)
      @if($item->id == 14)
    <form method="POST" action="{{route('line.update', 14)}}">
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
        <div id="collapse3">
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

  <!-- =============================== /Line ================================= -->

  <!-- =============================== Informacion de la factura ================================= -->

  <div class="col-md-6">
    <div class="card mt-4 mb-4">
      <div class="card-header">
        <h6>Información de la factura:</h6>
      </div>
      <div class="card-body">
        <form class="" action="{{route('receipt.info.update')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="image" class="col-form-label">Logo en la Factura</label><br>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalImage">Principal &nbsp;&nbsp;<i class="fas fa-image"></i></a>
          </div>

          <div class="form-group">
            <label for="company_name">Nombre de la Compañía</label>
            <input id="company_name" type="input" name="company_name" value="{{$receipt_info->company_name}}" class="form-control @error('company_name') is-invalid @enderror">
            @error('company_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="address_line_1">Dirección línea #1</label>
            <input id="address_line_1" type="input" name="address_line_1" value="{{$receipt_info->address_line_1}}" class="form-control @error('address_line_1') is-invalid @enderror">
            @error('address_line_1')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="address_line_2">Dirección línea #2</label>
            <input id="address_line_2" type="input" name="address_line_2" value="{{$receipt_info->address_line_2}}" class="form-control @error('address_line_2') is-invalid @enderror">
            @error('address_line_2')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success">Actualizar</button>
          </div>

        </form>

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
                      <form id="image" method="POST" class="image dropzone" action="{{ route('receipt.info.update') }}" enctype="multipart/form-data">
                        @csrf
                      </form>
                      </div>
                    </div>
                    <div class="col-md-8">

                      <img style="width:100%;" src="{{'/storage/' . $receipt_info->image}}" class="logoThumb img-fluid img-thumbnail rounded">

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
      </div>

    </div>
  </div>


  <!-- =============================== /Informacion de la factura ================================= -->
</div>

<div class="card mb-5">
  <form method="POST" class="container" action="{{route('shop.section.update', 1)}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title" class="col-form-label">Titulo de la seccion</label>
      <input id="title" onchange="this.form.submit()" type="input" name="title" value="{{$shop_sections[0]->title}}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    </div>
    <div class="form-group mb-4">
      <label for="title_link" class="col-form-label">Enlace del titulo</label>
      <input id="title_link" onchange="this.form.submit()" type="input" name="title_link" value="{{$shop_sections[0]->title_link}}" class="form-control @error('title_link') is-invalid @enderror">
        @error('title_link')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    </div>
    <div class="form-group">
      <h5>Artículos del Catalogo:</h5><br>
      <div class="form-group">
        <label for="estilo">Estilo de mostrar Artículos</label>
        <div id="estilo"></div>
      </div>
      <div class="form-group col-md-6" id="rows">
        <label for="rows" class="col-form-label">Numero de Filas</label>
        <input id="rows" type="number" name="rows" value="{{$shop_sections[0]->rows}}" class="form-control @error('rows') is-invalid @enderror">
          @error('rows')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
      </div>
      <div class="form-group">
        <label for="estilo">Orientacion de las Imagenes</label>
        <div id="orientation"></div>
      </div>
      <div class="form-group">
        <label for="button_primary">Botón Desactivado</label><br>
        <input onchange="this.form.submit()" class="form-control" name="button_primary" type="text" id="button_primary" value="{{ $shop_sections[0]->button_primary }}">
      </div>
      <div class="form-group">
        <label for="button_secondary">Botón Activado</label><br>
        <input onchange="this.form.submit()" class="form-control" name="button_secondary" type="text" id="button_secondary" value="{{ $shop_sections[0]->button_secondary }}">
      </div>
      <div class="form-group">
        <label for="button_secondary">Color Letras del Botón</label><br>
        <input onchange="this.form.submit()" class="form-control" name="button_text_color" type="text" id="button_text_color" value="{{ $shop_sections[0]->button_text_color }}">
      </div>
    </div>
    <div class="form-group">
      <button class="btn btn-success float-right mb-3">Actualizar</button>
    </div>
  </form>
</div>
@endif
@if($shop_items->count() > 0)
<div class="card">
  <div class="card-body table-hover" >
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Titulo</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="table-striped">

          @foreach($shop_items as $item)
          <tr>
              <td>
                <img src="{{ '/storage/' . $item->img_primaria }}" width="120" alt="">
              </td>
              <td>
                <h4>{{ $item->title }}</h4>
              </td>
                <form method="POST" action="{{ route('shop.destroy', $item->id) }}">
                  @csrf
                  @method('DELETE')
              <td>
                  <span class="float-right">

                      <button  type="submit" class="btn btn-circle btn-danger float-right ml-3">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    @if($item->trashed())
                    <form class="float-right" action="{{ route('restore-shop', $item->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success btn-inverse" >
                        <i class="fas fa-trash-restore"></i>&nbsp; Restaurar
                      </button>
                    </form>
                    @else
                    <a href="{{ route('shop.edit', $item->id) }}" class="btn btn-success btn-inverse float-right" >
                      <i class="fas fa-edit"></i>&nbsp; Editar
                    </a>
                    @endif


                  </span>
                </h4>
              </td>

            @endforeach
          </tr>
        </tbody>

      </table>
      <div class="container-fluid">
        <div class="row">
          <a class="ml-auto btn btn-danger" href="{{route('trashed-shop.index')}}"><i class="fas fa-trash"></i>&nbsp;Papelera</a>
        </div>
      </div>
    </div>
  </div>
</div>

  @else
  <div class="card" style="min-height: 300px;">
    <div class="container mt-5">
      <h3 class="h3 text-center text-gray-800">Ahora mismo no hay articulos en la Papelera del catálogo</h3>
    </div>
  </div>


  @endif

</div>

@endsection

@section('script')
  <script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
  <script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
  <script type="text/javascript">

  @if($shop_sections[0]->style == 1)
    $('#rows').hide();
  @endif
  $('#estilo').btnSwitch({
    Theme:'Swipe',
    OnText: "Tabla",
    OffText: "Slider",
    OnValue: '1',
    OnCallback: function(val) {
      $('#rows').hide();

      $.ajax({
             type:'POST',
             dataType: 'json',
             url:'/shopSection/{{$shop_sections[0]->id}}',
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
      $('#rows').show();

      $.ajax({
             type:'POST',
             dataType: 'json',
             url:'/shopSection/{{$shop_sections[0]->id}}',
             data:{"_token": "{{ csrf_token() }}",
             val:val
            },
             success:function(data){
                alert(data.success);
             }
          });
    },
      @if($shop_sections[0]->style == 0)
        ToggleState: false
      @else
        ToggleState: true
      @endif
    });

    $('#orientation').btnSwitch({
      Theme:'Swipe',
      OnText: "Retrato",
      OffText: "Paisaje",
      OnValue: '1',
      OnCallback: function(val) {
        $.ajax({
               type:'POST',
               dataType: 'json',
               url:'/shopSection/{{$shop_sections[0]->id}}',
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
        $('#d-titulo').hide();
        $('#d-precio').hide();

        $.ajax({
               type:'POST',
               dataType: 'json',
               url:'/shopSection/{{$shop_sections[0]->id}}',
               data:{"_token": "{{ csrf_token() }}",
               val1:val
              },
               success:function(data){
                  alert(data.success);
               }
            });
      },
        @if($shop_sections[0]->img_orientation == 0)
          ToggleState: false
        @else
          ToggleState: true
        @endif
      });

    $('#button_primary').spectrum({
      preferredFormat: "hex",
     showInput: true,
    });
    $('#button_secondary').spectrum({
      preferredFormat: "hex",
     showInput: true,
    });

    $('#button_text_color').spectrum({
      preferredFormat: "hex",
     showInput: true,
    });
  </script>


  <script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
  <script src="{{asset('lib/cropper/cropper.js')}}"></script>
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
             width: 600,
             height: 300
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
       var cropper = new Cropper(image, { aspectRatio: 2/1 });
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
  </script>
@endsection
