@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{ isset($tag) ? 'Editar Etiqueta' : 'Agregar Etiqueta' }}</h1>
  <a href="{{route('tags.index')}}" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="fas fa-arrow-left fa-sm "></i></span><span class="text"> &nbsp;Etiquetas<span></a>
</div>
  <div class="row justify-content-center">
    <div class="card col-md-8">
      <div class="card-body">
        <form method="POST" action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}">
          @csrf
          @if(isset($tag))
            @method('PUT')
          @endif
          <div class="form-group">
            <label for="name" class="col-form-label">Nombre de Etiqueta</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($tag) ? $tag->name : '' }}">
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success float-right">{{ isset($tag) ? 'Editar' : 'Agregar' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
