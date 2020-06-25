<!-- Footer -->
  <div class="col-md-12 mb-4 mt-5">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row">
          <span class="col-md-6"><h6 class="m-0 font-weight-bold text-primary">Pie de Página</h6></span>
        </div>

        <!-- <form method="POST" action="{{route('sectionFooter.display', $contenidosectionfooters[0]->id)}}">
          @csrf
          <div class="row">

              <select onchange="this.form.submit()" name="sectionFooter" class="col-md-6  float-right">
                <option value="1" {{ $contenidosectionfooters[0]->display == '1' ? 'selected' : '' }}>Mostrar</option>
                <option value="0" {{ $contenidosectionfooters[0]->display == '0' ? 'selected' : '' }}>Esconder</option>
              </select>
          </div>
        </form> -->
      </div>
        <div class="card-body row">
          <div class="col-md-6">
            <img class="img-fluid" src="{{asset('img/sections/sectionFooter.png')}}">
          </div>
          <div class=" col-md-6">
            <div class="row">
              <a class="btn btn-success mx-auto mt-5" href="editsectionFooter/{{$contenidosectionfooters[0]->id}}">Editar contenido &rarr;</a>
            </div>
          </div>
        </div>
    </div>
  </div>
<!-- /Footer -->
