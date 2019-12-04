@extends('layout')

@section('content')

	<div class="journal pad-global">
		<div class="container">
			<div class="text-left back">
				<a href="{{ URL::to('/journal') }}">Back to Journal Home </a>
			</div>
			<div class="text-center">
				<div class="t1">{{ $data->title }}</div>
				<div class="dt">{{ date('d F Y',strtotime($data->date)) }} / WRITTEN BY AUTHOR / IN STYLES, INSPIRATION</div>
				<div class="img"><img src="{{ asset('/upload/'.$data->image) }}" alt="" title=""/></div>
				<div class="row">
					<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
						<div class="bdy">
							{!! $data->description !!}
						</div>
					</div>
				</div>
				<div class="clearfix">
					@if($older)
					<div class="float-left">
						<div class="box-arrow">
							<a href="{{ URL::to('/journal-detail/'.$older->slug) }}">
								<div class="link-title text-left"> OLDER POST </div>
								<div class="link-desc text-left"> {{ $older->title }}  </div>
							</a>
						</div>
					</div>
					@endif

					@if($newer)
					<div class="float-right">
						<div class="box-arrow">
							<a href="{{ URL::to('/journal-detail/'.$newer->slug) }}">
								<div class="link-title text-right"> NEWER POST </div>
								<div class="link-desc text-right"> {{ $newer->title }} </div>
							</a>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection