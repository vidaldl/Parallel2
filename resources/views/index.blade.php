@extends('layouts.index')

@section('style')
  @include('indexStyle')
@endsection

@section('content')

  <!-- Header -->
  @if($menu_item[0]->menu_style == 0)
    @include('sections.header.light')
    <!--INICIO-->
    @include('sections.inicio')
    <!--/INICIO -->
  @elseif($menu_item[0]->menu_style == 1)
    @include('sections.header.transparent')
    <!--INICIO-->
    @include('sections.inicio')
    <!--/INICIO -->
  @endif
  <!-- #header -->


  @if($menu_item[0]->menu_style == 2 || $menu_item[0]->menu_style == 3)
<div id="wrapper" class="clearfix">
    <!--INICIO-->
    @include('sections.inicio')
    <!--/INICIO -->
    @include('sections.header.bottom')
  @endif

  <div id="content" style="margin-bottom: 0px;">

    @foreach($orders as $order)
      @php
        $path = 'sections.' . $order->section ;
      @endphp
      @if($order->display == 1)
        @if($order->line == 1)
          @if($order->line_style == 1)
            <div class="container">
              <div class="line"></div>
            </div>
          @elseif($order->line_style == 2)
            <div class="line"></div>
          @endif
        @elseif($order->line == 2)
          <div class="topmargin-lg"></div>
        @endif
        @include($path)
      @endif
    @endforeach

    @if($contenidosectionfooters[0]->line == 1)
      @if($contenidosectionfooters[0]->line_style == 1)
        <div class="container">
          <div class="line"></div>
        </div>
      @elseif($contenidosectionfooters[0]->line_style == 2)
        <div class="line"></div>
      @endif
    @elseif($contenidosectionfooters[0]->line == 2)
      <div class="topmargin-lg"></div>
    @endif

</div>
@if($menu_item[0]->menu_style == 2 || $menu_item[0]->menu_style == 3)
</div>
@endif
<!-- END <div id="wrapper" class="clearfix"> -->
@endsection


<!--Footer-->
@include('sections.footer')
<!--/Footer-->



@section('script')
<script type="text/javascript">

  $(document).ready(function() {

    $(".lol").each(function () {
      len=$(this).text().length;
      str= $(this).text().substr(0,130);
      lastIndexOf = str.lastIndexOf(" ");
      if(len>130) {
          $(this).text(str.substr(0, lastIndexOf) + '...');
      }
    });
    $('.flexslider').flexslider({
  animation: "slide"
});
  });

  $(window).load(function() {
    var height1 = $('.imageH').height();
    var height2 = $('.btnH').height();
    var sum = height1 - height2 - height2;
    $('.textHeight').css('min-height', sum + 'px');
    var windowWidth = $(window).width();

    if (windowWidth < 768) {
      $('#btnH').addClass('mt-5')
    }
  });

</script>

@endsection
