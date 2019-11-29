@extends('layout')

@section('content')

	<div class="about pad-global">
		<div class="container">
			<div class="title">Our Story</div>
			<div class="row">
				<div class="col-md-6 col-xl-5 order-2 order-md-1">
					<div class="bdy">
						<p>The Finard officially established in 2018. It was a long running family business from our grandfather and we decided to carry on this legacy. We are specialized in custom made engagement and wedding rings, and we’d be more than happy to consult you to find the perfect piece for your loved ones.</p>
					</div>
				</div>
				<div class="col-md-6 offset-xl-1 order-1 order-md-2">
					<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
				</div>
			</div>
		</div>
	</div>

@endsection