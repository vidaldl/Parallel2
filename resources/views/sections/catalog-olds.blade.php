<div class="container clearfix" id="catalog">
  @if($catalog_sections[0]->title)
    <div class="notopmargin nobottommargin nobottomborder" style="background-color: #fff">
      <div class="container clearfix">
        <div class="heading-block center nomargin">
          @if($catalog_sections[0]->title_link)
          <a target="_blank" href="{{$catalog_sections[0]->title_link}}"><h3>{{$catalog_sections[0]->title}}</h3></a>
          @else
          <h3>{{$catalog_sections[0]->title}}</h3>
          @endif
        </div>
      </div>
    </div>
  @endif


  <div id="shop" class="shop grid-container clearfix" data-layout="fitRows">
    @foreach($catalog_items as $item)
      <div class="product clearfix">
    		<div class="product-image">
          @if($item->img_primaria)
    			<a href="#"><img src="{{'/storage/' . $item->img_primaria}}" alt="Checked Short Dress"></a>
          @endif
          @if($item->img_secundaria)
          <a href="#"><img src="{{'/storage/' . $item->img_secundaria}}" alt="Checked Short Dress"></a>
          @endif
          @if($item->destacado == 1)
          <div class="sale-flash">50% Off*</div>
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
</div>
