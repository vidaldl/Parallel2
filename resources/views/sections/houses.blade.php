@push('styles')
<!-- HOUSES -->
  <link rel="stylesheet" href="{{asset('lib/CanvasTest/houses/real-estate.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('lib/CanvasTest/houses/css/font-icons.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('lib/CanvasTest/houses/fonts.css')}}" type="text/css" />

  <link rel="stylesheet" href="{{asset('lib/CanvasTest/css/components/bs-select.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('lib/CanvasTest/css/components/bs-switches.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('lib/CanvasTest/css/components/ion.rangeslider.css')}}" type="text/css" />
  <link rel="stylesheet" href="css/colors.php?color=2C3E50" type="text/css" />
@endpush
<div class="line"></div>
<div id="houses" class="" style="background-color: {{$section_properties[0]->back_color}}; padding: 25px;">


  <div class="container clearfix" >
    <div style="position: relative;">
      <div class="heading-block nobottomborder">
        <h3>{{$section_properties[0]->title}}</h3>
      </div>



      <div class="real-estate owl-carousel image-carousel carousel-widget bottommargin-lg" data-margin="10" data-nav="true" data-loop="true" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="3">

        <div class="oc-item">
          <div class="real-estate-item">
            <div class="real-estate-item-image">
              <div class="badge badge-danger bgcolor-2">For Sale</div>
              <a href="#">
                <img src="{{'storage/houses/items/1.jpg'}}" alt="Image 1">
              </a>
              <div class="real-estate-item-price">
                $1.2m<span>Leasehold</span>
              </div>
              <div class="real-estate-item-info clearfix">
                <a href="#"><i class="icon-line-stack-2"></i></a>
                <a href="#"><i class="icon-line-heart"></i></a>
              </div>
            </div>

            <div class="real-estate-item-desc">
              <h3><a href="#">3 Bedroom Villa</a></h3>
              <span>Seminyak Area</span>

              <a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

              <div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

              <div class="real-estate-item-features t500 font-primary clearfix">
                <div class="row no-gutters">
                  <div class="col-lg-4 nopadding">Beds: <span class="color">3</span></div>
                  <div class="col-lg-4 nopadding">Baths: <span class="color">3</span></div>
                  <div class="col-lg-4 nopadding">Area: <span class="color">150 sqm</span></div>
                  <div class="col-lg-4 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                  <div class="col-lg-4 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                  <div class="col-lg-4 nopadding">Cleaning: <span class="text-danger"><i class="icon-minus-sign-alt"></i></span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="oc-item">
          <div class="real-estate-item">
            <div class="real-estate-item-image">
              <div class="badge badge-success">Hot Deal</div>
              <a href="#">
                <img src="{{'storage/houses/items/2.jpg'}}" alt="Image 2">
              </a>
              <div class="real-estate-item-price">
                $200,000<span>bi-annually</span>
              </div>
              <div class="real-estate-item-info clearfix">
                <a href="#"><i class="icon-line-stack-2"></i></a>
                <a href="#"><i class="icon-line-heart"></i></a>
              </div>
            </div>

            <div class="real-estate-item-desc">
              <h3><a href="#">3 Bedroom Villa</a></h3>
              <span>Seminyak Area</span>

              <a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

              <div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

              <div class="real-estate-item-features t500 clearfix">
                <div class="row no-gutters">
                  <div class="col-lg-4 nopadding">Beds: <span class="color">3</span></div>
                  <div class="col-lg-4 nopadding">Baths: <span class="color">3</span></div>
                  <div class="col-lg-4 nopadding">Area: <span class="color">150 sqm</span></div>
                  <div class="col-lg-4 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                  <div class="col-lg-4 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                  <div class="col-lg-4 nopadding">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="oc-item">
          <div class="real-estate-item">
            <div class="real-estate-item-image">
              <div class="badge badge-danger">Long Term Rental</div>
              <a href="#">
                <img src="{{'storage/houses/items/3.jpg'}}" alt="Image 3">
              </a>
              <div class="real-estate-item-price">
                $1600<span>per month</span>
              </div>
              <div class="real-estate-item-info clearfix">
                <a href="#"><i class="icon-line-stack-2"></i></a>
                <a href="#"><i class="icon-line-heart"></i></a>
              </div>
            </div>

            <div class="real-estate-item-desc">
              <h3><a href="#">3 Bedroom Villa</a></h3>
              <span>Seminyak Area</span>

              <a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

              <div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

              <div class="real-estate-item-features t500 clearfix">
                <div class="row no-gutters">
                  <div class="col-lg-4 nopadding">Beds: <span class="color">3</span></div>
                  <div class="col-lg-4 nopadding">Baths: <span class="color">3</span></div>
                  <div class="col-lg-4 nopadding">Area: <span class="color">150 sqm</span></div>
                  <div class="col-lg-4 nopadding">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                  <div class="col-lg-4 nopadding">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                  <div class="col-lg-4 nopadding">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="text-center">
        <a href="#" class="button  btn-lg button-desc button-rounded button-border button-border-thin t500 m">
        <div>
          {{$section_properties[0]->button}}
        </div>
        <span class="text-center">{{$section_properties[0]->button_subtitle}}</span>
      </a>
    </div>
    </div>
  </div>

</div>
@push('scripts')
<!-- Bootstrap Select Plugin -->
<script src="{{ asset('lib/CanvasTest/js/components/bs-select.js') }}"></script>

<!-- Bootstrap Switch Plugin -->
<script src="{{ asset('lib/CanvasTest/js/components/bs-switches.js') }}"></script>

<!-- Range Slider Plugin -->
<script src="{{ asset('lib/CanvasTest/js/components/rangeslider.min.js') }}"></script>
@endpush
