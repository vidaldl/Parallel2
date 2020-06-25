<!-- CAROUSEL -->
<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix {{ $contenidosection1s[0]->carousel == 0 ? 'd-none' : '' }}" data-autoplay="7000" data-speed="650" data-loop="true">

  <div class="slider-parallax-inner">

    <div class="swiper-container swiper-parent">
      <div class="swiper-wrapper">

        <div class="swiper-slide dark" style="background-image: url({{ '/storage/' . $contenidosection1s[1]->background_image }});">
          <div class="overlay{{$contenidosection1s[1]->id}}"></div>
          <div class="container clearfix">

            <div class="slider-caption slider-caption-center">

              @if($contenidosection1s[1]->display == 1)
              <div class="d-none d-md-block mb-2"><img class="img-fluid " src="{{'/storage/' . $contenidosection1s[1]->logo }}" style="height: 350px" alt=""></div>
              @endif
              <h2 class="slider-caption-h2 d-none d-block" data-animate="fadeInUp">{{$contenidosection1s[1]->title}}</h2>
              <p class="slider-caption-p d-none d-sm-block " data-animate="fadeInUp" data-delay="200">{{ $contenidosection1s[1]->tagline }}</p>

            </div>
          </div>
        </div>
        <div class="swiper-slide dark" style="background-image: url({{ '/storage/' . $contenidosection1s[2]->background_image }});">
          <div class="overlay{{$contenidosection1s[2]->id}}"></div>
          <div class="container clearfix">
            @if($contenidosection1s[2]->display == 1)
            <div class="slider-caption d-none d-xl-block">
              <img src="{{'/storage/' . $contenidosection1s[2]->logo }}" alt="">
            </div>
            @endif
            <div class="slider-caption slider-caption-right">
              <h2 class="slider-caption-h2" data-animate="fadeInUp">{{$contenidosection1s[2]->title}}</h2>
              <p class="slider-caption-p d-none d-md-block" data-animate="fadeInUp" data-delay="200">{{ $contenidosection1s[2]->tagline }}</p>
            </div>
          </div>
        </div>
        <div class="swiper-slide dark" style="background-image: url({{ '/storage/' . $contenidosection1s[3]->background_image }});">
          <div class="overlay{{$contenidosection1s[3]->id}}"></div>
          <div class="container clearfix">
            <div class="slider-caption">
              <h2 class="slider-caption-h2" data-animate="fadeInUp">{{$contenidosection1s[3]->title}}</h2>
              <p class="slider-caption-p d-none d-md-block" data-animate="fadeInUp" data-delay="200">{{ $contenidosection1s[3]->tagline }}</p>
            </div>
            @if($contenidosection1s[3]->display == 1)
              <div class="slider-caption slider-caption-right d-none d-xl-block">
                <img src="{{'/storage/' . $contenidosection1s[3]->logo }}" alt="">
              </div>
            @endif
          </div>
        </div>
      </div>
      <div class="slider-arrow-left d-none d-sm-block"><i class="icon-angle-left"></i></div>
      <div class="slider-arrow-right d-none d-sm-block"><i class="icon-angle-right"></i></div>
      <div class="swiper-pagination"></div>
    </div>

  </div>

</section>
<!-- END CAROUSEL -->
