<style>
/* SHOPPINGCART */


.button {
    background-color: {{$styles[0]->button_primary}};
}
.button:hover {
    background-color: {{$styles[0]->button_secondary}};
}
.cart-product-thumbnail img:hover {
  border-color: {{$styles[0]->button_primary}};
}
.buttonesse {
	display: inline-block;
	position: relative;
	cursor: pointer;
	outline: none;
	white-space: nowrap;
	margin: 5px;
	padding: 0 22px;
	font-size: 14px;
	height: 40px;
	line-height: 40px;
	background-color: {{$styles[0]->button_primary}};
	color: #FFF;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: 1px;
	border: none;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
}
.button-black { background-color: #111; }

body:not(.device-touch) .buttonesse {
	-webkit-transition: all .2s ease-in-out;
	-o-transition: all .2s ease-in-out;
	transition: all .2s ease-in-out;
}

.buttonesse:hover {
	background-color: #444;
	color: #FFF;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
}

.buttonesse.button-dark:hover { background-color: #1ABC9C; }

.buttonesse.button-3d {
	border-radius: 3px;
	border-bottom: 3px solid rgba(0,0,0,0.15);
	-webkit-transition: none;
	-o-transition: none;
	transition: none;
}

.buttonesse.button-3d:hover {
	background-color: #1ABC9C !important;
	opacity: 0.9;
}

.buttonesse.button-3d.button-light:hover,
.buttonesse.button-reveal.button-light:hover {
	text-shadow: none;
	color: #333;
}


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
.buttonesse.button-3d:hover {
	background-color: {{$styles[0]->button_secondary}} !important;
}

.button-3d.button-black:hover {
  background-color: #111 !important;
}

.colore {
    color: {{$styles[0]->button_primary}} !important;
}




</style>
