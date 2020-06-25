<!-- <section id="links" class="links" style="background-color: {{$link_sections[0]->back_color}}; border-top: 1px solid #E1E4EA">
  <div class="container">
    <div class="row links-title">
      <h3 style="margin-left: 0px;">{{$link_sections[0]->title}}</h3>
    </div>
    <div class="row mt-5" >
      @foreach($links as $link)
      <div class="col-md-2 mb-3">
        <ul class="links-list text-center">
          <li class="mb-1"><a href="{{$link->link}}"><img src="{{'/storage/' . $link->image}}" height="70" /></a></li>
          <li><a href="{{$link->link}}"><h6 class="links-header mb-0">{{$link->title}}</h6></a></li>
        </ul>
      </div>
      @endforeach
    </div>
  </div>
</section> -->
<section class="bottommargin" id="links">
<h3 class="center">{{$link_sections[0]->title}}</h3>
  <div class="container clearfix">
    <ul class="clients-grid nobottommargin clearfix row justify-content-center">
      @foreach($links as $link)
    	<li class="col-md-2">
        <a class="text-center" href="{{$link->link}}"><img src="{{'/storage/' . $link->image}}" alt="Clients">{{$link->title}}</a>
      </li>
    	@endforeach
    </ul>
  </div>
</section>
