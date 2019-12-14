@extends('layout')

@section('content')

@section('css')
	<style>
		h1 { display:none; }
	</style>
@endsection

	<h1>The Finard | Finard's Journal </h1>

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