@extends('layout')

@section('content')

	<div class="about pad-global">
		<div class="container">
			<div class="title">Our Story</div>
			<div class="row">
				<div class="col-md-6 col-xl-5 order-2 order-md-1">
					<div class="bdy">
						{!! $data->content !!}
					</div>
				</div>
				<div class="col-md-6 offset-xl-1 order-1 order-md-2">
					<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
				</div>
			</div>
		</div>
	</div>

@endsection