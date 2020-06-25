
@section('footer')

<footer id="footer" style="background-color: {{$contenidosectionfooters[0]->back_color}}; color: {{$contenidosectionfooters[0]->color}}" class="site-footer dark" id="footer">
  <!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						<div class="copyrights-menu copyright-links clearfix sf-js-enabled">
							<a href="#" data-href="#slider">{{$menu_item[0]->item_inicio}}</a>/
							@foreach($orders as $item)
								@if($item->display == 1 && $item->menu_display == 1)
									<a href="#{{$item->section}}">{{$item->menu_name}}</a>/
								@endif
							@endforeach
						</div>
						&copy; Copyright {{$contenidosectionfooters[0]->copy}} {{ now()->year }}

					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
						@foreach($footer_links as $item)
							<a href="{{$item->link}}" class="social-icon social-icon{{$item->id}} si-small si-borderless nobottommargin">
								<i style="color: {{$item->color}};" class="{{$item->icon}}"></i>
								<i style="color: {{$item->color}};" class="{{$item->icon}}"></i>
							</a>
						@endforeach

							<a href="/login" target="_blank" class="social-icon si-small si-borderless nobottommargin si-twitter">
								<i class="icon-user21"></i>
								<i class="icon-fingerprint"></i>
							</a>
              <br>
                Designed by <a href="https://siscop.net">Siscop</a>
						</div>

					</div>

				</div>

			</div><!-- #copyrights end -->
</footer>

@endsection
