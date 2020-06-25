<style>
body {
  font-family: '{!!$fonts[1]->font_name!!}', sans-serif;
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
  background-color: {{$styles[0]->button_primary}};
}

.portfolio-filter li a:hover {
    color: {{$styles[0]->button_secondary}};
}


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

</style>
