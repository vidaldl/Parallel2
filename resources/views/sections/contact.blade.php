@if($contenidosection5s[0]->map == 1)
<div class="row norightmargin align-items-stretch" id="contact">
  <div class="col-lg-5" style="min-height: 550px; padding-right: 0px;">
    <iframe src="{{ $contenidosection5s[0]->map_iframe }}" frameborder="0" style="border:0; height: 100%; width: 100%;" allowfullscreen=""></iframe>

  </div>
  <div class="col-lg-3" style="background-color: {{$contenidosection5s[0]->back_color}};">
    <div style="padding: 40px;">
      <h4 class="font-body t600 ls1">{{$contenidosection5s[0]->title}}</h4>

      <div style="font-size: 15px; line-height: 1.7;">
        {!! $contenidosection5s[0]->info !!}
      </div>
    </div>
  </div>
  <div class="col-lg-4" style="background-color: {{$contenidosection5s[0]->back_form}};">
    <div class="col-padding">
      <!-- <a href="#" data-toggle="modal" data-target="#contactFormModal" class="button button-3d nomargin btn-block button-xlarge d-none d-md-block center">Click here to Send an Email</a> -->
			<a href="#" data-toggle="modal" data-target="#contactFormModal" class="button button-large button-rounded nomargin btn-block d-block d-md-none center">Send an Email</a>

      <!-- MODAL -->
			<div class="modal fade" id="contactFormModal" tabindex="-1" role="dialog" aria-labelledby="contactFormModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="contactFormModalLabel">{{$contenidosection5s[0]->title}}</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">

							<div class="container">
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
								<form class="nobottommargin" action="{{route('send.contact')}}" method="POST">
									@csrf
									<div class="form-process"></div>

									<div class="col_half"  >
										<label for="name">{{$contenidosection5s[0]->name}} <small>*</small></label>
                    <input type="hidden" name="recaptcha" id="recaptchaModal">
										<input type="text" id="name" name="name" value="" class="sm-form-control required" />
									</div>

									<div class="col_half col_last">
										<label for="email">{{$contenidosection5s[0]->email}} <small>*</small></label>
										<input type="email" id="email" name="email" value="" class="required email sm-form-control" />
									</div>

									<div class="clear"></div>

									<div class="col_half">
										<label for="number">{{$contenidosection5s[0]->phone}}</label>
										<input type="text" id="number" name="number" value="" class="sm-form-control" />
									</div>

									<div class="col_half col_last">
										<label for="service">{{$contenidosection5s[0]->services}}</label>
										<select id="service" name="service" class="sm-form-control">
											<option value="">-- Other --</option>
                      @foreach($contact_categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                      @endforeach
										</select>
									</div>

									<div class="clear"></div>

									<div class="col_full">
										<label for="subject">{{$contenidosection5s[0]->subject}} <small>*</small></label>
										<input type="text" id="subject" name="subject" value="" class="required sm-form-control" />
									</div>

									<div class="col_full">
										<label for="message">{{$contenidosection5s[0]->message}} <small>*</small></label>
										<textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30"></textarea>
									</div>



							</div>

						</div>
						<div class="modal-footer">
							<button class="button button-3d nomargin" type="submit" value="submit">{{$contenidosection5s[0]->send_button}}</button>
						</div>
            </form>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div> <!-- /.modal -->

      <div class="d-none d-md-block">
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
        <form class="nobottommargin" action="{{route('send.contact')}}" method="POST">
          @csrf
          <div class="form-process"></div>

          <div class="col_half"  >
            <label for="name">{{$contenidosection5s[0]->name}} <small>*</small></label>
            <input type="hidden" name="recaptcha" id="recaptcha">
            <input type="text" id="name" name="name" value="" class="sm-form-control required" />
          </div>

          <div class="col_half col_last">
            <label for="email">{{$contenidosection5s[0]->email}} <small>*</small></label>
            <input type="email" id="email" name="email" value="" class="required email sm-form-control" />
          </div>

          <div class="clear"></div>

          <div class="col_half">
            <label for="number">{{$contenidosection5s[0]->phone}}</label>
            <input type="text" id="number" name="number" value="" class="sm-form-control" />
          </div>

          <div class="col_half col_last">
            <label for="service">{{$contenidosection5s[0]->services}}</label>
            <select id="service" name="service" class="sm-form-control">
              <option value="">-- Other --</option>
              @foreach($contact_categories as $category)
                <option value="{{$category->name}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="clear"></div>

          <div class="col_full">
            <label for="subject">{{$contenidosection5s[0]->subject}} <small>*</small></label>
            <input type="text" id="subject" name="subject" value="" class="required sm-form-control" />
          </div>

          <div class="col_full">
            <label for="message">{{$contenidosection5s[0]->message}} <small>*</small></label>
            <textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30"></textarea>
          </div>


          <div class="col_full">
            <button class="button button-3d nomargin" type="submit" value="submit">{{$contenidosection5s[0]->send_button}}</button>
          </div>


        </form>

      </div>

    </div>
  </div>
</div>
@else
<div class="row" style="background-color: {{$contenidosection5s[0]->back_color}};" id="contact">
<div class="container">
	<div class="row norightmargin align-items-stretch">
	  <!-- <div class="col-lg-5" style="min-height: 550px; padding-right: 0px;">
	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15134.439606309257!2d-69.96693295000001!3d18.5013211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eaf8a2df55d5ea3%3A0xec8d5a80f329f5b8!2sPriceSmart!5e0!3m2!1ses-419!2sdo!4v1585673349011!5m2!1ses-419!2sdo" frameborder="0" style="border:0; height: 100%; width: 100%;" allowfullscreen=""></iframe>
	  </div> -->

			<div class="col-lg-5">
		    <div  style="padding: 40px;">
		      <h4 class="font-body t600 ls1">{{ $contenidosection5s[0]->title }}</h4>

		      <div style="font-size: 15px; line-height: 1.7;">
		        {!! $contenidosection5s[0]->info !!}
		      </div>
		    </div>
		  </div>
		  <div class="col-lg-7" style="background-color: {{$contenidosection5s[0]->back_form}}">
		    <div class="col-padding">
		      <!-- <a href="#" data-toggle="modal" data-target="#contactFormModal" class="button button-3d nomargin btn-block button-xlarge d-none d-md-block center">Click here to Send an Email</a> -->
					<a href="#" data-toggle="modal" data-target="#contactFormModal" class="button button-large button-rounded nomargin btn-block d-block d-md-none center">Send an Email</a>

		      <!-- MODAL -->
          <div class="modal fade" id="contactFormModal" tabindex="-1" role="dialog" aria-labelledby="contactFormModalLabel" aria-hidden="true">
    				<div class="modal-dialog">
    					<div class="modal-content">
    						<div class="modal-header">
    							<h4 class="modal-title" id="contactFormModalLabel">{{$contenidosection5s[0]->title}}</h4>
    							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    						</div>
    						<div class="modal-body">

    							<div class="container">
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
    								<form class="nobottommargin" action="{{route('send.contact')}}" method="POST">
    									@csrf
    									<div class="form-process"></div>

    									<div class="col_half"  >
    										<label for="name">{{$contenidosection5s[0]->name}} <small>*</small></label>
                        <input type="hidden" name="recaptcha" id="recaptchaModal">
    										<input type="text" id="name" name="name" value="" class="sm-form-control required" />
    									</div>

    									<div class="col_half col_last">
    										<label for="email">{{$contenidosection5s[0]->email}} <small>*</small></label>
    										<input type="email" id="email" name="email" value="" class="required email sm-form-control" />
    									</div>

    									<div class="clear"></div>

    									<div class="col_half">
    										<label for="number">{{$contenidosection5s[0]->phone}}</label>
    										<input type="text" id="number" name="number" value="" class="sm-form-control" />
    									</div>

    									<div class="col_half col_last">
    										<label for="service">{{$contenidosection5s[0]->services}}</label>
    										<select id="service" name="service" class="sm-form-control">
    											<option value="">-- Other --</option>
                          @foreach($contact_categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                          @endforeach
    										</select>
    									</div>

    									<div class="clear"></div>

    									<div class="col_full">
    										<label for="subject">{{$contenidosection5s[0]->subject}} <small>*</small></label>
    										<input type="text" id="subject" name="subject" value="" class="required sm-form-control" />
    									</div>

    									<div class="col_full">
    										<label for="message">{{$contenidosection5s[0]->message}} <small>*</small></label>
    										<textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30"></textarea>
    									</div>



    							</div>

    						</div>
    						<div class="modal-footer">
    							<button class="button button-3d nomargin" type="submit" value="submit">{{$contenidosection5s[0]->send_button}}</button>
    						</div>
                </form>
    					</div><!-- /.modal-content -->
    				</div><!-- /.modal-dialog -->
    			</div><!-- /.modal -->

		      <div class="d-none d-md-block">
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
            <form class="nobottommargin" action="{{route('send.contact')}}" method="POST">
              @csrf
              <div class="form-process"></div>

              <div class="col_half"  >
                <label for="name">{{$contenidosection5s[0]->name}} <small>*</small></label>
                <input type="hidden" name="recaptcha" id="recaptcha">
                <input type="text" id="name" name="name" value="" class="sm-form-control required" />
              </div>

              <div class="col_half col_last">
                <label for="email">{{$contenidosection5s[0]->email}} <small>*</small></label>
                <input type="email" id="email" name="email" value="" class="required email sm-form-control" />
              </div>

              <div class="clear"></div>

              <div class="col_half">
                <label for="number">{{$contenidosection5s[0]->phone}}</label>
                <input type="text" id="number" name="number" value="" class="sm-form-control" />
              </div>

              <div class="col_half col_last">
                <label for="service">{{$contenidosection5s[0]->services}}</label>
                <select id="service" name="service" class="sm-form-control">
                  <option value="">-- Other --</option>
                  @foreach($contact_categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="clear"></div>

              <div class="col_full">
                <label for="subject">{{$contenidosection5s[0]->subject}} <small>*</small></label>
                <input type="text" id="subject" name="subject" value="" class="required sm-form-control" />
              </div>

              <div class="col_full">
                <label for="message">{{$contenidosection5s[0]->message}} <small>*</small></label>
                <textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30"></textarea>
              </div>


              <div class="col_full">
                <button class="button button-3d nomargin" type="submit" value="submit">{{$contenidosection5s[0]->send_button}}</button>
              </div>


            </form>

		      </div>

		    </div>
		  </div>
	</div>
</div>
</div>
@endif
