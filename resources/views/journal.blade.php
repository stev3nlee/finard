@extends('layout')

@section('content')

	<div class="journal pad-global">
		<div class="container">
			<div class="text-center quote-shop">
				<div class="t1">Journal</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="journal-list">
						<a href="{{ URL::to('/journal-detail') }}">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<div class="nm">Lorem Ipsum Dolor Sit Amet</div>
							<div class="dt">01 January 1970</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="journal-list">
						<a href="{{ URL::to('/journal-detail') }}">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<div class="nm">Lorem Ipsum Dolor Sit Amet</div>
							<div class="dt">01 January 1970</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="journal-list">
						<a href="{{ URL::to('/journal-detail') }}">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<div class="nm">Lorem Ipsum Dolor Sit Amet</div>
							<div class="dt">01 January 1970</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="journal-list">
						<a href="{{ URL::to('/journal-detail') }}">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<div class="nm">Lorem Ipsum Dolor Sit Amet</div>
							<div class="dt">01 January 1970</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="journal-list">
						<a href="{{ URL::to('/journal-detail') }}">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<div class="nm">Lorem Ipsum Dolor Sit Amet</div>
							<div class="dt">01 January 1970</div>
						</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="journal-list">
						<a href="{{ URL::to('/journal-detail') }}">
							<div class="img"><img src="{{ asset('images/about1.jpg') }}" alt="" title=""/></div>
							<div class="nm">Lorem Ipsum Dolor Sit Amet</div>
							<div class="dt">01 January 1970</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection