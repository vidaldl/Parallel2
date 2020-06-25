
<div class="modal-on-load" data-target="#myModal1"></div>

<!-- Modal -->
<div class="modal1 mfp-hide" id="myModal1">
@if($modals[0]->content_style == 1)
<div class="center">
	<img class="img-fluid col-md-{{$modals[0]->width}}" src="{{'/storage/' . $modals[0]->image}}" alt="">
</div>

@elseif($modals[0]->content_style == 0)
	<div class="block divcenter col-md-{{$modals[0]->width}}" style="background-color: {{$modals[0]->back_color}}">
    @if($modals[0]->image)
    <!-- <div class="center rounded" data-height-xl="456" data-height-lg="456" data-height-md="456" data-height-sm="0" data-height-xs="0" style="background-image: url({{'/storage/' . $modals[0]->image}}); background-repeat: no-repeat; background-position: center; background-size:cover;">
    </div> -->
		<div class="center" style="padding:50px;">
			<img class="img-fluid" src="{{'/storage/' . $modals[0]->image}}" alt="">
		</div>
    @endif
    @if($modals[0]->contenido)
    <div class="center" style="padding: 50px">
			{!!$modals[0]->contenido!!}
		</div>
    @endif
		<div class="center nomargin" style="padding: 60px 0;margin: 60px 0;">
      @if($modals[0]->link)
			<a href="{{$modals[0]->link}}" target="_blank" class="button button-desc modal-button">
      @else
      <a href="#" class="button button-desc modal-button" onClick="$.magnificPopup.close();return false;">
      @endif
        @if($modals[0]->button)
          <div>{{$modals[0]->button}}</div>
        @endif
        @if($modals[0]->button)
          <span class="center">{{$modals[0]->button_sub}}</span>
        @endif
      </a>
		</div>
	</div>
@endif
</div>
