@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
 <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
</div>
<div class="card">
  <div class="card-body" >
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Avatar</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Función</th>


          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>
              <img class="img-profile rounded-circle" width="50" height="50" src="{{ Gravatar::src($user->username) }}" alt="">
            </td>
            <td>
            {{ $user->username }}
            </td>
            <td>
              {{ $user->email }}
            </td>
            <td>
            {{ $user->role }}
            </td>

              @if(!$user->isAdmin())
              <td>
                <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                  @csrf
                  <span class="float-right"><button href="" class="btn btn-success btn-inverse float-right" ><i class="fas fa-edit"></i>&nbsp; Volver Admin</button></span>
                </form>
              </td>
              @endif

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>




</div>
@endsection
