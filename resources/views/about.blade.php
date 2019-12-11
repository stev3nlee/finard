@extends('layout')

@section('content')

	<h1 style="display:none">The Finard | About The Finard </h1>

	<div class="about pad-global">
		<div class="container">
			<div class="title">Our Story</div>
			<div class="row">
				<div class="col-md-6 col-xl-5 order-2 order-md-1">
					<div class="bdy">
						@if($data->content) {!! $data->content !!} @endif
					</div>
				</div>
				<div class="col-md-6 offset-xl-1 order-1 order-md-2">
					<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
				</div>
			</div>
		</div>
	</div>

@endsection