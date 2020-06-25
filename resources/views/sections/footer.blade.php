@if($contenidosectionfooters[0]->style == 1)
  @include('sections.footer.style1')
@elseif($contenidosectionfooters[0]->style == 2)
  @include('sections.footer.style2')
@endif
