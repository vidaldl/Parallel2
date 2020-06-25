<!-- FONT LINKS -->

<style>
/* SHOPPINGCART */
.product-overlay a:hover {
background-color: {{$styles[0]->button_primary}};
}

#top-cart > a > span {
background-color: {{$styles[0]->button_secondary}};
}
#top-cart .top-cart-content {
border-top: 2px solid {{$styles[0]->button_secondary}};
}

.top-cart-item-desc a:hover { color: {{$styles[0]->button_primary}} !important; }

.top-cart-action span.top-checkout-price {
	font-size: 20px;
	color: {{$styles[0]->button_secondary}};
}

.button.button-3d:hover {
	background-color: {{$styles[0]->button_secondary}} !important;
}
.product-price ins {
color: {{$styles[0]->button_primary}};
}

#top-cart > a:hover { color: {{$styles[0]->button_secondary}}; }

.owl-carousel .owl-nav [class*=owl-]:hover {
background-color: {{$styles[0]->button_secondary}} !important;
}

.product-title h3 a:hover,
.single-product .product-title h2 a:hover { color: {{$styles[0]->button_secondary}}; }

/* /SHOPPINGCART */

/* MODAL BUTTON */
.modal-button {
	color: {{$modals[0]->color}};
}

.modal-button:hover {
	background-color: {{$modals[0]->button_color_sec}};
}
/* FONTS */
body {
	font-family: '{!!$fonts[1]->font_name!!}', sans-serif;
}

#primary-menu ul li > a:hover {
	color: {{$styles[0]->button_secondary}};
}

h1,
h2,
h3,
h4,
h5,
h6 {
	font-family: '{!!$fonts[0]->font_name!!}', sans-serif;
}


/* FOOTER */
@foreach($footer_links as $item)
.social-icon{{$item->id}}:hover{
	background-color: {{$item->back_color}};
}

/* ButtonColors */
@endforeach
.dark .footer-widgets-wrap a {
    color: {{$contenidosectionfooters[0]->color}};
}
.dark .footer-widgets-wrap a:hover {
    color: {{$contenidosectionfooters[0]->color_sec}};
}

.button-catalog {
	text-shadow: none !important;
	color: {{$catalog_sections[0]->button_text_color}} !important;
}

.button-catalog2 {
	text-shadow: none !important;
	color: {{$catalog_section2s[0]->button_text_color}} !important;
}

.button-catalog3 {
	text-shadow: none !important;
	color: {{$catalog_section3s[0]->button_text_color}} !important;
}



.catalog-button {
	background-color: {{$catalog_sections[0]->button_primary}} !important;
}

.catalog-button:hover {
	background-color: {{$catalog_sections[0]->button_secondary}} !important;
}

.catalog-button2 {
	background-color: {{$catalog_sections[0]->button_primary}} !important;
}

.catalog-button2:hover {
	background-color: {{$catalog_section2s[0]->button_secondary}} !important;
}

.catalog-button3 {
	background: {{$catalog_section3s[0]->button_primary}} !important;
}

.catalog-button3:hover {
	background-color: {{$catalog_section3s[0]->button_secondary}} !important;
}

::selection {
	background: {{$styles[0]->button_secondary}};
}

::-moz-selection {
	background: {{$styles[0]->button_secondary}}; /* Firefox */
}

::-webkit-selection {
	background: {{$styles[0]->button_secondary}}; /* Safari */
}

.sale-flash {
	background-color: {{$styles[0]->button_secondary}};
}

.portfolio-filter li a:hover {
    color: {{$styles[0]->button_secondary}};
}

/* GOTOTOP */
#gotoTop:hover { background-color: {{$styles[0]->button_secondary}}; }
/* /GOTOTOP */

.button-green { background-color: {{$styles[0]->button_primary}}; }
.button-green:hover,
.button-reveal.button-green:hover,
.button-border.button-green:hover,
.button-border.button-green.button-fill:before {
	background-color: {{$styles[0]->button_secondary}} !important;
}

.portfolio-filter li.activeFilter a {
	background-color:  {{$styles[0]->button_primary}};
}

.owl-carousel .owl-dots .owl-dot {
	background-color: {{$styles[0]->button_primary}};
}

a {
    color: {{$styles[0]->button_primary}};
}

.button {
    background-color: {{$styles[0]->button_primary}};
}

.color {
    color: {{$styles[0]->button_primary}} !important;
}


.feature-box.fbox-plain .fbox-icon i,
.feature-box.fbox-plain .fbox-icon img {
    color: {{$styles[0]->button_primary}};
}

/* SECTION 1 FONT SIZE */

.slider-caption .slider-caption-h2 {
	font-size: {{$contenidosection1s[0]->title_size}}px;
}

.slider-caption .slider-caption-p {
	font-size: {{$contenidosection1s[0]->subtitle_size}}px;
}
/* SECTION 1 OVERLAY */

@foreach($contenidosection1s as $cont)

.overlay{{$cont->id}} {
    position: absolute;
    width: 100%;
    height: 100%;

    /* opacity: 0.3; */
    transition: all 0.2s ease-out;

    @if($cont->overlay < 100)
      background: rgba(0, 0, 0, 0.{{$cont->overlay}});
    @else
      background: rgba(0, 0, 0, 1);
    @endif


}

@endforeach
</style>
