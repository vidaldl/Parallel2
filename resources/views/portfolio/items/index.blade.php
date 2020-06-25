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
  <h1 class="h3 mb-0 text-gray-800">Portfolio: Artículos</h1>
  @if (Request::is('trashed-portfolioItems'))
    <a href="{{ route('portfolioItems.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Portfolio: Artículos<span></a>
  @else
    <a class="btn btn-danger" href="{{route('trashed-portfolioItems.index')}}"><i class="fas fa-trash"></i>&nbsp;Papelera</a>
    <a href="{{ route('portfolioItems.create')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-plus fa-sm "></i></span><span class="text"> &nbsp;Nuevo Artículo<span></a>
  @endif
</div>
@if($portfolioItems->count() > 0)
<div class="col-md-12">
  <!-- LINE/SPACE -->
  @foreach($orders as $item)
    @if($item->id == 13)
  <form method="POST" action="{{route('line.update', 13)}}">
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
      <div id="collapse13">
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
<div class="card">
  <div class="card-body table-hover" >
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Icono</th>
            <th scope="col">Titulo</th>
            <th scope="col">Categorias</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="table-striped">
          <form  action="{{route('PortfolioSection.update')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title" class="col-form-label">Titulo de la Sección</label>
              <input id="title"  type="input" name="title" class="form-control @error('title') is-invalid @enderror"  value="{{$portfolio_section[0]->title}}">
                @error('title')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            <div class="form-group">
              <label for="filter">Filtro por Categoria</label>
              <div id="filter"></div>
            </div>
            <div class="form-group row">

                <button class="btn btn-success ml-auto mr-3" type="submit">Actualizar</button>

            </div>
          </form>
          @foreach($portfolioItems as $item)
          <tr>
              <td>
                <img src="{{ '/storage/' . $item->logo }}" width="120" alt="">
              </td>
              <td>
                <h4>{{ $item->title }}</h4>
              </td>
              <td>
              <a href="{{route('portfolioCategories.index')}}">
                @foreach($item->portfolio_category->pluck('name') as $ca)
                  @if($loop->last)
                  {{$ca}}.
                  @else
                  {{$ca}},
                 @endif
                @endforeach
              </a>
              </td>
                <form method="POST" action="{{ route('portfolioItems.destroy', $item->id) }}">
                  @csrf
                  @method('DELETE')
              <td>
                  <span class="float-right">

                      <button  type="submit" class="btn btn-circle btn-danger float-right ml-3">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    @if($item->trashed())
                    <form class="float-right" action="{{ route('restore-portfolio-items', $item->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success btn-inverse" >
                        <i class="fas fa-trash-restore"></i>&nbsp; Restaurar
                      </button>
                    </form>
                    @else
                    <a href="{{ route('portfolioItems.edit', $item->id) }}" class="btn btn-success btn-inverse float-right" >
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
    @if (Request::is('trashed-portfolioItems'))
      <h3 class="h3 text-center text-gray-800">Ahora mismo no hay Artículos en la Papelera</h3>
    @else
      <h3 class="h3 text-center text-gray-800">Ahora mismo no hay Artículos</h3>
    @endif
  @endif

</div>

@endsection

@section('script')
<script src="{{ asset('lib/btnswitch/jquery.btnswitch.js') }}"></script>
<script>
  $('#filter').btnSwitch({
    Theme:'Swipe',
    OnText: "Si",
    OffText: "No",
    OnValue: '1',
    OnCallback: function(val) {

      $.ajax({
             type:'POST',
             dataType: 'json',
             url:'{{route("PortfolioFilter.update")}}',
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
             url:'{{route("PortfolioFilter.update")}}',
             data:{"_token": "{{ csrf_token() }}",
             val:val
            },
             success:function(data){
                alert(data.success);
             }
          });

    },
    @if($portfolio_section[0]->filter == 1)
    ToggleState: true
    @else
    ToggleState: false
    @endif
  });
</script>
@endsection
