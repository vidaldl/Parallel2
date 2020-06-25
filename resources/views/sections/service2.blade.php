
<div id="service2" class="clear"></div>
<div class="notopmargin nobottommargin nobottomborder" style="background-color: #fff">
	<div class="container clearfix">
		<div class="heading-block center nomargin">
			<h3>{{$service_section2s[0]->title}}</h3>
		</div>
	</div>
</div>

<div class="container clearfix mt-5">
  <div class="row justify-content-center">
	  @foreach($service2s as $servicio)
    <div class="col-md-4 bottommargin-lg">
      <div class="feature-box fbox-plain rightmargin-sm">
				@if($service_section2s[0]->desc_link == 1)
					@if($service_section2s[0]->icon_style == 1)
						<div class="fbox-icon" data-animate="bounceIn">
							<a href="#" data-featherlight="#animatedModal{{$servicio->id}}"><img src="{{$servicio->icon_img}}"></a>
						</div>
						<a href="#" style="text-decoration: none;" data-featherlight="#animatedModal{{$servicio->id}}">
							<h3>{{ $servicio->title }}</h3>
						</a>
					@else
						<div class="fbox-icon" data-animate="bounceIn">
							<a href="#" data-featherlight="#animatedModal{{$servicio->id}}"><i class="{{ $servicio->icon }}"></i></a>
						</div>
						<a href="#" style="text-decoration: none;" data-featherlight="#animatedModal{{$servicio->id}}">
							<h3>{{ $servicio->title }}</h3>
						</a>
					@endif
				@else
					@if($service_section2s[0]->icon_style == 1)
						<div class="fbox-icon" data-animate="bounceIn">
		          <span href="#"><img src="{{'/storage/' . $servicio->icon_img}}"></span>
		        </div>
					@else
						<div class="fbox-icon" data-animate="bounceIn">
							<span href="#"><i class="{{ $servicio->icon }}"></i></span>
						</div>
					@endif
					<h3>{{ $servicio->title }}</h3>
				@endif
        <p class="short">{!! $servicio->contenido !!}</p>
      </div>
    </div>
		@endforeach
  </div>
</div>

@foreach($service2s as $servicio)
<div class="modbox" id="animatedModal{{$servicio->id}}" style="width: 85vw !important">
				<div class="container" style="min-height: 500px;">
					<!-- Portfolio Single Gallery
				============================================= -->

				<div class="col_full portfolio-single-image portfolio-single-image-full" style="background-image: url('/storage/{{$servicio->image}}'); min-width: 75%;">

				</div><!-- .portfolio-single-image end -->

				<div class="col_one_third nobottommargin">

					<!-- Portfolio Single - Meta
					============================================= -->
					<div class="card events-meta mb-4">
						<div class="card-body col-md-12">
							<div class="row justify-content-center">
								<div class="col-md-4 mb-2">
									<i class="{{ $servicio->icon }} fa-4x mx-auto"></i>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>{{ $servicio->contenido }}</p>
								</div>
							</div>


						</div>
					</div>
					<!-- Portfolio Single - Meta End -->

				</div>

				<!-- Portfolio Single Content
				============================================= -->
				<div class="col_two_third portfolio-single-content col_last nobottommargin">

					<!-- Portfolio Single - Description
					============================================= -->
					<div class="fancy-title title-dotted-border">
						<h2>{{ $servicio->title }}</h2>
					</div>

					<div class="col nobottommargin">
						{!! $servicio->contenido_modal !!}
					</div>
					<!-- Portfolio Single - Description End -->

				</div><!-- .portfolio-single-content end -->

				<div class="clear"></div>
				</div>

</div>
@endforeach
@push('scripts')
<script src="{{asset('lib/featherlight/featherlight.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.feature-box').children('p').addClass('short');
		$('.feature-box').children('ul').addClass('short');
	});
</script>
@endpush
@push('styles')
	<link rel="stylesheet" href="{{asset('lib/featherlight/featherlight.css')}}">
	<style>
		.modbox {
			display: none;
		}
	</style>
@endpush
