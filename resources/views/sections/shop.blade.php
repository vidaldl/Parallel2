<div class="container clearfix" id="shop">
	@if($shop_sections[0]->title)
		<div class="notopmargin nobottommargin nobottomborder" style="background-color: #fff">
			<div class="container clearfix">
				<div class="heading-block center nomargin">
					@if($shop_sections[0]->title_link)
					<a target="_blank" href="{{$shop_sections[0]->title_link}}"><h3>{{$shop_sections[0]->title}}</h3></a>
					@else
					<h3>{{$shop_sections[0]->title}}</h3>
					@endif
				</div>
			</div>
		</div>
	@endif

@if($shop_sections[0]->style == 0)
	<div>
	  <!-- <h4>Related Products</h4> -->
	  <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-loop="false" data-margin="30" data-pagi="false"  data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">
      @foreach($shop_items->chunk($shop_sections[0]->rows) as $shop_items_chunk)
      <div class="oc-item">
        @foreach($shop_items_chunk as $item)

          <div class="product iproduct clearfix">
            <div class="product-image">
              @if($item->img_primaria)
              <a href="{{route('shop.show', $item->id)}}"><img src="{{'/storage/' . $item->img_primaria}}" alt="Checked Short Dress"></a>
              @endif
              @if($item->img_secundaria)
              <a href="{{route('shop.show', $item->id)}}"><img src="{{'/storage/' . $item->img_secundaria}}" alt="Checked Short Dress"></a>
              @endif
              @if($item->destacado == 1)
              <div class="sale-flash">{{$item->destacado_title}}</div>
              @endif
              <div class="product-overlay" data-lightbox="gallery">
								<a href="{{route('cart.quick.add', $item->id)}}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> {{$item->cart_btn}}</span></a>
                @if($item->img_primaria)
                  <a href="{{'/storage/' . $item->img_primaria}}" class="item-quick-view" data-lightbox="gallery-item"><i class="{{$item->img_icon}}"></i><span>&nbsp;{{$item->img_btn}}</span></a>
                @endif
                @if($item->img_secundaria)
                  <a href="{{'/storage/' . $item->img_secundaria}}" class="item-quick-view" data-lightbox="gallery-item"><i class="{{$item->img_icon}}"></i><span>&nbsp;{{$item->img_btn}}</span></a>
                @endif

              </div>
            </div>
            <div class="product-desc center">
              <div class="product-title"><h3><a href="{{route('shop.show', $item->id)}}">{{$item->title}}</a></h3></div>
                @if($item->precio)
                  <div class="product-price">
                    @if($item->destacado == 1)
                    <del>${{$item->precio}}</del>

                    <ins>${{$item->precio_nuevo}}</ins>
                    @else
                    ${{$item->precio}}
                    @endif
                  </div>
                @endif
                @if($item->button)
                  <div class="product-rating">
                    @if($item->link_code)
                      <a href="{{$item->button_link}}?producto={{$item->link_code}}" target="_blank" class="catalog-button3 col-md-8 mx-auto center button button-small button-rounded button-reveal button-light button-catalog3 tright"><i class="{{$item->button_icon}}"></i><span>{{$item->button}}</span></a>
                    @else
                      <a href="{{$item->button_link}}" target="_blank" class="catalog-button3 col-md-8 mx-auto center button button-small button-rounded button-reveal button-light button-catalog3 tright"><i class="{{$item->button_icon}}"></i><span>{{$item->button}}</span></a>
                    @endif
                  </div>
                @endif
            </div>
          </div>

        @endforeach
        </div>
      @endforeach
  	</div>

		</div>
	@elseif($shop_sections[0]->style == 1)
		<div id="shop" class="shop grid-container clearfix mt-4" data-layout="fitRows">
			@foreach($shop_items as $item)
				<div class="product clearfix">
					<div class="product-image">
						@if($item->img_primaria)
						<a href="#"><img src="{{'/storage/' . $item->img_primaria}}" alt="Checked Short Dress"></a>
						@endif
						@if($item->img_secundaria)
						<a href="#"><img src="{{'/storage/' . $item->img_secundaria}}" alt="Checked Short Dress"></a>
						@endif
						@if($item->destacado == 1)
						<div class="sale-flash">{{$item->destacado_title}}</div>
						@endif
						<div class="product-overlay" data-lightbox="gallery">
							@if($item->img_primaria)
							<a href="{{'/storage/' . $item->img_primaria}}" class="add-to-cart"><i class="{{$item->img_icon}}"></i><span>&nbsp;{{$item->img_btn}}</span></a>
							@endif
							@if($item->img_secundaria)
							<a href="{{'/storage/' . $item->img_secundaria}}" class="item-quick-view" data-lightbox="ajax"><i class="{{$item->img_icon}}"></i><span>&nbsp;{{$item->img_btn}}</span></a>
							@endif
						</div>
					</div>
					<div class="product-desc text-center">
						<div class="product-title"><h3><a href="#">{{$item->title}}</a></h3></div>
						@if($item->precio)
							<div class="product-price">
							@if($item->destacado == 1)
								<del>${{$item->precio}}</del>
								<ins>${{$item->precio_nuevo}}</ins>
							@else
								${{$item->precio}}
							@endif
							</div>
						@endif
						@if($item->button)
							<div class="product-rating">
							@if($item->link_code)
								<a href="{{$item->button_link}}?producto={{$item->link_code}}" target="_blank" class="catalog-button3 col-md-8 mx-auto center button button-small button-rounded button-reveal button-light button-catalog3 tright"><i class="{{$item->button_icon}}"></i><span>{{$item->button}}</span></a>
							@else
								<a href="{{$item->button_link}}" target="_blank" class="catalog-button3 col-md-8 mx-auto center button button-small button-rounded button-reveal button-light button-catalog3 tright"><i class="{{$item->button_icon}}"></i><span>{{$item->button}}</span></a>
							@endif
							</div>
						@endif
					</div>
				</div>
			@endforeach
		</div>
	@endif
</div>
