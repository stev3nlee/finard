@extends('layout')

@section('content')

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 left-contact">
					<div class="t">HOW MAY WE HELP?</div>
					<div class="box">
						<div class="h1">Text us through LINE</div>
						<div class="txt">The best and fastest way to contact us anytime.</div>
						<div class="link"><a>@the.finard</a></div>
					</div>
					<div class="box">
						<div class="h1">Email us</div>
						<div class="txt">You may choose to contact us through email to:</div>
						<div class="link"><a href="mailto:@the.finard@gmail.com">@the.finard@gmail.com</a></div>
					</div>
					<div class="box mb0">
						<div class="h1">Read Our FAQ</div>
						<div class="link bdr"><a href="{{ URL::to('/faq') }}">Frequently Asked Questions</a></div>
					</div>
				</div>
				<div class="col-md-6 offset-md-1 right-contact">
					<div class="t">LEAVE A MESSAGE</div>
					 @if ($message = Session::get('success'))
				      <div class="alert alert-success alert-block">
				        <button type="button" class="close" data-dismiss="alert">×</button> 
				          <strong>{{ $message }}</strong>
				      </div>
				    @endif
					<form method="post" action="{{ URL::to('/contact-submit') }}">
						{!! csrf_field() !!}
						<div class="form-group">
							<label for="name">Name</label>
							<input class="form-control" required="required" type="text" id="name" name="name"/>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Email</label>
									<input class="form-control" required="required" type="email" id="email" name="email"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input class="form-control only-number" required="required" type="text" id="phone" name="phone"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="subject">Subject</label>
							<input class="form-control" required="required" type="text" id="subject" name="subject"/>
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea class="form-control" required="required" type="message" id="message" name="message"></textarea>
						</div>
						<div class="text-center">
							<button type="submit" class="btn">SUBMIT</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection