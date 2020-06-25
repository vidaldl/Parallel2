@extends('layouts.index')
@section('style')
  @include('bladeStyles.shop')
  @include('bladeStyles.cart')
@endsection

@section('content')
  <!-- Header -->
  @include('sections.header.topage')
  <!-- #header -->

  <!-- Page Title
		============================================= -->
  <section id="page-title">

			<div class="container clearfix">
				<h1>{{$shop_item->title}}</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/#shop">{{$menu_item[0]->item_inicio}}</a></li>
          @foreach($orders as $item)
          @if($item->section == 'shop')
					<li class="breadcrumb-item active" aria-current="page">{{$item->menu_name}}</li>
          @endif
          @endforeach
				</ol>
			</div>

		</section><!-- #page-title end -->

    <!-- Content
  ============================================= -->
  <section id="content">

    <div class="content-wrap">

      <div class="container clearfix">

        <div class="single-product">

          <div class="product">

            <div class="col_two_fifth">

              <!-- Product Single - Gallery
              ============================================= -->
              <div class="product-image">
                <div class="fslider" data-pagi="true" data-arrows="false" data-thumbs="false">
                  <div class="flexslider">
                    <div class="slider-wrap" data-lightbox="gallery">
                      @if($shop_item->img_primaria)
                      <div class="slide"><a href="{{'/storage/' . $shop_item->img_primaria}}"  data-lightbox="gallery-item"><img src="{{'/storage/' . $shop_item->img_primaria}}" alt="{{$shop_item->title}}"></a></div>
                      @endif
                      @if($shop_item->img_secundaria)
                      <div class="slide"><a href="{{'/storage/' . $shop_item->img_secundaria}}"  data-lightbox="gallery-item"><img src="{{'/storage/' . $shop_item->img_secundaria}}" alt="{{$shop_item->title}}"></a></div>
                      @endif
                    </div>
                  </div>
                </div>
                @if($shop_item->destacado == 1)
                <div class="sale-flash">{{$shop_item->destacado_title}}</div>
                @endif
              </div><!-- Product Single - Gallery End -->

            </div>

            <div class="col_three_fifth product-desc col_last">

              <!-- Product Single - Price
              ============================================= -->
              @if($shop_item->precio)
              <div class="product-price">
                @if($shop_item->destacado == 1)
                  <del>${{$shop_item->precio}}</del>
                  <ins>${{$shop_item->precio_nuevo}}</ins>
                @else
                  ${{$shop_item->precio}}
                @endif
              </div><!-- Product Single - Price End -->
              @endif
              <!-- Product Single - Rating
              ============================================= -->
              <!-- <div class="product-rating">
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star-half-full"></i>
                <i class="icon-star-empty"></i>
              </div> -->
              <!-- Product Single - Rating End -->

              <div class="clear"></div>
              <div class="line"></div>

              <!-- Product Single - Quantity & Cart Button
              ============================================= -->
              <form action="{{route('cart.add')}}" class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="pdt_id" value="{{$shop_item->id}}">
                <div class="quantity clearfix">
                  <input type="button" value="-" class="minus">
                  <input type="text" step="1" min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />
                  <input type="button" value="+" class="plus">
                </div>
                <button type="submit" class="add-to-cart button nomargin">{{$shop_item->cart_btn}}</button>
              </form><!-- Product Single - Quantity & Cart Button End -->

              <div class="clear"></div>
              <div class="line"></div>

              <!-- Product Single - Short Description
              ============================================= -->
              {!!$shop_item->details!!}
              <!-- Product Single - Short Description End -->

              <!-- Product Single - Meta
              ============================================= -->
              <div class="card product-meta">
                <div class="card-body">
                  <div class="si-share noborder clearfix">
                    <span>Share:</span>
                    <div>
                      <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="social-icon si-borderless si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                      </a>
                      <a href="https://twitter.com/home?status={{ Request::url() }}" class="social-icon si-borderless si-twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                      </a>
                      <a href="https://pinterest.com/pin/create/button/?url={{ Request::url() }}" class="social-icon si-borderless si-pinterest">
                        <i class="icon-pinterest"></i>
                        <i class="icon-pinterest"></i>
                      </a>
                      <a href="mailto:info@example.com?&subject=&body={{ Request::url() }}" class="social-icon si-borderless si-email3">
                        <i class="icon-email3"></i>
                        <i class="icon-email3"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div><!-- Product Single - Meta End -->

              <!-- Product Single - Share
              ============================================= -->
              <!-- Product Single - Share End -->

            </div>



            <div class="col_full nobottommargin">

              <div class="tabs clearfix nobottommargin" id="tab-1">

                <ul class="tab-nav clearfix">
                  <li><a><i class="icon-align-justify2"></i><span class="d-none d-md-inline-block"> Descripción</span></a></li>


                </ul>

                <div class="tab-container">

                  <div class="tab-content clearfix" id="tabs-1">
                    {!!$shop_item->description!!}

                  </div>


                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="clear"></div><div class="line"></div>

        <div class="col_full nobottommargin">

          <h4>Productos Relacionados</h4>

          <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">
          @foreach($shop_items as $item)
          @if($shop_item->img_primaria != $item->img_primaria )
            <div class="oc-item">

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
    								<a href="{{route('cart.quick.add.detail', $item->id)}}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> {{$item->cart_btn}}</span></a>
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

            </div>
          @endif
          @endforeach
          </div>

        </div>

      </div>

    </div>

  </section><!-- #content end -->

@endsection

@include('sections.footer')
