<div class="topmargin-sm"></div>
<div class="notopmargin nobottommargin nobottomborder" style="background-color: #fff">
	<div class="container clearfix">
		<div class="heading-block center nomargin">
			<h3>{{$portfolio_section[0]->title}}</h3>
		</div>
	</div>
</div>

<div id="portfolio-programs" class="container clearfix  mt-2">

	<div class="row">

	@if($portfolio_section[0]->filter == 1)
	<!-- Portfolio Filter
	============================================= -->
		<ul class="portfolio-filter clearfix" data-container="#portfolio">
			@if($portfolio_categories)
				<li class="activeFilter"><a href="#" data-filter="*">Todos</a></li>
			@endif
      @foreach($portfolio_categories as $category)
        <li><a href="#" data-filter=".pf-{{str_replace(' ', '', $category->name)}}">{{$category->name}}</a></li>
	    @endforeach
		</ul><!-- #portfolio-filter end -->
	@endif
	</div>
	<div class="portfolio-container">
	@if($portfolio_section[0]->filter == 1)
		<div id="portfolio" class="portfolio grid-container">
	@else
		<div id="portfolio" class="portfolio row justify-content-center">
	@endif
      @foreach($portfolio_items as $item)
        <div class="item portfolio-item col-md-3 mt-5 @foreach($item->portfolio_category->pluck('name') as $ca)pf-{{str_replace(' ', '', $ca)}} @endforeach ">
					<div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
						<div class="fbox-icon">
							@if($item->logo_link == 0)
							<a href="{{route('portfolioItems.show', $item->id)}}"><i style="background-image: url({{ '/storage/' . $item->logo }}); background-size: contain; background-repeat: no-repeat;" class="i-alt"></i></a>
							@else
								@if($item->logo_link_type == 0)
									<a href="{{$item->logo_link_address}}" target="_blank"><i style="background-image: url({{ '/storage/' . $item->logo }}); background-size: contain; background-repeat: no-repeat;" class="i-alt"></i></a>
								@else
									<a  href="#" data-toggle="modal" data-target="#fileModalPortfolio{{$item->id}}"><i style="background-image: url({{ '/storage/' . $item->logo }}); background-size: contain; background-repeat: no-repeat;" class="i-alt"></i></a>
								@endif
							@endif
						</div>
						<h3>{{$item->title}}<span class="subtitle">{{$item->subtitle}}</span></h3>
					</div>
				</div>
      @endforeach
		</div>
		<div class="row">
		<div class="pagination-container mx-auto topmargin nobottommargin">
			@if($portfolio_items->count() > 9)
				<!-- <ul class="pagination nomargin"></ul> -->
			@endif
		</div>
		</div>
	</div>



	<div class="clear"></div>

</div>
@foreach($portfolio_items as $item)
<!-- MODALS ================================================= -->
@foreach($files as $file)
@if($item->logo_link_address == 'storage/' . $file->file)
<!-- FileMODAL -->
<div class="modal fade" id="fileModalPortfolio{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog mw-100 w-75 modal-fluid modal-notify modal-info" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<div class="modal-header">
				<p class="heading lead">{{$file->display_name}}</p>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="white-text">&times;</span>
				</button>
			</div>

			<!--Body-->
			<div class="modal-body">
				@if (pathinfo($file->display_name, PATHINFO_EXTENSION) == 'pdf')
				<!-- <object class="PDFdoc" width="100%" type="application/pdf" data="{{'storage/' . $file->file}}"></object> -->

					<embed src="{{'storage/' . $file->file}}" frameborder="0" width="100%" height="600px">


				@else
				<div class="row">
					<img class="img-fluid mx-auto" height="600px" src="{{'storage/' . $file->file}}" alt="">
				</div>
				@endif
				<!-- <object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="https://www.antennahouse.com/XSLsample/pdf/sample-link_1.pdf"></object> -->
			</div>

			<!--Footer-->
			<div class="modal-footer justify-content-center">
				<a target="_blank" type="button" href="{{'storage/' . $file->file}}" class="btn btn-info text-white">Download <i class="far fa-file-pdf ml-1 text-white"></i></a>
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>
@endif
@endforeach
@endforeach
@section('script')

<!-- <script>
//this will execute on page load(to be more specific when document ready event occurs)
jQuery(document).ready(function($){

			$('.portfolio-container').pajinate({
				items_per_page : 8,
				item_container_id : '#portfolio',
				nav_panel_id : '.pagination-container ul',
				show_first_last: false
			});

			$( '.pagination a' ).click(function() {
				var t=setTimeout(function(){ $( '.flexslider .slide' ).resize(); },1000);
			});

		});
</script> -->
@endsection
