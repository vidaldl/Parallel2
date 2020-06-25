@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Portfolio: Manejar Categorias</h1>
  <a href="{{route('portfolioItems.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Artículos<span></a>
  <a href="{{route('portfolioCategories.create')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-plus fa-sm "></i></span><span class="text"> &nbsp;Crear Categoría<span></a>
</div>
@if($portfolioCategories->count() > 0)
  <div class="card">
    <div class="card-body" >
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Objetos del Portfolio</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($portfolioCategories as $cat)
            <tr>
              <td>
                <h3>{{ $cat->name }}</h3>
              </td>
              <td>
                 <!-- $cat->posts->count()  -->
              </td>
              <td>
                <span class="float-right"><button id="deletecat" onclick="handleDelete({{ $cat->id }})" class="btn btn-circle btn-danger float-right ml-3"><i class="fas fa-trash"></i></button><a href="{{route('portfolioCategories.edit', $cat->id)}}" class="btn btn-success btn-inverse float-right" ><i class="fas fa-edit"></i>&nbsp; Edit</a></span>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Delete tag Modal-->
  <div class="modal fade" id="deletecatModal" tabindex="-1" role="dialog" aria-labelledby="deletetag" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="" method="post" id="deletecatForm">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Estás seguro?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Haz click en eliminar si quieres eliminar la Categoría</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning">Eliminar&nbsp;<i class="fas fa-trash"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @else
    <h3 class="h3 text-center text-gray-800">Ahora Mismo no hay Etiquetas Creadas</h3>
  @endif
</div>
@endsection



@section('script')
 <script type="text/javascript">
 function handleDelete(id) {
   var form = document.getElementById('deletecatForm')
   form.action = '/portfolioCategories/' + id
   console.log('deleting', form)
   $('#deletecatModal').modal('show')
 }
 </script>
@endsection
