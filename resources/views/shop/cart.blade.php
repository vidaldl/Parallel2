@extends('layouts.index')
@section('style')
  @include('bladeStyles.cart')
@endsection

@section('content')
  <!-- Header -->
  @include('sections.header.topage')
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1>Cart</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Shop</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cart</li>
    </ol>
  </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

  <div class="content-wrap">

    <div class="container clearfix">

      <div class="table-responsive">
        <table class="table cart">
          <thead>
            <tr>
              <th class="cart-product-remove">&nbsp;</th>
              <th class="cart-product-thumbnail">&nbsp;</th>
              <th class="cart-product-name">Product</th>
              <th class="cart-product-price">Unit Price</th>
              <th class="cart-product-quantity">Quantity</th>
              <th class="cart-product-subtotal">Total</th>
            </tr>
          </thead>
          <tbody>
            <!-- ITEMS -->
            @foreach(Cart::content() as $item)
            <tr class="cart_item">
              <td class="cart-product-remove">
                <a href="{{route('cart.delete', $item->rowId)}}" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
              </td>

              <td class="cart-product-thumbnail">

                  <a href="#"><img src="{{'/storage/' . $item->model->img_primaria}}" alt="Pink Printed Dress"></a>

              </td>

              <td class="cart-product-name">
                <a href="#">{{$item->name}}</a>
              </td>

              <td class="cart-product-price">
                <span class="amount">${{$item->price}}</span>
              </td>

              <td class="cart-product-quantity">
                <div class="quantity clearfix">
                  <form class="" action="{{route('qty.update', $item->rowId)}}" method="post">
                    @csrf
                    <a href="{{route('cart.decr', ['id' => $item->rowId, 'qty' => $item->qty])}}" class="minuses">-</a>
                    <input type="text" onchange="this.form.submit()" name="quantity" value="{{$item->qty}}" class="qty" />
                    <a href="{{route('cart.incr', ['id' => $item->rowId, 'qty' => $item->qty])}}" class="pluses">+</a>
                  </form>
                </div>
              </td>

              <td class="cart-product-subtotal">
                <span class="amount">${{$item->subtotal()}}</span>
              </td>
            </tr>
            @endforeach
            <!-- /ITEMS -->
            <!-- <tr class="cart_item">
              <td colspan="6">
                <div class="row clearfix">
                  <div class="col-lg-4 col-4 offset-lg-7 nopadding">
                    <div class="row">
                      <div class="col-lg-8">
                        <input type="text" value="" class="sm-form-control" placeholder="Enter Coupon Code.." />
                      </div>
                      <div class="col-lg-4">
                        <a href="#" class="buttonesse button-3d button-black nomargin">Apply Coupon</a>
                      </div>
                    </div>
                  </div>

                </div>
              </td>
            </tr> -->
          </tbody>

        </table>
      </div>

      <div class="row clearfix ">
        <!-- <div class="col-lg-6 clearfix">
          <h4>Calculate Shipping</h4>
          <form>
            <div class="col_full">
              <select class="sm-form-control">


              </select>
            </div>
            <div class="col_half">
              <input type="text" class="sm-form-control" placeholder="State / Country" />
            </div>

            <div class="col_half col_last">
              <input type="text" class="sm-form-control" placeholder="PostCode / Zip" />
            </div>
            <a href="#" class="buttonesse button-3d nomargin button-black">Update Totals</a>
          </form>
        </div> -->

        <div class="col-lg-6 clearfix">
          <h4>Cart Totals</h4>

          <div class="table-responsive">
            <table class="table cart">
              <tbody>
                <tr class="cart_item">
                  <td class="cart-product-name">
                    <strong>Cart Subtotal</strong>
                  </td>

                  <td class="cart-product-name">
                    <span class="amount">${{Cart::subtotal()}}</span>
                  </td>
                </tr>
                <!-- <tr class="cart_item">
                  <td class="cart-product-name">
                    <strong>Descuento</strong>
                  </td>

                  <td class="cart-product-name">
                    <span class="amount">N/A</span>
                  </td>
                </tr> -->
                <tr class="cart_item">
                  <td class="cart-product-name">
                    <strong>Impuestos</strong>
                  </td>

                  <td class="cart-product-name">
                    <span class="amount">${{Cart::tax()}}</span>
                  </td>
                </tr>
                <tr class="cart_item">
                  <td class="cart-product-name">
                    <strong>Total</strong>
                  </td>

                  <td class="cart-product-name">
                    <span class="amount colore lead"><strong>${{Cart::total()}}</strong></span>
                  </td>
                </tr>
              </tbody>

            </table>
          </div>
        </div>

        <div class="col-lg-6 clearfix">
            <div class="row" style="height: 100%">
              <a href="{{route('checkout')}}" class="button button-xlarge button-border button-fill button-green mx-auto my-auto">
                <span>Proceed to Checkout &nbsp;&nbsp;</span><i class="far fa-credit-card"></i>
              </a>
            </div>
        </div>

      </div>

    </div>

  </div>

</section><!-- #content end -->

@endsection

@include('sections.footer')
