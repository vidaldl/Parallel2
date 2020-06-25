<div id="home" class="page-section" style="position:absolute;top:0;left:0;width:100%;height:200px;z-index:-2;"></div>
<section id="slider" class="slider-element full-screen swiper-no-swiping slider-parallax swiper_wrapper clearfix" data-grab="false" style="height: 250px;">

	<div class="slider-parallax-inner">

		<div class="swiper-container swiper-parent">
			<div class="swiper-wrapper">
				<div class="swiper-slide dark" style="background-image: url({{ '/storage/' . $contenidosection1s[0]->background_image }});">
					<div class="overlay{{$contenidosection1s[0]->id}}"></div>
					<div class="container clearfix">

						<div class="slider-caption slider-caption-center">
							<h2 class="slider-caption-h2" data-animate="fadeInUp">{{$contenidosection1s[0]->title}}</h2>
							@if($contenidosection1s[0]->button)
								@if($contenidosection1s[0]->overlay <= 50)
	                <a href="{{$contenidosection1s[0]->link}}" class="button button-green button-large d-none d-md-inline-block mt-3">
										<span>{{$contenidosection1s[0]->button}}</span>
									</a>
								@elseif($contenidosection1s[0]->overlay > 50)
	                <a href="{{$contenidosection1s[0]->link}}" style="color: #fff;" class="button button-rounded button-light button-green button-large button-border d-none d-md-inline-block mt-3">
										<span>{{$contenidosection1s[0]->button}}</span>
									</a>
								@endif
							@endif
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>

</section>
