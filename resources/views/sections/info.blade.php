<!--
<section class="cta" id="info" style="{{ $contenidosection2s[0]->display == '0' ? 'color: black;background-color: #FFFFFF;' : '' }}">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-sm-12 text-lg-left text-center">
        <h2 class="mb-3">
            {{$contenidosection3s[0]->title}}
          </h2>
      <div class="contenidoStyle">

          {!! $contenidosection3s[0]->contenido !!}

      </div>
      </div>

      <div id="articuloss" class="col-lg-3 col-sm-12 text-lg-right text-center align-self-center">
        <a class="btn {{ $contenidosection2s[0]->display == '0' ? 'btn-full' : 'btn-ghost' }}" href="/about">{{$contenidosection3s[0]->button}}&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></a>
      </div>
    </div>
  </div>
</section> -->
<div id="info" class=""></div>

<div class="container clearfix">
  <div class="promo promo-dark promo-flat " style="background-color: {{$contenidosection3s[0]->background_color}}">
  	<div class="container row" style="padding: 25px 5px;">
      <div class="col-md-7 my-auto">
        <h3 class="t400 ls1 ml-4" style="color: {{$contenidosection3s[0]->text_color}}">{{$contenidosection3s[0]->title}}</h3>
        <div class="dark ml-4" style="color: {{$contenidosection3s[0]->text_color}}">{!! $contenidosection3s[0]->contenido !!}</div>
      </div>
    	<div class="col-md-5 my-auto">
        @if($contenidosection3s[0]->link_type == 0)
        <a target="_blank" href="{{$contenidosection3s[0]->link}}" style="color: {{$contenidosection3s[0]->text_color}}" class="button col-md-12 mx-auto button-dark button-large button-rounded text-center">{{$contenidosection3s[0]->button}}</a>

        @elseif($contenidosection3s[0]->link_type == 1)
        <a data-toggle="modal" href="#" data-target="#fileModalInfo" style="color: {{$contenidosection3s[0]->text_color}}" class="button col-md-12 mx-auto button-dark button-large button-rounded text-center">{{$contenidosection3s[0]->button}}</a>
        @endif
      </div>
    </div>
  </div>
</div>

@foreach($files as $file)
@if($contenidosection3s[0]->link == 'storage/' . $file->file)
<!-- FileMODAL -->
<div class="modal fade" id="fileModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
        <!-- <object class="PDFdoc" width="100%" type="application/pdf" data="{{'storage/' . $file->file}}"></object> -->

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
@endif
@endforeach
