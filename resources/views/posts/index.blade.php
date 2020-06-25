@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Artículos</h1>
  <a href="{{route('posts.create')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-plus fa-sm "></i></span><span class="text"> &nbsp;Nuevo Artículo<span></a>
</div>
@if($posts->count() > 0)
<div class="card">
  <div class="card-body table-hover" >
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Category</th>
            <th scope="col">Titulo</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="table-striped">

          @foreach($posts as $post)
          <tr>
              <td>
                <img src="{{ '/storage/' . $post->image }}" height="90" width="100" alt="">
              </td>
              <td>
                <a href="{{ route('categories.edit', $post->category->id) }}">
                  {{ $post->category->name }}
                </a>
              </td>
              <td>
                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                  @csrf
                  @method('DELETE')
                <h4>{{ $post->title }}
              </td>
              <td>
                  <span class="float-right">

                      <button  type="submit" class="btn btn-circle btn-danger float-right ml-3">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    @if($post->trashed())
                    <form class="float-right" action="{{ route('restore-posts', $post->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success btn-inverse" >
                        <i class="fas fa-trash-restore"></i>&nbsp; Restaurar
                      </button>
                    </form>
                    @else
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-inverse float-right" >
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

    <h3 class="h3 text-center text-gray-800">Ahora mismo no hay Artículos</h3>

  @endif

</div>


@endsection
