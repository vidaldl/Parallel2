@if($orders->find(17)->display == 1)
<div class="top-cart-content">
  <div class="top-cart-title">
    <h4 style="color: #444;">Carrito</h4>
  </div>

  <div class="top-cart-items" style="max-height: 500px; overflow: scroll;">
    @if(Cart::count() > 0)
    @foreach(Cart::content() as $item)
        <div class="top-cart-item clearfix">

          <div class="top-cart-item-image">
               <a href="{{route('shop.show', $item->id)}}"><img src="{{'/storage/' . $item->model->img_primaria}}" /></a>

          </div>
          <div class="top-cart-item-desc">
            <a href="{{route('shop.show', $item->id)}}" style="color: #444;">{{$item->name}}</a>
            <span class="top-cart-item-price">${{$item->price}}</span>
            <span class="top-cart-item-quantity">x {{$item->qty}}</span>
          <div class="row">
            <div class="col-lg-1">
              <a href="{{route('cart.delete', $item->rowId)}}" style="color:red;" class="remove" title="Remove this item"><span class="icon-trash2"></span></a>
            </div>
          </div>
          </div>
        </div>

    @endforeach
    @else
      <div class="top-cart-item clearfix text-center">
        <p style="color: #444;">No hay Artículos</p>
      </div>
    @endif
  </div>
  <div class="top-cart-action clearfix">
    <span class="fleft top-checkout-price">${{Cart::subtotal()}}</span>
    <a href="{{route('cart')}}" style="color: white;" class="button button-3d button-small nomargin fright">Ver Carrito</a>
  </div>
</div>
@endif
