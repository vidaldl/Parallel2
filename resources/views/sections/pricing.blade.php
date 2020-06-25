@push('styles')
<link rel="stylesheet" href="{{ asset('lib/realCSS/specificCSS/specific.css') }}" type="text/css" />
@endpush

<div id="pricing" class="">
  <div class="container">
    <div class="heading-block nobottomborder mb-0">
      <div class="before-heading">{{$pricing_sections[0]->subtitle}}</div>
      <h2 class="nott t600 mb-0">{{$pricing_sections[0]->title}}</h2>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div id="price-carousel" class="owl-carousel carousel-widget" data-margin="30" data-nav="false" data-pagi="true" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="3">

          @foreach($pricings as $price)
          <div class="price-list shadow-sm card border-0 rounded">
            <div class="position-relative">
              <img src="{{'/storage/' . $price->image}}" alt="Featured image 1" class="card-img-top rounded-top">
            </div>
            <div class="card-body">
              @if($price->price)
              <div class="justify-content-center p-0 center">
                <h3 class="card-title mb-0">{{$price->title}}</h3>
              </div>

                <div class="price-title pb-3">${{$price->price}}<small>{{$price->recurrence}}</small></div>
              @else
              <div class="justify-content-center p-0 center">
                <h3 class="card-title mb-3">{{$price->title}}</h3>
              </div>
              @endif
              <ul class="list-group list-group-flush mb-4" style="min-height: 275px;">
                @foreach($price->pricing_item->sortByDesc('id') as $item)
                  <li class="list-group-item pl-0"><i class="icon-line-check pr-3 color"></i>{{$item->item}}</li>
                @endforeach
              </ul>
              @if(isset($price->button))
              <a href="{{$price->link}}" class="button button-rounded button-large btn-block m-0 center t500">{{$price->button}}</a>
              @endif
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
