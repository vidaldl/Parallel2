@if ($contenidosection1s[0]->carousel == 1)
  @include('sections.inicio.carousel.style1')
@endif

@if($contenidosection1s[0]->carousel == 0)
  @if($contenidosection1s[0]->style == 1)
    @include('sections.inicio.static.style1')
  @endif

  @if($contenidosection1s[0]->style == 2)
    @include('sections.inicio.static.style2')
  @endif

  @if($contenidosection1s[0]->style == 3)
    @include('sections.inicio.static.style3')
  @endif

@endif
