
<section id="slider" class="slider-element {{$menu_item[0]->menu_style == 2 ? 'with-header' : ''}} slider-parallax swiper_wrapper full-screen clearfix swiper-no-swiping" data-grab="false">

  <div class="slider-parallax-inner">

    <div class="swiper-container swiper-parent">
      <div class="swiper-wrapper">

        <div class="swiper-slide dark" style="background-image: url({{ '/storage/' . $contenidosection1s[0]->background_image }});">
          <div class="overlay{{$contenidosection1s[0]->id}}"></div>
          <div class="container clearfix">

            <div class="slider-caption slider-caption-center dark">
              @if($contenidosection1s[0]->display == 1)
                <div class="d-none d-md-block mb-5"><img class="img-fluid " src="{{'/storage/' . $contenidosection1s[0]->logo }}" style="height: 300px" alt=""></div>
              @endif
                <h2 class="slider-caption-h2 mb-4" data-animate="fadeInUp">{{$contenidosection1s[0]->title}}</h2>
                <div class="slider-caption-p d-none d-sm-block mb-4" data-animate="fadeInUp" data-delay="200">{{ $contenidosection1s[0]->tagline }}</div>

              @if($contenidosection1s[0]->button)
                @if($contenidosection1s[0]->overlay <= 50)
                  <a href="{{$contenidosection1s[0]->link}}" class="button button-green button-large">
                    <span>{{$contenidosection1s[0]->button}}</span>
                  </a>
                @elseif($contenidosection1s[0]->overlay > 50)
                  <a href="{{$contenidosection1s[0]->link}}" style="color: #fff;" class="button button-green button-rounded button-light  button-large button-border">
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
