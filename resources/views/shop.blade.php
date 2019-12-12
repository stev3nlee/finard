@extends('layout')

@section('css')
<link href="{{ asset('slick/slick.css') }}" rel="stylesheet"/>
<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet"/>
@endsection

@section('content')

	<h1 style="display:none"> The Finard | Daily bits and bobs in shining 18 K gold </h1>

	<div class="shop pad-global">
		<div class="container">
			<div class="text-center quote-shop">
				<div class="t1">All styles are custom made</div>
				<div class="link">
					<a href="{{ URL::to('/quotation-form') }}"><button type="button" class="btn">REQUEST FOR QUOTATION</button></a>
				</div>
			</div>
			<div class="row">
				@foreach($product as $list)
				<div class="col-md-4">
					<div class="item-product">
						<a data-id="{{ $list->id }}" class="click-pop">
							<div class="img"><img src="{{ asset('/upload/'.$list->product_image[0]->image) }}" alt="" title=""/></div>
							<ul class="l-color">
								@foreach($list->color as $val)
									<li><div class="bdr" style="background-color:{{ $val->color }}"></div></li>
								@endforeach
							</ul>
							<div class="nm">{{ $list->name }}</div>
							<div class="clearfix price">
								<div class="float-left">{{ $list->gold }}K Gold</div>
								@if($list->price)
								<div class="float-right">STARTS FROM IDR {{ number_format($list->price,0,",",".") }}</div>
								@else
								<div class="float-right">Price Upon Request</div>
								@endif
							</div>
						</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

@foreach($product as $list)
<div class="popup popupid{{ $list->id }}">
	<div class="popup-overlay">
		<div class="close-pop">
			<div class="img"><img src="{{ asset('images/close.svg') }}" alt="" title=""/></div>
		</div>
		<div class="popup-content">
			<div class="slider-pop">
				@foreach($list->product_image as $im)
				<div class="item">
					<div class="img"><img src="{{ asset('/upload/'.$im->image) }}" alt="" title=""/></div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endforeach

@endsection


@section('js')
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>

<script type="text/javascript">
	document.onkeydown = function(evt) {
	    evt = evt || window.event;
	    if (evt.keyCode == 27) {
			$('.popup').removeClass('open');
			$('.popup-overlay').removeClass('open');
			$('body').removeClass('no-scroll');
	    }
	};
	$(function() {
		$('.click-pop').click(function(event) {
			var id = $(this).data('id');
			$('.popupid'+id).addClass('open');
			$('.popup-overlay').addClass('open');
			$('body').addClass('no-scroll');
		});

		$('.close-pop').click(function(event) {
			$('.popup').removeClass('open');
			$('.popup-overlay').removeClass('open');
			$('body').removeClass('no-scroll');
		});

		$('.slider-pop').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: false,
			centerMode: false,
			arrows: true,
			infinite: true,
			autoplay: false,
			autoplaySpeed: 5000,
	        speed: 1000,
		});
	});
</script>
@endsection