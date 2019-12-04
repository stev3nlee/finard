@extends('layout')

@section('content')

	<div class="faq pad-global">
		<div class="container">
			<div class="title">FAQ</div>
			<div class="row">
				<div class="col-md-10 offset-md-1 col-lg-7 offset-lg-2">
					<div class="accordion">
						@foreach($data as $list)
						<div class="mb30">
							<div class="t">{{ $list->name }}</div>
							@foreach($list->faq as $val)
							<div class="box">
								<div class="nm">
									<a data-toggle="collapse" href="#ordere{{ $val->id }}"> {{ $val->question }}</a>
								</div>
								<div id="ordere{{ $val->id }}" class="collapse">
									<div class="bdy">
										<p>{{ $val->answer }}</p>
									</div>
								</div>
							</div>
							@endforeach
							
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection