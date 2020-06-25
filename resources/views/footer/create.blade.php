@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('lib/iconpicker/css/fontawesome-iconpicker.css')}}">
<link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
<style>
.modal-dialog{
  position: relative;
  display: table;
  overflow-y: auto;
  overflow-x: auto;
  width: auto;
  min-width: 600px;
}
</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{isset($footer_links) ? 'Editar Enlace' : 'Añadir Enlace'}}</h1>
  <a href="{{route('footer.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Enlaces<span></a>
</div>
  <div class="row justify-content-center">
    <div class="col-md-12 d-none d-sm-none d-md-none d-lg-block"></div>
    <div class="card mt-3 col-md-8 mb-5">
        <div class="card-body">

          <form method="POST" id="formulario" action="{{ isset($footer_links) ? route('footer.update', $footer_links->id) : route('footer.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="icon" class="col-form-label">Ícono</label>
              <div class="input-group">
                <input id="icon" type="text" data-placement="bottomRight" class="form-control @error('icon') is-invalid @enderror"  name="icon" value="{{isset($footer_links) ? $footer_links->icon : 'icon-facebook'}}">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#iconModal"><i class="fas fa-info"></i>&nbsp;Iconos</button>
                <!-- <div class="btn-group">
                   <button type="button" class="btn btn-primary iconpicker-component"><i class="{{ isset($footer_links) ? $footer_links->icon : 'fab fa-facebook-f' }}"></i></button>
                   <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                           data-selected="fa-car" data-toggle="dropdown">
                       <span class="caret"></span>
                       <span class="sr-only">Toggle Dropdown</span>
                   </button>
                   <div class="dropdown-menu"></div>
               </div> -->

              </div>
            </div>

              <div class="form-group">
                <label for="link" class="col-form-label">Enlace</label>
                <input id="link" type="input" name="link" class="form-control @error('button') is-invalid @enderror"  placeholder="Http://" value="{{isset($footer_links) ? $footer_links->link : ''}}">
                <small class="form-text text-muted">Asegurece de que el Link Contiene &nbsp;HTTP:// &nbsp;Antes de la Dirección</small>
                  @error('link')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="button_primary">Color del Ícono</label><br>
                <input class="form-control" name="color" type="text" id="color" value="{{isset($footer_links) ? $footer_links->color : '#f7f7f7'}}">
              </div>
              <div class="form-group col-md-4">
                <label for="button_primary">Color de Fondo</label><br>
                <input class="form-control" name="back_color" type="text" id="back_color" value="{{isset($footer_links) ? $footer_links->back_color : '#3b5998'}}">
              </div>

              <div class="form-group">
                <button type="submit" id="mandar" class="btn btn-success float-right">Actualizar</button>
              </div>
          </form>

        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="Modal Icon" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Elegir Icono</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('icon')
      </div>
    </div>
  </div>
</div>

<!-- End modal image -->
@endsection
@section('script')
<script src="{{ asset('lib/spectrum/spectrum.js') }}"></script>
<script>
  $('#color').spectrum({
    preferredFormat: "hex",
   showInput: true
  });
  $('#back_color').spectrum({
    preferredFormat: "hex",
   showInput: true
  });
</script>
<script src="{{asset('lib/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
<script>
$(document).ready(function () {
//   $('.icp-dd').iconpicker();
// });
// $('.icp').on('iconpickerSelected', function (e) {
//     $('#icon').get(0).value = e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
//   });
</script>
<script>
		// jQuery Typing
		(function(f){function l(g,h){function d(a){if(!e){e=true;c.start&&c.start(a,b)}}function i(a,j){if(e){clearTimeout(k);k=setTimeout(function(){e=false;c.stop&&c.stop(a,b)},j>=0?j:c.delay)}}var c=f.extend({start:null,stop:null,delay:400},h),b=f(g),e=false,k;b.keypress(d);b.keydown(function(a){if(a.keyCode===8||a.keyCode===46)d(a)});b.keyup(i);b.blur(function(a){i(a,0)})}f.fn.typing=function(g){return this.each(function(h,d){l(d,g)})}})(jQuery);

		jQuery(document).ready( function($){

			$('#icons-filter').typing({
				stop: function (event, $elem) {
					var filterValue = $elem.val(),
						count = 0;

					if( $elem.val() ) {

						$(".icons-list li").each(function(){
							if ($(this).text().search(new RegExp(filterValue, "i")) < 0) {
								$(this).fadeOut();
							} else {
								$(this).show();
								count++
							}
						});
					} else {
						$(".icons-list li").show();
					}

					count = 0;
				},
				delay: 500
			});

		});
	</script>
@endsection
