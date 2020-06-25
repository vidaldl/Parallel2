@extends('layouts.index')
@section('style')
  @include('bladeStyles.cart')
@endsection

@section('content')
  <!-- Header -->
  @include('sections.header.topage')


<!-- Content
============================================= -->
<section id="content">

  <div class="content-wrap">

    <div class="container clearfix">
    <div class="row clearfix">
      <div class="col-lg-6 offset-lg-3 clearfix">
        <div class="row justify-content-center">
          <img src="{{asset('img/shop/payment-success.png')}}" class="col-md-6" alt="">
        </div>
        <h3 class="center mt-3">Payment Successful</h3>
        <p class="center">Su pago ha sido exitoso y está siendo procesado, en poco tiempo recibirá un email confirmando su compra.</p>
      </div>
    </div>

    <div class="row clearfix margintop">
      <div class="col-lg-6 offset-lg-3 clearfix">
        <h4>Totales de la Orden</h4>

        <div class="table-responsive">
          <table class="table cart">
            <tbody>
              <tr class="cart_item">
                <td class="cart-product-name">
                  <strong>Metodo</strong>
                </td>

                <td class="cart-product-name">
                  <span class="amount text-capitalize">{{$receipt->card_type}}</span>
                  <span class="amount">{{$receipt->card_last4}}</span>
                </td>
              </tr>

              <tr class="cart_item">
                <td class="cart-product-name">
                  <strong>Cart Subtotal</strong>
                </td>

                <td class="cart-product-name">
                  <span class="amount">${{$receipt->subtotal}}</span>
                </td>
              </tr>

              <tr class="cart_item">
                <td class="cart-product-name">
                  <strong>Impuestos</strong>
                </td>

                <td class="cart-product-name">
                  <span class="amount">${{$receipt->tax}}</span>
                </td>
              </tr>
              <tr class="cart_item">
                <td class="cart-product-name">
                  <strong>Total</strong>
                </td>

                <td class="cart-product-name">
                  <span class="amount colore lead"><strong>${{$receipt->total}}</strong></span>
                </td>
              </tr>
            </tbody>

          </table>
        </div>
      </div>

      <div class="col-lg-6 offset-lg-3 clearfix">
          <div class="row" style="height: 100%">
            <a href="/#shop" class="button button-xlarge button-border button-fill fill-from-right button-blue mx-auto my-auto">
              <i class="far fa-shopping-bag"></i><span>&nbsp;&nbsp; Seguir Comprando </span>
            </a>
          </div>
      </div>
    </div>


    </div>

  </div>

</section><!-- #content end -->

@endsection

@include('sections.footer')
