<!-- @push('styles')
  <style media="screen">
    #image-carousel { overflow: visible; }
    #image-carousel .carousel-column {
	display: flex;
	flex-direction: column;
	flex: 1 0;
	margin: 0;
	padding: 0;
	list-style: none;
}
#image-carousel .column-1 { padding-right: 12px; }
#image-carousel .column-2 { padding-left: 12px; }

#image-carousel .carousel-column-container {
	display: flex;
	flex-direction: row;
}

#image-carousel .carousel-grid-item {
	display: flex;
	flex: 1;
	margin: 0;
	padding: 0;
}

#image-carousel .carousel-grid-item .item {
	flex: 1;
	position: relative;
	width: 100%;
	min-height: 150px;
	margin-bottom: 24px;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	border-radius: 5px;
	transition: all .2s ease-out;
}

.button:hover,
#top-account:hover a,
#image-carousel .carousel-grid-item:hover a.item {
	box-shadow: 0 5px 8px rgba(0, 0, 0, 0.2);
	transform: translateY(-3px);
	opacity: .95;
}

#image-carousel .carousel-grid-item .item blockquote { z-index: 1; }



.bgcolor {
  background-color: {{$styles[0]->button_primary}};
}

.text-white-50 {
  color: rgba(255, 255, 255, 0.5) !important;
}

/*OWL CARROUSEL*/

.slider-element .owl-carousel { margin: 0; }

.slider-arrow-right,
.slider-element .owl-next,
.flex-next {
	left: auto;
	right: 0;
	border-radius: 3px 0 0 3px;
}

.slider-element .owl-prev i { margin-left: 0; }

.slider-element .owl-next i { margin-right: 4px; }
.slider-element .owl-dots {
	position: absolute;
	width: 100%;
	z-index: 20;
	margin: 0;
	top: auto;
	bottom: 15px;
}

.slider-element .owl-dots button {
	width: 10px;
	height: 10px;
	margin: 0 3px;
	opacity: 1 !important;
	background-color: transparent !important;
	border: 1px solid #FFF;
}

.slider-element .owl-dots .owl-dot.active,
.slider-element .owl-dots .owl-dot:hover { background-color: #FFF !important; }

.owl-carousel .animated {
	-webkit-animation-duration: 1000ms;
	animation-duration: 1000ms;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
}

.owl-carousel .owl-animated-in { z-index: 0; }

.owl-carousel .owl-animated-out { z-index: 1; }

.owl-carousel .fadeOut  {
	-webkit-animation-name: fadeOut;
	animation-name: fadeOut;
}

@-webkit-keyframes fadeOut {
	0% { opacity: 1; }
	100% { opacity: 0; }
}

@keyframes fadeOut {
	0% { opacity: 1; }
	100% { opacity: 0; }
}

.owl-height {
	-webkit-transition:height 500ms ease-in-out;
	-o-transition:height 500ms ease-in-out;
	transition:height 500ms ease-in-out
}

.owl-carousel {
	display:none;
	-webkit-tap-highlight-color:transparent;
	position:relative;
	z-index:1;
	width: 100%;
}

.owl-carousel .owl-stage {
	position:relative;
	-ms-touch-action: pan-Y;
}

.owl-carousel .owl-stage:after {
	content:".";
	display:block;
	clear:both;
	visibility:hidden;
	line-height:0;
	height:0
}

.owl-carousel .owl-stage-outer {
	position:relative;
	overflow:hidden;
	-webkit-transform:translate3d(0,0,0);
}

.owl-carousel.owl-loaded { display:block }

.owl-carousel.owl-loading {
	display:block;
	min-height: 100px;
	background: url('images/preloader.gif') no-repeat center center
}

.owl-carousel .owl-refresh .owl-item { display:none }

.owl-carousel .owl-item {
	position: relative;
	min-height: 1px;
	float: left;
	-webkit-tap-highlight-color: transparent;
	-webkit-touch-callout: none;
}

.owl-carousel .owl-item img {
	display:block;
	width:100%;
	-webkit-transform-style:preserve-3d;
}

.slider-element .owl-carousel .owl-item img { -webkit-transform-style: preserve-3d; }

.owl-carousel .owl-nav.disabled, .owl-carousel .owl-dots.disabled { display: none; }

.owl-nav .owl-prev,
.owl-nav .owl-next,
.owl-dot,
.owl-dots button {
	cursor: pointer;
	cursor: hand;
	padding: 0;
	border: 0;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.owl-carousel.owl-loaded { display: block; }

.owl-carousel.owl-loading {
	opacity: 0;
	display: block;
}

.owl-carousel.owl-hidden { opacity: 0; }

.mega-menu-content .owl-carousel.owl-hidden { opacity: 1; }

.owl-carousel.owl-refresh .owl-item { display: none; }

.owl-carousel.owl-drag .owl-item {
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

.owl-carousel.owl-grab {
	cursor: move;
	cursor: -webkit-grab;
	cursor: -o-grab;
	cursor: -ms-grab;
	cursor: grab;
}

.owl-carousel.owl-rtl { direction: rtl; }

.owl-carousel.owl-rtl .owl-item { float: right; }

.no-js .owl-carousel { display: block; }

.owl-carousel .owl-item .owl-lazy {
	opacity:0;
	-webkit-transition:opacity 400ms ease;
	-o-transition:opacity 400ms ease;
	transition:opacity 400ms ease
}

.owl-carousel .owl-item img { transform-style:preserve-3d }

.owl-carousel .owl-video-wrapper {
	position:relative;
	height:100%;
	background:#111
}

.owl-carousel .owl-video-play-icon {
	position: absolute;
	height: 64px;
	width: 64px;
	left: 50%;
	top: 50%;
	margin-left: -32px;
	margin-top: -32px;
	background: url("images/icons/play.png") no-repeat;
	cursor: pointer;
	z-index: 1;
	-webkit-backface-visibility: hidden;
	-webkit-transition: scale 100ms ease;
	-o-transition: scale 100ms ease;
	transition: scale 100ms ease;
}

.owl-carousel .owl-video-play-icon:hover {
	-webkit-transition:scale(1.3,1.3);
	-o-transition:scale(1.3,1.3);
	transition:scale(1.3,1.3)
}

.owl-carousel .owl-video-playing .owl-video-play-icon,
.owl-carousel .owl-video-playing .owl-video-tn { display:none }

.owl-carousel .owl-video-tn {
	opacity:0;
	height:100%;
	background-position:center center;
	background-repeat:no-repeat;
	-webkit-background-size:contain;
	-moz-background-size:contain;
	-o-background-size:contain;
	background-size:contain;
	-webkit-transition:opacity 400ms ease;
	-o-transition:opacity 400ms ease;
	transition:opacity 400ms ease
}

.owl-carousel .owl-video-frame {
	position:relative;
	z-index:1;
	height: 100%;
	width: 100%;
}


/* Owl Carousel - Controls
-----------------------------------------------------------------*/

.owl-carousel .owl-dots,
.owl-carousel .owl-nav {
	text-align: center;
	-webkit-tap-highlight-color: transparent;
	line-height: 1;
}

/* Owl Carousel - Controls - Arrows
-----------------------------------------------------------------*/

.owl-carousel .owl-nav [class*=owl-] {
	position: absolute;
	top: 50%;
	margin-top: -18px;
	left: -36px;
	zoom: 1;
	width: 36px;
	height: 36px;
	line-height: 32px;
	border: 1px solid rgba(0,0,0,0.2);
	color: #666;
	background-color: #FFF;
	font-size: 18px;
	border-radius: 50%;
	opacity: 0;
	-webkit-transition: all .3s ease;
	-o-transition: all .3s ease;
	transition: all .3s ease;
}

.owl-carousel.with-carousel-dots .owl-nav [class*=owl-] { margin-top: -38px; }

.slider-element .owl-nav [class*=owl-],
.owl-carousel-full .owl-nav [class*=owl-] {
	margin-top: -30px;
	left: 0 !important;
	height: 60px;
	line-height: 60px;
	border: none;
	color: #EEE;
	background-color: rgba(0,0,0,0.4);
	font-size: 28px;
	border-radius: 0 3px 3px 0;
}

.owl-carousel-full .with-carousel-dots .owl-nav [class*=owl-] { margin-top: -50px; }

.owl-carousel .owl-nav .owl-next {
	left: auto;
	right: -36px;
}

.slider-element .owl-nav .owl-next,
.owl-carousel-full  .owl-nav .owl-next {
	left: auto !important;
	right: 0 !important;
	border-radius: 3px 0 0 3px;
}

.owl-carousel:hover .owl-nav [class*=owl-] {
	opacity: 1;
	left: -18px;
}

.owl-carousel:hover .owl-nav .owl-next {
	left: auto;
	right: -18px;
}

.owl-carousel .owl-nav [class*=owl-]:hover {
	background-color: #1ABC9C !important;
	color: #FFF !important;
	text-decoration: none;
}

.owl-carousel .owl-nav .disabled { display: none !important; }


/* Owl Carousel - Controls - Dots
-----------------------------------------------------------------*/

.owl-carousel .owl-dots .owl-dot {
	display: inline-block;
	zoom: 1;
	width: 8px;
	height: 8px;
	margin: 30px 4px 0 4px;
	opacity: 0.5;
	border-radius: 50%;
	background-color: {{$styles[0]->button_primary}};
	-webkit-transition: all .3s ease;
	-o-transition: all .3s ease;
	transition: all .3s ease;
}

.owl-carousel .owl-dots .owl-dot.active,
.owl-carousel .owl-dots .owl-dot:hover { opacity: 1; }

.owl-carousel .owl-stage { padding: 20px 0; }

.owl-carousel .owl-dots .owl-dot {
	width: 20px;
    height: 5px;
    border-radius: 4px;
    transition: all .3s ease-out;
    opacity: .3;
}

.owl-carousel .owl-dots .owl-dot {
	width: 20px;
    height: 5px;
    border-radius: 4px;
    transition: all .3s ease-out;
    opacity: .3;
}

.owl-carousel .owl-dots .owl-dot.active { width: 45px; }

.section {
	position: relative;
	padding: 30px 0;
	overflow: hidden;
  background-color: {{$gallery_sections[0]->back_color}};
}

.nobg {

} -->

  </style>
<link href="{{ asset('lib/magnific/magnific-popup.css') }}" rel="stylesheet">
@endpush
<div class="section clearfix nobg" id="gallery">
  <div class="row justify-content-center mb-3">
    <!-- Column -->
    <div class="col-md-8 text-center">
      <h2 class="my-3">{{$gallery_sections[0]->title}}</h2>
      <h6 class="subtitle font-weight-normal">{{$gallery_sections[0]->subtitle}}</h6>
    </div>
    <!-- Column -->
    <!-- Column -->
  </div>
  <div id="image-carousel" class="owl-carousel carousel-widget" data-margin="24" data-nav="true" data-pagi="true" data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="2" data-items-xl="2" style="padding: 0 20px" data-lightbox="gallery">
@foreach($galleries_count as $slide)
    <div class="slide slide--{{$slide}}">
      <div class="carousel-column-container">

          <ul class="carousel-column column-1">
            @foreach($galleries as $element)
              @if($element->column == 1 && $element->slide == $slide)
                @if($element->type == 'image')
                  <li class="carousel-grid-item">
                    <a href="{{'storage/' . $element->object}}" title="{{$element->title}}" class="item {{$element->type}}" style="background-image: url('{{'storage/' . $element->object }}');min-height: 324px"></a>
                  </li>
                @endif
                @if($element->type == 'text')
                  <li class="carousel-grid-item">
                    <div class="item bgcolor d-flex align-items-center px-4" style="min-height: 480px; word-break: break-all;">
                      <blockquote class="blockquote border-0 mb-0">
                        <p class="mb-3 text-white">{{$element->object}}</p>
                        <footer class="blockquote-footer text-white-50 font-italic">{{$element->title}}</footer>
                      </blockquote>
                    </div>
                  </li>
                @endif
                @if($element->type == 'video')
                  <li class="carousel-grid-item">
                    <a href="{{$element->object}}" title="{{$element->title}}" id="video{{$element->id}}" class="item pop-video video{{$element->id}}" style="background-image: url('{{ 'storage/' . 'gallery/1.jpg' }}');min-height: 324px"></a>
                  </li>
                @endif

              @endif
            @endforeach
          </ul>
          <ul class="carousel-column column-2">
            @foreach($galleries as $element)
              @if($element->column == 2 && $element->slide == $slide)
                @if($element->type == 'image')
                  <li class="carousel-grid-item">
                    <a href="{{'storage/' . $element->object}}" title="{{$element->title}}" class="item {{$element->type}}" style="background-image: url('{{'storage/' . $element->object }}'); min-height: 280px"></a>
                  </li>
                @endif

                @if($element->type == 'text')
                  <li class="carousel-grid-item">
                    <div class="item bgcolor d-flex align-items-center px-4" style="min-height: 280px; word-break: break-all;">
                      <blockquote class="blockquote border-0 mb-0">
                        <p class="mb-3 text-white">{{$element->object}}</p>
                        <footer class="blockquote-footer text-white-50 font-italic">{{$element->title}}</footer>
                      </blockquote>
                    </div>
                  </li>
                @endif

                @if($element->type == 'video')
                  <li class="carousel-grid-item">
                    <a href="{{$element->object}}" title="{{$element->title}}" id="video{{$element->id}}" class="item pop-video video{{$element->id}}" style="background-image: url('{{ 'storage/' . 'gallery/1.jpg' }}');min-height: 280px"></a>
                  </li>
                @endif


              @endif
            @endforeach
          </ul>

      </div>
    </div>
@endforeach

  </div>

</div>
@push('scripts')

<!-- <script src="{{ asset('lib/jquery/plugins.js') }}"></script>
<script src="{{ asset('lib/jquery/functions.js') }}"></script>
<script>
  $(document).ready(function() {
    function youtube_parser(url){
      var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
      var match = url.match(regExp);
      if (match && match[2].length == 11) {
        return match[2];

      } else {
        //error
      }
    }
    @foreach($galleries as $element)
      @if($element->type == 'video')
        var url = $('.video{{$element->id}}').attr('href');
        var urlId = youtube_parser(url);

        $('#video{{$element->id}}').css('background-image', 'url(https://img.youtube.com/vi/' + urlId + '/0.jpg)');
        $('.video{{$element->id}}').attr('href', 'https://www.youtube.com/watch?v=' + urlId);
      @endif
      @endforeach

  });

  $('.carousel-grid-item').magnificPopup({
    delegate: 'a',
    type: 'image',
    callbacks: {
      elementParse: function(item) {
        if(item.el.hasClass("pop-video")) {
              item.type = 'iframe',
              item.iframe = {
                 patterns: {
                   youtube: {
                     index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                     id: 'v=', // String that splits URL in a two parts, second part should be %id%
                      // Or null - full URL will be returned
                      // Or a function that should return %id%, for example:
                      // id: function(url) { return 'parsed id'; }

                     src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                   },
                   vimeo: {
                     index: 'vimeo.com/',
                     id: '/',
                     src: '//player.vimeo.com/video/%id%?autoplay=1'
                   },
                   gmaps: {
                     index: '//maps.google.',
                     src: '%id%&output=embed'
                   }
                 }
              }
            } else {
                item.type = 'image',
                item.closeOnContentClick= true,
                item.closeBtnInside= false,
                item.fixedContentPos= true,
                item.mainClass= 'mfp-no-margins mfp-fade', // class to remove default margin from left and right side
                item.image= {
                  verticalFit: true
                }
            }
      }
    },
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    }
});

</script>
<!-- Footer Scripts
============================================= --> -->



@endpush
