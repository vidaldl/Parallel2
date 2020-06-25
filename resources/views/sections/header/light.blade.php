@if($menu_item[0]->menu_sticky == 1)
<header id="header" class="full-header" data-sticky-class="not-dark">
@else
<header id="header" class="full-header no-sticky" data-sticky-class="not-dark">
@endif
  <div id="header-wrap">
    <div class="container-fluid clearfix" style="padding-left: {{$menu_item[0]->padding}}px; padding-right: {{$menu_item[0]->padding}}px;">
      <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
      <!-- Logo
      ============================================= -->
      <div id="logo" {{$menu_item[0]->menu_borders == 0 ? 'style=border:none' : ''}}>
        <a href="/" class="standard-logo"><img src="{{'/storage/' . $menu_item[0]->logo}}"></a>
        <a href="/" class="retina-logo"><img src="{{'/storage/' . $menu_item[0]->logo}}" alt="Logo"></a>
      </div>
      <!-- Primary Navigation
      ============================================= -->
      <nav id="primary-menu" class="dark">
        <ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1500" {{$menu_item[0]->menu_borders == 0 ? 'style=border:none' : ''}}>
          <li><a href="#" data-href="#slider" style="font-family: {{$fonts[1]->font_name}}"><div>{{$menu_item[0]->item_inicio}}</div></a></li>
          @foreach($orders as $item)
            @if($item->display == 1 && $item->menu_display == 1)
              <li><a href="#" data-href="#{{$item->section}}" style="font-family: {{$fonts[1]->font_name}}"><div>{{$item->menu_name}}</div></a></li>
            @endif
          @endforeach
        </ul>
        <ul style="border: none;">
        @if($styles[0]->show_link_1 == '1')
          @if($styles[0]->link_mode_1 == '1')
            <li data-toggle="tooltip" data-placement="bottom" title="{{$styles[0]->custom_link_text_1}}">
              <a style="font-family: {{$fonts[1]->font_name}}" href="{!! $styles[0]->custom_link_address_1 !!}"><i style="font-size: 20px!important;" class="{{$styles[0]->custom_icon_1}} fa-2x"></i></a>
            </li>
          @elseif($styles[0]->link_mode_1 == '0')
            <li><a style="font-family: {{$fonts[1]->font_name}}" href="{!! $styles[0]->custom_link_address_1 !!}"><div>{{$styles[0]->custom_link_text_1}}</div></a></li>
          @endif
        @endif
        @if($styles[0]->show_link_2 == '1')
          @if($styles[0]->link_mode_2 == '1')
            <li data-toggle="tooltip" data-placement="bottom" title="{{$styles[0]->custom_link_text_2}}">
              <a style="font-family: {{$fonts[1]->font_name}}; " href="{!! $styles[0]->custom_link_address_2 !!}"><i style="font-size: 20px!important;" class="{{$styles[0]->custom_icon_2}}"></i></a>
            </li>
          @elseif($styles[0]->link_mode_2 == '0')
            <li><a style="font-family: {{$fonts[1]->font_name}}" href="{!! $styles[0]->custom_link_address_2 !!}"><div>{{$styles[0]->custom_link_text_2}}</div></a></li>
          @endif
        @endif
      <!-- Top Cart
  				============================================= -->
          @foreach($orders as $shop)
          @if($shop->id == 17)
          @if($shop->display == 1)
          <div id="top-cart">
  					<a href="#" id="top-cart-trigger"><i style="font-size: 20px!important;" class="icon-shopping-cart"></i><span>{{Cart::content()->count()}}</span></a>
  					@include('shop.littlecart')
  				</div>
          @endif
          @endif
          @endforeach
        </ul>


            </div>
          </div>
      </nav><!-- #primary-menu end -->
    </div>
  </div>
</header><!-- #header end -->
