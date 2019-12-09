@extends('layout')

@section('css')
<link href="{{ asset('slick/slick.css') }}" rel="stylesheet"/>
<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet"/>
@endsection

@section('content')
	<div class="slider-banner">
		@foreach($banner as $ban)
		<div class="item">
			<div class="img"><img src="{{ asset('/upload/'.$ban->image) }}" alt="" title=""/></div>
		</div>
		@endforeach
	</div>
	<div class="banner-about">
		<div class="container">
			<?php $i=1; ?>
			@foreach($category as $cat)
			<div class="row mb100">
				<div class="col-md-6 my-auto @if($i % 2 == 0) order-1 order-md-2 @endif">
					<div class="img"><img src="{{ asset('/upload/'.$cat->image) }}" alt="" title=""/></div>
					<!-- <div class="slider-about">
						<div class="item">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
						</div>
						<div class="item">
							<div class="img"><img src="{{ asset('images/about2.jpg') }}" alt="" title=""/></div>
						</div>
					</div> -->
				</div>
				<div class="col-md-6 my-auto text-center @if($i % 2 == 0) order-2 order-md-1 @endif">
					<div class="txt">{{ $cat->description }}</div>
					<div class="nm">{{ $cat->name }}</div>
					<div class="link">
						<a href="{{ URL::to('/shop/'.$cat->slug) }}"><button type="button" class="btn">SHOP {{ strtoupper($cat->name) }}</button></a>
					</div>
				</div>
			</div>
			<?php $i++; ?>
			@endforeach

			
		</div>
	</div>
	<div class="banner-text">
		<div class="container">
			<div class="img"><img src="{{ asset('images/petik.png') }}" alt="" title=""/></div>
			<!--
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="t">Akzidenz-Grotesk is a sans-serif or grotesque tradition general-purpose, 'trade' sometimes been typeface sold opposed to in German unadorned.</div>
				</div>
			</div>
			-->
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="bdy">
						{!! $about->content !!}
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