@extends('layout')

@section('content')

	<div class="journal pad-global">
		<div class="container">
			<div class="text-center quote-shop">
				<div class="t1">Journal</div>
			</div>
			<div class="row">
				@foreach($data as $list)
				<div class="col-md-4">
					<div class="journal-list">
						<a href="{{ URL::to('/journal-detail/'.$list->slug) }}">
							<div class="img"><img src="{{ asset('/upload/'.$list->image) }}" alt="" title=""/></div>
							<div class="nm">{{ $list->title }}</div>
							<div class="dt">{{ date('d F Y',strtotime($list->date)) }}</div>
						</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection