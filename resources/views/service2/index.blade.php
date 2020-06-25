@extends('layouts.app')
@section('css')
  <link href="{{ asset('lib/btnswitch/jquery.btnswitch.css') }}" rel="stylesheet">
  <style media="screen">
    .tgl-sw-swipe + .btn-switch {
      background: #e74a3b;
    }
  </style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Servicios</h1>
  @if(Request::is('trashed-servicios2'))
    <a href="{{ route('servicios2.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Servicios 2<span></a>
  @else
    <a href="{{ route('trashed-servicios2.index')}}" class="d-none d-sm-inline-block btn btn-danger btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-trash fa-sm "></i></span><span class="text"> &nbsp;Papelera<span></a>
  @endif

    <a href="{{ route('servicios2.create')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-plus fa-sm "></i></span><span class="text"> &nbsp;Nuevo Servicio<span></a>


</div>
@if($servicios->count() > 0)
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="mr-auto ml-5">
        <div class="row">
          <h5>Iconos:</h5>&nbsp;&nbsp;
          <div id="icon_style"></div>
        </div>
      </div>

      <div class="ml-auto mr-5">
        <div class="row">
          <h5>Servicios Detallados:</h5>&nbsp;&nbsp;
          <div id="display"></div>
        </div>
      </div>

    </div>
  </div>
  <div class="card-body table-hover">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Icono</th>
            <th scope="col">Titulo</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="table-striped">

          @foreach($servicios as $servicio)
          <tr>
              <td>
              @if($contenido_section2s[0]->icon_style == 1)

                <img style="width: 64px" src="{{'/storage/' . $servicio->icon_img}}">

              @else
                <div class="feature-icon">
                  <span class="{{ $servicio->icon }}"></span>
                </div>
              @endif
              </td>
              <td>
                <h4>{{ $servicio->title }}</h4>
              </td>
                <form method="POST" action="{{ route('servicios2.destroy', $servicio->id) }}">
                  @csrf
                  @method('DELETE')
              <td>
                  <span class="float-right">

                      <button  type="submit" class="btn btn-circle btn-danger float-right ml-3">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    @if($servicio->trashed())
                    <form class="float-right" action="{{ route('restore-servicios2', $servicio->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success btn-inverse" >
                        <i class="fas fa-trash-restore"></i>&nbsp; Restaurar
                      </button>
                    </form>
                    @else
                    <a href="{{ route('servicios2.edit', $servicio->id) }}" class="btn btn-success btn-inverse float-right" >
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
    </div>
  </div>
</div>

  @else

    <h3 class="h3 text-center text-gray-800">Ahora mismo no hay Servicios</h3>

  @endif

</div>

@section('script')
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script>
$('#display').btnSwitch({
  Theme:'Swipe',
  OnText: "Si",
  OffText: "No",
  OnValue: '1',
  OnCallback: function(val) {

    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("service2.section.update", 1)}}',
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
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("service2.section.update", 1)}}',
           data:{"_token": "{{ csrf_token() }}",
           val:val
          },
           success:function(data){
              alert(data.success);
           }
        });

  },
  @if($contenido_section2s[0]->desc_link == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});

$('#icon_style').btnSwitch({
  Theme:'Swipe',
  OnText: "Subir",
  OffText: "FontAwesome",
  OnValue: '1',
  OnCallback: function(val) {

    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("service2.section.update", 1)}}',
           data:{"_token": "{{ csrf_token() }}",
           val1:val
          },
           success:function(data){
              alert(data.success);
           }
        });

        setTimeout(
          function()
          {
            location.reload();
          }, 500);

    },
  OffValue: '0',
  OffCallback: function (val) {
    $.ajax({
           type:'POST',
           dataType: 'json',
           url:'{{route("service2.section.update", 1)}}',
           data:{"_token": "{{ csrf_token() }}",
           val1:val
          },
           success:function(data){
              alert(data.success);
           }
        });

        setTimeout(
          function()
          {
            location.reload();
          }, 500);

  },
  @if($contenido_section2s[0]->icon_style == 1)
  ToggleState: true
  @else
  ToggleState: false
  @endif
});
</script>
@endsection

@endsection
