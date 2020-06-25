@extends('layouts.app')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('lib/spectrum/spectrum.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/tabslet/jquery.tabslet.css') }}" rel="stylesheet">
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
@endsection
@section('content')
<div class="d-sm-flex align-items-center  mb-4" >
<form autocomplete="off" class="col-md-12" method="POST" action="{{route('style.update', $styles[0]->id)}}">
  @csrf
 <h1 class="h3 mb-3 text-gray-800">Manejador</h1>
<div class="form-row">
  <div class="col-md-4">
    <div class="form-group col-md-12">
      <label for="page_title">Titulo del Sitio</label><br>
      <input onchange="this.form.submit()" class="form-control col-md-6"  name="page_title" type="text" id="page_title" value="{{ $styles[0]->page_title }}">
    </div>
    <!-- <div class="form-group col-md-4">
      <label for="primary_color">Color Principal</label><br>
      <input onchange="this.form.submit()" class="form-control" name="primary_color" type="text" id="primary_color" value="{{ $styles[0]->primary_color }}">
    </div>
    <div class="form-group col-md-4">
      <label for="button_primary">Botón Desactivado</label><br>
      <input onchange="this.form.submit()" class="form-control" name="button_primary" type="text" id="button_primary" value="{{ $styles[0]->button_primary }}">
    </div>
    <div class="form-group col-md-4">
      <label for="button_secondary">Botón Activado</label><br>
      <input onchange="this.form.submit()" class="form-control" name="button_secondary" type="text" id="button_secondary" value="{{ $styles[0]->button_secondary }}">
    </div> -->
  </div>



  </div>

</form>
</div>

<div class="tabs">

    <ul class="tabs-navigation horizontal">
      <li class="li"><a class="a" href="{{route('home')}}">Activas</a></li>
      <li class="li actives"><a class="a" href="#inactivo">Inactivas</a></li>
      <!-- <li class="li"><a class="a" href="#paginas">Páginas</a></li> -->
    </ul>

<!-- INACTIVO -->
  <div id="activo" class=" tabdiv">
    <div class="row">
      <div class="container">
        <div class="" id="sort">
          @foreach($orders as $order)
            @if($order->display == 0)
              @if($order->section != 'articulos')
                <div id="sect{{$order->id}}" class="col-md-12 mb-4">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <div class="row">
                        <div class="col-md-1">

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
            @endif
          @endforeach
        </div>

      </div>
    </div>
  </div>


</div>
</div>


@endsection
@section('script')
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script src="{{asset('lib/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
<script>
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
<script src="{{ asset('lib/tabslet/jquery.tabslet.js') }}"></script>
<script>

</script>

@endsection
