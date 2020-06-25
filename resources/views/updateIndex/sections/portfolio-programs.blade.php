<!-- links -->
  <div class="col-md-12 mb-4">
    

    <div class="card shadow mb-4">
      <a href="#" style="text-decoration: none" data-toggle="collapse" data-target="#portfolio13" aria-expanded="true" aria-controls="portfolio13">
        <div class="card-header py-3">
        <form method="POST" action="{{route('portfolio.display')}}">
          @csrf
          <div class="row">
            <div class="col-md-1">
              <div class="handle"><i class="fas fa-arrows-alt"></i></div>
            </div>
            <span class="col-md-5"><h6 class="m-0 font-weight-bold text-primary">Portafolio</h6></span>
              <select onchange="this.form.submit()" name="portfolio-programs" class="col-md-6 float-right">
                @foreach($orders as $order)
                @if($order->section == 'portfolio-programs' && $order->display == 1)
                <option selected value="1">Mostrar</option>
                <option value="0">Esconder</option>
                @elseif($order->section == 'portfolio-programs' && $order->display == 0)
                <option value="1">Mostrar</option>
                <option selected value="0">Esconder</option>
                @endif
                @endforeach
              </select>
          </div>
        </form>
      </div>
      </a>
    <div id="portfolio13" class="collapse">
      <div class="card-body row">
        <div class="col-md-6">
          <img class="img-fluid" src="{{asset('img/sections/programas.png')}}">
        </div>
        <div class=" col-md-6">
          <div class="row">
            <a class="btn btn-success mx-auto mt-5" href="{{route('portfolioItems.index')}}">Editar contenido &rarr;</a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
<!-- links -->
