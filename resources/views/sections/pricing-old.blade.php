<div class="pricing" id="pricing">
  <div class="background">
  <div class="containerr" >
    <div class="panel pricing-table" style="border: 1px solid black;">
      <div class="row">
        <div class="pricing-plan col-md-4" >
          <div class="col-md-12">
            <img src="{{ 'storage/' . $pricings[0]->image }}" alt="" style="border-radius: 100%;" class="pricing-img">
            <h2 class="pricing-header">{{ $pricings[0]->title }}</h2>
            <ul class="pricing-features">
              <li class="pricing-features-item {{$pricings[0]->item1 ? '' : 'd-none'}}">{{ $pricings[0]->item1 }}</li>
              <li class="pricing-features-item {{$pricings[0]->item2 ? '' : 'd-none'}}">{{ $pricings[0]->item2 }}</li>
              <li class="pricing-features-item {{$pricings[0]->item3 ? '' : 'd-none'}}">{{ $pricings[0]->item3 }}</li>
              <li class="pricing-features-item {{$pricings[0]->item4 ? '' : 'd-none'}}">{{ $pricings[0]->item4 }}</li>
              <li class="pricing-features-item {{$pricings[0]->item5 ? '' : 'd-none'}}">{{ $pricings[0]->item5 }}</li>
              <li class="pricing-features-item {{$pricings[0]->item6 ? '' : 'd-none'}}">{{ $pricings[0]->item6 }}</li>
            </ul>
          </div>
          <div class="d-block d-sm-none ">
            <span class="pricing-price">{{$pricings[0]->price}}</span>
            <a href="{{$pricings[0]->link}}" class="pricing-button {{$pricings[0]->button ? '' : 'd-none'}}">{{$pricings[0]->button}}</a>
          </div>
        </div>
        <div class="pricing-plan col-md-4" >
          <div class="col-md-12">
            <img src="{{ 'storage/' . $pricings[1]->image }}" alt="" style="border-radius: 100%;" class="pricing-img">
            <h2 class="pricing-header">{{ $pricings[1]->title }}</h2>
            <ul class="pricing-features">
              <li class="pricing-features-item {{$pricings[1]->item1 ? '' : 'd-none'}}">{{ $pricings[1]->item1 }}</li>
              <li class="pricing-features-item {{$pricings[1]->item2 ? '' : 'd-none'}}">{{ $pricings[1]->item2 }}</li>
              <li class="pricing-features-item {{$pricings[1]->item3 ? '' : 'd-none'}}">{{ $pricings[1]->item3 }}</li>
              <li class="pricing-features-item {{$pricings[1]->item4 ? '' : 'd-none'}}">{{ $pricings[1]->item4 }}</li>
              <li class="pricing-features-item {{$pricings[1]->item5 ? '' : 'd-none'}}">{{ $pricings[1]->item5 }}</li>
              <li class="pricing-features-item {{$pricings[1]->item6 ? '' : 'd-none'}}">{{ $pricings[1]->item6 }}</li>
            </ul>
          </div>
          <div class="d-block d-sm-none">
            <span class="pricing-price">{{$pricings[1]->price}}</span>
            <a href="{{$pricings[1]->link}}" class="pricing-button {{$pricings[1]->button ? '' : 'd-none'}}">{{$pricings[1]->button}}</a>
          </div>
        </div>

        <div class="pricing-plan col-md-4">
          <div class="col-md-12" >
            <img src="{{ 'storage/' . $pricings[2]->image }}" style="border-radius: 100%;" alt="" class="pricing-img">
            <h2 class="pricing-header">{{ $pricings[2]->title }}</h2>
            <ul class="pricing-features">
              <li class="pricing-features-item {{$pricings[2]->item1 ? '' : 'd-none'}}">{{ $pricings[2]->item1 }}</li>
              <li class="pricing-features-item {{$pricings[2]->item2 ? '' : 'd-none'}}">{{ $pricings[2]->item2 }}</li>
              <li class="pricing-features-item {{$pricings[2]->item3 ? '' : 'd-none'}}">{{ $pricings[2]->item3 }}</li>
              <li class="pricing-features-item {{$pricings[2]->item4 ? '' : 'd-none'}}">{{ $pricings[2]->item4 }}</li>
              <li class="pricing-features-item {{$pricings[2]->item5 ? '' : 'd-none'}}">{{ $pricings[2]->item5 }}</li>
              <li class="pricing-features-item {{$pricings[2]->item6 ? '' : 'd-none'}}">{{ $pricings[2]->item6 }}</li>
            </ul>
          </div>
          <div class="d-block d-sm-none ">
            <span class="pricing-price">{{$pricings[2]->price}}</span>
            <a href="{{$pricings[2]->link}}" class="pricing-button {{$pricings[2]->button ? '' : 'd-none'}}">{{$pricings[2]->button}}</a>
          </div>
        </div>
        <div class="col-md-4 d-none d-sm-block">
            <span class="pricing-price">{{$pricings[0]->price}}</span>
            <a href="{{$pricings[0]->link}}" class="pricing-button {{$pricings[0]->button ? '' : 'd-none'}}">{{$pricings[0]->button}}</a>
        </div>
        <div class="col-md-4 d-none d-sm-block">
            <span class="pricing-price">{{$pricings[1]->price}}</span>
            <a href="{{$pricings[1]->link}}" class="pricing-button {{$pricings[1]->button ? '' : 'd-none'}}">{{$pricings[1]->button}}</a>
        </div>
        <div class="col-md-4 d-none d-sm-block">
            <span class="pricing-price">{{$pricings[2]->price}}</span>
            <a href="{{$pricings[2]->link}}" class="pricing-button {{$pricings[2]->button ? '' : 'd-none'}}">{{$pricings[2]->button}}</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
