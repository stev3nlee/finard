@extends('layout')

@section('css')
<link href="{{ asset('slick/slick.css') }}" rel="stylesheet"/>
<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet"/>
@endsection

@section('content')
	<div class="slider-banner">
		<div class="item">
			<div class="img"><img src="{{ asset('images/banner.jpg') }}" alt="" title=""/></div>
		</div>
		<div class="item">
			<div class="img"><img src="{{ asset('images/banner.jpg') }}" alt="" title=""/></div>
		</div>
		<div class="item">
			<div class="img"><img src="{{ asset('images/banner.jpg') }}" alt="" title=""/></div>
		</div>
	</div>
	<div class="banner-about">
		<div class="container">
			<div class="row mb100">
				<div class="col-md-6 my-auto">
					<div class="slider-about">
						<div class="item">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
						</div>
						<div class="item">
							<div class="img"><img src="{{ asset('images/about2.jpg') }}" alt="" title=""/></div>
						</div>
					</div>
				</div>
				<div class="col-md-6 my-auto text-center">
					<div class="txt">Reserved for something special</div>
					<div class="nm">Engagement Rings</div>
					<div class="link">
						<a href="{{ URL::to('/shop') }}"><button type="button" class="btn">SHOP ENGAGEMENT RINGS</button></a>
					</div>
				</div>
			</div>
			<div class="row mb100">
				<div class="col-md-6 my-auto order-1 order-md-2">
					<div class="img"><img src="{{ asset('images/about2.jpg') }}" alt="" title=""/></div>
				</div>
				<div class="col-md-6 my-auto text-center order-2 order-md-1">
					<div class="txt">For your special day</div>
					<div class="nm">Wedding Band</div>
					<div class="link">
						<a href="{{ URL::to('/shop') }}"><button type="button" class="btn">SHOP WEDDING</button></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 my-auto">
					<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
				</div>
				<div class="col-md-6 my-auto text-center">
					<div class="txt">Everyday Essentials</div>
					<div class="nm">Jewelry</div>
					<div class="link">
						<a href="{{ URL::to('/shop') }}"><button type="button" class="btn">SHOP JEWELRY</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="banner-text">
		<div class="container">
			<div class="img"><img src="{{ asset('images/petik.png') }}" alt="" title=""/></div>
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="t">Akzidenz-Grotesk is a sans-serif or grotesque tradition general-purpose, 'trade' sometimes been typeface sold opposed to in German unadorned.</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="bdy">
						<p>Sometimes been typeface sold opposed to in German unadorned of use type metal contemporary Gestalt Bauhaus narrow. Due to Neuzeit S blends Klavika but genre Goudy Sans their for often for headings nearly-exactly to be the folded-up for example.</p>
					</div>
					<div class="link"><a href="{{ URL::to('/about') }}">Our Story</a></div>
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

		$('.slider-about').slick({
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