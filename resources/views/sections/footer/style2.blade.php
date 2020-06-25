@section('footer')
<footer id="footer" class="dark" style="background-color: {{$contenidosectionfooters[0]->back_color}}; color: {{$contenidosectionfooters[0]->color}}">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

          <div class="row">
            <div class="col-md-8">

  						<div class="widget clearfix">
  							<img src="{{'/storage/' . $contenidosectionfooters[0]->logo}}" style="position: relative; opacity: 0.85; left: -10px; max-height: 80px; margin-bottom: 20px;" alt="Footer Logo">
								{!! $contenidosectionfooters[0]->acerca !!}
  						</div>

  					</div>

  					<div class="col-md-4">

  						<div class="col-md-12">

  							<h4 class="ls1 t400 uppercase" style="color: {{$contenidosectionfooters[0]->color}}">{{$contenidosectionfooters[0]->social_title}}</h4>

  							<div class="bottommargin-sm clearfix">
									@foreach($footer_links as $item)
	  								<a href="{{$item->link}}" class="social-icon si-colored si-small si-rounded" style="background-color: {{$item->back_color}};">
	  									<i style="color: {{$item->color}};" class="{{$item->icon}}"></i>
	  									<i style="color: {{$item->color}};" class="{{$item->icon}}"></i>
	  								</a>
									@endforeach

  							</div>



  						</div>

  					</div>

            <div class="col-md-12">
              <div class="line" style="margin: 30px 0;"></div>

              <p class="ls1 t300" style="opacity: 0.6; font-size: 13px;">Copyright &copy;{{ now()->year }}&nbsp;{{$contenidosectionfooters[0]->copy}}</p>
            </div>
            <div class="col-md-11">
              <div class="copyrights-menu copyright-links clearfix">
  							<a href="#" data-href="#slider">{{$menu_item[0]->item_inicio}}</a>/
  							@foreach($orders as $item)
  								@if($item->display == 1 && $item->menu_display == 1)
  									<a href="#{{$item->section}}">{{$item->menu_name}}</a>/
  								@endif
  							@endforeach
  						</div>
            </div>
						<div class="col-md-1">
							<a href="/login" target="_blank" class="social-icon si-small si-rounded si-borderless si-twitter">
								<i style="color:white" class="icon-user21"></i>
								<i class="icon-fingerprint"></i>
							</a>
						</div>
          </div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

		</footer><!-- #footer end -->
@endsection
