@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('lib/dropzone/dropzone.css')}}">
<style media="screen">
.modal-dialog.modal-notify.modal-utxj .modal-header {
background-color: #149c7e; }

.modal-dialog.modal-notify.modal-utxj .fas, .modal-dialog.modal-notify.modal-utxj .fab, .modal-dialog.modal-notify.modal-utxj .far {
color: #149c7e; }

.modal-dialog.modal-notify.modal-utxj .badge {
background-color: #149c7e; }

.modal-dialog.modal-notify.modal-utxj .btn .fas, .modal-dialog.modal-notify.modal-utxj .btn .fab, .modal-dialog.modal-notify.modal-utxj .btn .far {
color: #fff; }

.modal-dialog.modal-notify.modal-utxj .btn.btn-outline-utxj .fas, .modal-dialog.modal-notify.modal-utxj .btn.btn-outline-utxj .fab, .modal-dialog.modal-notify.modal-utxj .btn.btn-outline-utxj .far {
color: #149c7e; }

.menu {
  padding: 0;
  list-style: none;
  width: 250px;
  font-size: 18px;
  background: #c1c1c1;
  border: 1px solid rgba(0, 0, 0, 0.8);
}

.menu li ul{
  width: 243px;
}

.menu li a {
  display: block;
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
  border-top: 1px solid rgba(255, 255, 255, 0.2);
  background: #3e3f44;
  text-decoration: none;
  color: #fff;
  text-shadow: 1px 0px 1px rgba(0, 0, 0, 0.2);
  filter: dropshadow(color=#000, offx=1, offy=0);
  padding: 10px;
  padding-left: 20px;
}

.menu li ul li a {
  font-size: 14px;
  width: 243px;
  color: #fff;
  text-shadow: 1px 0px 1px rgba(255, 255, 255, 0.5);
}

.menu li a:hover {
  background: #149c7e;
  -moz-transition: background 0.3s ease-in;
  -webkit-transition: background 0.3s ease-in;
  -o-transition: background 0.3s ease-in;
}

.menu ul {
  margin: 0;
  padding: 0;
  list-style: none;
  height: 0;
  overflow: hidden;
  transition: 0.3s;
  -moz-transition: 0.3s;
  -webkit-transition: 0.3s;
}

.menu li:hover ul {
  height: 170px;
  width: 243px;
  overflow-y: auto;
  overflow-x: hidden;
}



.menu ul li a {
  background: #333;
}

.menu ul li a:hover {
  background: #024d3c repeat scroll 0 0;
  color: #fff;
  -moz-transition: color 0.4s ease;
  -webkit-transition: color 0.4s ease;
  -o-transition: color 0.4s ease;
}
</style>
@endsection

@section('content')
  <h1>Archivos Subidos</h1>
  <div class="row">
    <div class="container">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <label for="file" class="col-form-label">Archivos</label>
            <form id="my-dropzone" method="POST" class="dropzone" action="{{route('files.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="dz-message">
                  Haz Click o Arrastra los archivos aquí(max 5).
              </div>
              <div class="dropzone-previews"></div>

            </form>
            <button type="submit" class="btn btn-success mt-5" id="submit">Guardar</button>
          </div>
          <div class="card-body">
            <div class="row">
              @foreach($files as $file)
                <div class="col-md-3">
                    <div class="row">
                      <button type="button" class="btn btn-small btn-danger ml-auto" data-toggle="modal" data-target="#delete-file{{$file->id}}"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="row justify-content-center">
                      <img style="height: 75px;" class="img-fluid" src="/img/file.png" alt="">
                    </div>
                    <div class="row justify-content-center text-center">
                      <a data-toggle="modal" href="#" data-target="#fileModal{{$file->id}}" target="_blank" id="tru{{$file->id}}">{{$file->display_name}}</a>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




@foreach($files as $file)
<!-- FileMODAL -->
<div class="modal fade" id="fileModal{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog mw-100 w-75 modal-fluid modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">{{$file->display_name}}</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        @if (pathinfo($file->display_name, PATHINFO_EXTENSION) == 'pdf')
        <embed src="{{'storage/' . $file->file}}" frameborder="0" width="100%" height="600px">
        @else
        <div class="row">
          <img class="img-fluid mx-auto" height="600px" src="{{'storage/' . $file->file}}" alt="">
        </div>
        @endif
        <!-- <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="https://www.antennahouse.com/XSLsample/pdf/sample-link_1.pdf"></object> -->
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a target="_blank" type="button" href="{{'storage/' . $file->file}}" class="btn btn-info text-white">Download <i class="far fa-file-pdf ml-1 text-white"></i></a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

<!--DELETE Modal -->
<div class="modal fade" id="delete-file{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteFile" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Estás Seguro que quieres Eliminar {{$file->display_name}}?
      </div>
      <div class="modal-footer">
        <form action="{{route('files.delete', $file->id)}}" method="post">
          @csrf
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger">Eliminar <span class="fas fa-trash"></span></button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>


@endsection
@section('script')
<script src="{{asset('lib/dropzone/dropzone.js')}}"></script>
<script>
var truncate = function (fullStr, strLen, separator) {
    if (fullStr.length <= strLen) return fullStr;

    separator = separator || '...';

    var sepLen = separator.length,
        charsToShow = strLen - sepLen,
        frontChars = Math.ceil(charsToShow/2),
        backChars = Math.floor(charsToShow/1.5);

    return fullStr.substr(0, frontChars) +
           separator +
           fullStr.substr(fullStr.length - backChars);
};
@foreach($files as $file)
  var tStr{{$file->id}} = document.getElementById('tru{{$file->id}}').innerHTML;
  document.getElementById('tru{{$file->id}}').innerHTML = truncate(tStr{{$file->id}}, 15);
@endforeach



Dropzone.options.myDropzone = {
  autoProcessQueue: false,
  uploadMultiple: true,
  maxFilezise: 512,
  maxFiles: 5,

  init: function() {
      var submitBtn = document.querySelector("#submit");
      myDropzone = this;

      submitBtn.addEventListener("click", function(e){
          e.preventDefault();
          e.stopPropagation();
          myDropzone.processQueue();
      });
      this.on("addedfile", function(file) {
      });

      this.on("complete", function(file) {
        setTimeout(
          function()
          {
            location.reload();
          }, 1500);
      });

      this.on("success",
          myDropzone.processQueue.bind(myDropzone)
      );
  }
};
</script>
@endsection
