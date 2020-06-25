
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="section-title">{{$contenidosection5s[0]->title}}</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-3 col-md-4">
          <div class="info">
            <div>
              <i class="fa fa-map-marker-alt"></i>
              <p>{!! $contenidosection5s[0]->address !!}</p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              <p>{!! $contenidosection5s[0]->email !!}</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>{!! $contenidosection5s[0]->number !!}</p>
            </div>
          </div>
        </div>

        <div class="col-lg-5 col-md-8">
          <div class="form">
            @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
            @endif

            <div id="errormessage">
              @if(session()->has('error'))
                <div class="alert alert-danger">
                  {{ session()->get('error') }}
                </div>
              @endif
            </div>
            <form  action="{{ route('send.contact') }}" method="post" role="form" class="contactForm">
              @csrf
              <div class="form-group">
                <input autocomplete="off" type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Full Name" data-rule="minlen:4" data-msg="Por favor introduzca por lo menos 4 carácteres" />
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <input autocomplete="off" type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="E-mail" data-rule="email" data-msg="Por favor entrar un email válido" />
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <input autocomplete="off" type="tel" class="form-control @error('number') is-invalid @enderror" name="number" id="number" placeholder="Phone Number"  data-msg="Por favor introduzca su número de teléfono" />
                  @error('number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <input autocomplete="off" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Por favor introduzca el asunto" />
                  @error('subject')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="form-group">
                <textarea autocomplete="off" class="form-control @error('message') is-invalid @enderror" name="message" rows="5" data-rule="required" data-msg="Tell Us Something!" placeholder="Mensaje"></textarea>
                  @error('message')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              <div class="text-center"><button class="button button-rounded button-reveal button-large button-border tright"><i class="fas fa-paper-plane"></i><span>Enviar</span></button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
