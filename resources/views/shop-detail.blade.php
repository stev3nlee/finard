@extends('layout')

@section('css')
<link href="{{ asset('slick/slick.css') }}" rel="stylesheet"/>
<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet"/>
@endsection

@section('content')

	<div class="shop pad-global">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 xs20">
					<div class="slider-product">
						<div class="item">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
						</div>
						<div class="item">
							<div class="img"><img src="{{ asset('images/about2.jpg') }}" alt="" title=""/></div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="detail">
						<div class="nm">Thin Fancy Band</div>
						<div class="price">IDR 200M</div>
						<div class="color">Available colors</div>
						<div>
							<ul class="l-color inline">
								<li><div class="bdr grey active"><i class="fas fa-check"></i></div></li>
								<li><div class="bdr gold"><i class="fas fa-check"></i></div></li>
								<li><div class="bdr red"><i class="fas fa-check"></i></div></li>
							</ul>
							<div class="point">18K Gold</div>
						</div>
						<div class="nav" role="tablist">
							<a class="nav-item nav-link active" id="nav-desc-tab" data-toggle="tab" href="#nav-desc" role="tab" aria-controls="nav-desc" aria-selected="true">Description</a>
							<a class="nav-item nav-link" id="nav-size-tab" data-toggle="tab" href="#nav-size" role="tab" aria-controls="nav-size" aria-selected="false">Size chart</a>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">Akzidenz-Grotesk is a sans-serif or grotesque tradition general-purpose, 'trade' sometimes been typeface sold opposed to in German unadorned of use type metal contemporary Gestalt Bauhaus narrow.</div>
							<div class="tab-pane fade" id="nav-size" role="tabpanel" aria-labelledby="nav-size-tab">To know about your size, please refer to this size chart.</div>
						</div>
						<ul class="l-btn">
							<li>
								<a href="#"><button type="button" class="btn transparent">Order by email</button></a>
							</li>
							<li class="or">OR</li>
							<li>
								<a href="#"><button type="button" class="btn transparent">Chat us through LINE@</button></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>

<script type="text/javascript">
	$(function() {
		$('.slider-banner').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			centerMode: false,
			arrows: false,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 4000,
	        speed: 1500,
		});

		$('.slider-product').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			centerMode: false,
			arrows: false,
			infinite: false,
			autoplay: true,
			autoplaySpeed: 5000,
	        speed: 1000,
		});
	});
</script>
@endsection