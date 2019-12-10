@extends('layout')

@section('content')

@section('css')
<link href="{{ asset('rangeslider/rSlider.min.css') }}" rel="stylesheet"/>
@endsection

	<div class="quotation pad-global">
		<div class="container">
			<div class="title">REQUEST FOR QUOTATION</div>
			@if ($message = Session::get('success'))
		      <div class="alert alert-success alert-block">
		        <button type="button" class="close" data-dismiss="alert">×</button> 
		          <p>{{ $message }}</p>
		      </div>
		    @endif
		    <form method="post" action="{{ URL::to('/quotation-submit') }}" enctype="multipart/form-data">
			{!! csrf_field() !!}
				<div class="row">
					<div class="col-md-5 left-quotation">
						
						<div class="t">RING DETAILS</div>
						<div class="label-name">STONE</div>
						<ul class="l-tick">
							<li><input name="ring_detail[]" value="No Stone" id="no-stone" type="checkbox"><label for="no-stone">No Stone</label></li>
						  	<li><input name="ring_detail[]" value="Diamond" id="diamond" type="checkbox"><label for="diamond">Diamond</label></li>
						  	<li><input name="ring_detail[]" value="Gemstone" id="gemstone" type="checkbox"><label for="gemstone">Gemstone</label></li>
						</ul>
						
						<div class="label-name">SETTING</div>
						<ul class="l-tick">
							<li><input name="setting[]" value="No Setting" id="no-setting" type="checkbox"><label for="no-setting">No Setting</label></li>
						  	<li><input name="setting[]" value="Halo" id="halo" type="checkbox"><label for="halo">Halo</label></li>
						  	<li><input name="setting[]" value="Pave" id="pave" type="checkbox"><label for="pave">Pave</label></li>
							<li><input name="setting[]" value="Custom" id="custom" type="checkbox"><label for="custom">Custom</label></li>
						</ul>
						
						<div class="label-name">Stone Carat (Weight)</div>
						<div class="box-slider">
						    <div class="slider-container">
					            <input type="text" name="carat" id="slider" class="slider" />
					        </div>
				    	</div>
					    
						<div class="label-name">Budget (in Millions)</div>
						<div class="box-slider">
							<div class="slider-container">
					            <input type="text" name="budged" id="slider2" class="slider" />
					        </div>
					    </div>

						<div class="label-name">Style References (Optional)</div>
					    <div class="upload-image">
					        <div>Upload Photos</div>
					        <input name="image" type="file" placeholder="test" />
					    </div>
					</div>
					<div class="col-md-6 offset-md-1 right-quotation">
						<div class="t">CONTACT INFORMATION</div>
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
							<div class="g-recaptcha" data-sitekey="6LeCycYUAAAAAN5JXVOKsaaqLeS9syAeZ9SJWVyP"></div>
							@if($errors->has('g-recaptcha-response')) <div class="alert alert-danger alert-block">{{ $errors->first('g-recaptcha-response') }}</div>  @endif<br>
							<div class="text-center">
								<button type="submit" class="btn">SUBMIT</button>
							</div>
						
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('rangeslider/rSlider.min.js') }}"></script>
<script type="text/javascript">
	(function () {
        'use strict';

        var init = function () {
            var slider = new rSlider({
                target: '#slider',
                values: ['0', '0.3', '0.5', '0.7', '1', '1.5', '2', '2.5', '3+'],
                range: true,
                set: [0, 3]
            });
            var slider = new rSlider({
                target: '#slider2',
                //values: {min: 3.5, max: 30},
                values: ['3.5', '4.5', '5.5', '6.5', '7.5', '8.5', '9.5', '10.5', '11.5', '12.5', '13.5', '14.5', '15.5', '16.5', '17.5', '18.5', '19.5', '20.5', '21.5', '22.5', '23.5', '24.5', '25.5', '26.5', '27.5', '28.5', '29.5', '30+'],
                step: 1,
                range: true,
                scale: true,
                labels: false
            });
        };
        window.onload = init;
    })();
</script>
@endsection