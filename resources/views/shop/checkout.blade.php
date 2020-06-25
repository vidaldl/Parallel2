@extends('layouts.index')
@section('style')
  @include('bladeStyles.cart')
<style media="screen">
/* STRIPE */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
/* STRIPE */

</style>
@endsection

@section('content')
  <!-- Header -->
  @include('sections.header.topage')
<!-- Page Title
============================================= -->
<script src="https://js.stripe.com/v3/"></script>
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
      @if(session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      @if(session()->has('error'))
        <div class="alert alert-danger">
          {{ session()->get('error') }}
        </div>
      @endif
    <div class="row clearfix">

      <div class="table-responsive col-md-6 clearfix">

        <table class="table cart">
          <thead>
            <tr>
              <th class="cart-product-remove">&nbsp;</th>
              <th class="cart-product-thumbnail">&nbsp;</th>
              <th class="cart-product-name">Product</th>
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



              <td class="cart-product-quantity">
                <div class="quantity clearfix">
                  <form class="" action="{{route('qty.update', $item->rowId)}}" method="post">
                    @csrf

                      <input type="text" onchange="this.form.submit()" name="quantity" value="{{$item->qty}}" class="qty" />

                  </form>
                </div>
              </td>

              <td class="cart-product-subtotal">
                <span class="amount">${{$item->subtotal()}}</span>
              </td>
            </tr>
            @endforeach
            <!-- /ITEMS -->

          </tbody>

        </table>
      </div>
      <div class="col-lg-6 clearfix">
        <h4>Total del Carrito</h4>

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
              <tr class="cart_item">
                <td class="cart-product-name">
                  <strong>Shipping</strong>
                </td>

                <td class="cart-product-name">
                  <span class="amount">Free Delivery</span>
                </td>
              </tr>
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
    </div>

      <div class="row clearfix">


        <div class="col-lg-6 clearfix">
          <h4>PayPal</h4>
          <a href="{{route('paypal.express-checkout')}}" style="color:white;" class="button button-rounded button-reveal button-xlarge"><i class="fab fa-paypal"></i><span>Paypal</span></a>
          <!-- ['recurring' => true] -->

        </div>

        <div class="col-lg-6 clearfix">
          <h4>Tarjeta</h4>


          <form action="{{route('checkout.pay')}}" method="post" id="payment-form">
            @csrf

            <div class="flex-column">
              <div class="form-group">
                <label for="name">Nombre Completo <small>*</small></label>
                <input type="name" id="name" name="name" class="required email sm-form-control @error('name') is-invalid @enderror" />
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email <small>*</small></label>
                <input type="email" id="email" name="email" class="required email sm-form-control @error('email') is-invalid @enderror" />
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="hidden" name="total" value="{{Cart::total()}}">
                <label for="card-element">
                  Credito o Débito
                </label>
                <div id="card-element">
                  <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
              </div>
            </div>

            <button type="submit" class="buttonesse button-3d notopmargin fleft">Pagar</button>
          </form>
          <script>

            // Create a Stripe client.
            var stripe = Stripe('pk_test_ZL56StncKlRkVE5JU1tNW0Y500TQTAdGlz');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
            base: {
              color: '#32325d',
              fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
              fontSmoothing: 'antialiased',
              fontSize: '16px',
              '::placeholder': {
                color: '#aab7c4'
              }
            },
            invalid: {
              color: '#fa755a',
              iconColor: '#fa755a'
            }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {style: style});

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
              displayError.textContent = event.error.message;
            } else {
              displayError.textContent = '';
            }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
              if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
              } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
              }
            });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
            }

          </script>

        </div>
      </div>

    </div>

  </div>

</section><!-- #content end -->

@endsection

@include('sections.footer')

@section('script')

@endsection
