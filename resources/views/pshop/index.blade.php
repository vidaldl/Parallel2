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
  <h1 class="h3 mb-0 text-gray-800">Pshop Settings</h1>
</div>
<div class="row">


  <!-- =============================== Informacion de la factura ================================= -->

  <div class="col-md-12">
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

@if($receipts->count() > 0)
<div class="card">
  <div class="card-body table-hover" >
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Factura #</th>
            <th scope="col">Cliente</th>
            <th scope="col">Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="table-striped">

          @foreach($receipts as $item)
          <tr>
              <td>
                <h4>
                  {{$item->receipt_number}}
                </h4>
              </td>
              <td>
                <h4>{{ $item->client_name }}</h4>
              </td>
              <td>
                <h4>${{$item->total}}</h4>
              </td>
              <td>
                  <span class="float-right">

                    <a target="_blank" href="{{ route('receipt.pdf', $item->id) }}" class="btn btn-success btn-inverse float-right" >
                      <i class="fas fa-receipt"></i>&nbsp; Ver
                    </a>

                  </span>
                </h4>
              </td>

            @endforeach
          </tr>
        </tbody>

      </table>

    </div>
  </div>
</div>

  @else
  <div class="card" style="min-height: 300px;">
    <div class="container mt-5">
      <h3 class="h3 text-center text-gray-800">Ahora mismo no hay Recibos</h3>
    </div>
  </div>


  @endif







<!-- NECESSARY EVIL -->
</div>


@endsection

@section('script')
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
