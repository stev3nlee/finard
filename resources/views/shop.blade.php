@extends('layout')

@section('css')
<link href="{{ asset('slick/slick.css') }}" rel="stylesheet"/>
<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet"/>
@endsection

@section('content')

	<div class="shop pad-global">
		<div class="container">
			<div class="text-center quote-shop">
				<div class="t1">All styles are custom made</div>
				<div class="link">
					<a href="{{ URL::to('/quotation-form') }}"><button type="button" class="btn">REQUEST FOR QUOTATION</button></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="item-product">
						<a class="click-pop">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<ul class="l-color">
								<li><div class="bdr grey"></div></li>
								<li><div class="bdr gold"></div></li>
								<li><div class="bdr red"></div></li>
							</ul>
							<div class="nm">Engagement Ring Name</div>
							<div class="clearfix price">
								<div class="float-left">18K Gold</div>
								<div class="float-right">IDR 200M</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item-product">
						<a class="click-pop">
							<div class="img"><img src="{{ asset('images/about2.jpg') }}" alt="" title=""/></div>
							<ul class="l-color">
								<li><div class="bdr grey"></div></li>
								<li><div class="bdr gold"></div></li>
								<li><div class="bdr red"></div></li>
							</ul>
							<div class="nm">Engagement Ring Name</div>
							<div class="clearfix price">
								<div class="float-left">18K Gold</div>
								<div class="float-right">IDR 200M</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item-product">
						<a class="click-pop">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<ul class="l-color">
								<li><div class="bdr grey"></div></li>
								<li><div class="bdr gold"></div></li>
								<li><div class="bdr red"></div></li>
							</ul>
							<div class="nm">Engagement Ring Name</div>
							<div class="clearfix price">
								<div class="float-left">18K Gold</div>
								<div class="float-right">IDR 200M</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item-product">
						<a class="click-pop">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<ul class="l-color">
								<li><div class="bdr grey"></div></li>
								<li><div class="bdr gold"></div></li>
								<li><div class="bdr red"></div></li>
							</ul>
							<div class="nm">Engagement Ring Name</div>
							<div class="clearfix price">
								<div class="float-left">18K Gold</div>
								<div class="float-right">IDR 200M</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item-product">
						<a class="click-pop">
							<div class="img"><img src="{{ asset('images/about2.jpg') }}" alt="" title=""/></div>
							<ul class="l-color">
								<li><div class="bdr grey"></div></li>
								<li><div class="bdr gold"></div></li>
								<li><div class="bdr red"></div></li>
							</ul>
							<div class="nm">Engagement Ring Name</div>
							<div class="clearfix price">
								<div class="float-left">18K Gold</div>
								<div class="float-right">IDR 200M</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item-product">
						<a class="click-pop">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<ul class="l-color">
								<li><div class="bdr grey"></div></li>
								<li><div class="bdr gold"></div></li>
								<li><div class="bdr red"></div></li>
							</ul>
							<div class="nm">Engagement Ring Name</div>
							<div class="clearfix price">
								<div class="float-left">18K Gold</div>
								<div class="float-right">IDR 200M</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item-product">
						<a class="click-pop">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<ul class="l-color">
								<li><div class="bdr grey"></div></li>
								<li><div class="bdr gold"></div></li>
								<li><div class="bdr red"></div></li>
							</ul>
							<div class="nm">Engagement Ring Name</div>
							<div class="clearfix price">
								<div class="float-left">18K Gold</div>
								<div class="float-right">IDR 200M</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item-product">
						<a class="click-pop">
							<div class="img"><img src="{{ asset('images/about2.jpg') }}" alt="" title=""/></div>
							<ul class="l-color">
								<li><div class="bdr grey"></div></li>
								<li><div class="bdr gold"></div></li>
								<li><div class="bdr red"></div></li>
							</ul>
							<div class="nm">Engagement Ring Name</div>
							<div class="clearfix price">
								<div class="float-left">18K Gold</div>
								<div class="float-right">IDR 200M</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="item-product">
						<a class="click-pop">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<ul class="l-color">
								<li><div class="bdr grey"></div></li>
								<li><div class="bdr gold"></div></li>
								<li><div class="bdr red"></div></li>
							</ul>
							<div class="nm">Engagement Ring Name</div>
							<div class="clearfix price">
								<div class="float-left">18K Gold</div>
								<div class="float-right">IDR 200M</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="popup">
	<div class="popup-overlay">
		<div class="close-pop">
			<div class="img"><img src="{{ asset('images/close.svg') }}" alt="" title=""/></div>
		</div>
		<div class="popup-content">
			<div class="slider-pop">
				<div class="item">
					<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
				</div>
				<div class="item">
					<div class="img"><img src="{{ asset('images/about2.jpg') }}" alt="" title=""/></div>
				</div>
				<div class="item">
					<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
				</div>
				<div class="item">
					<div class="img"><img src="{{ asset('images/about2.jpg') }}" alt="" title=""/></div>
				</div>
			</div>
		</div>
	</div>
</div>
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
			$('.popup').addClass('open');
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