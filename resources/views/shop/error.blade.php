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

    <div class="container clearfix mb-5">
    <div class="row clearfix">
      <div class="col-lg-6 offset-lg-3 clearfix">
        <div class="row justify-content-center">
          <img src="{{asset('img/shop/payment-error.png')}}" class="col-md-6" alt="">
        </div>
        <h3 class="center mt-3">Payment Voided</h3>
        <p class="center">Hubo un error con su pago vuelva a intentarlo, puede que se deba a un problema en el método de pago</p>
      </div>
    </div>

    <div class="row clearfix margintop">


      <div class="col-lg-6 offset-lg-3 clearfix">
          <div class="row" style="height: 100%">
            <a href="{{route('checkout')}}" class="button button-xlarge button-border button-fill fill-from-right button-blue mx-auto my-auto">
              <i class="far fa-retweet"></i><span>&nbsp;&nbsp; Seguir Comprando </span>
            </a>
          </div>
      </div>
    </div>


    </div>

  </div>

</section><!-- #content end -->

@endsection

@include('sections.footer')
