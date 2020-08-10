@extends('layout')

@section('css')
<link href="{{ asset('calender/css/pignose.calendar.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')
<style>
	.help-block {
      color: red;
	  font-size:14px;
   }
</style>
	<div class="appointment">
		<div class="img-appointment"><img src="{{ asset('images/img-ring.jpg') }}" alt="" title=""/></div>
		<div class="pos-rel">
			<div class="tbl">
				<div class="cell bg">
				</div>
				<div class="cell img" style="background: url('{{ asset('images/img-ring.jpg') }}') no-repeat center;"></div>
			</div>
			<div class="abs">
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<div class="t">BOOK AN APPOINTMENT</div>
							<div class="box">
								<div class="h1">Virtual Appointment</div>
								<div class="txt">Akzidenz-Grotesk is a sans-serif or grotesque tradition general-purpose, 'trade' sometimes been typeface sold opposed to.</div>
							</div>
							<div class="box mb0">
								<div class="h1">Type of Appointment:</div>
								<ul class="l">
									<li><a class="nav-engagement" href="{{ URL::to('/appointment-engagement') }}">Engagement Ring Consultation</a></li>
									<li><a class="nav-wedding" href="{{ URL::to('/appointment-wedding') }}">Wedding Band Consultation</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="pad60">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="box">
							<div class="h1">Type of Appointment</div>
							<div class="txt gold">Engagement Ring Consultation</div>
						</div>
						<div class="box">
							<div class="h1">Date and Time of Appointment</div>
							<div class="txt gold">
								<span class="get-text"></span> at <span class="getTime">10:00 - 12:00</span>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<form method="POST" action="{{ URL::to('/submit-wedding') }}">
						{!! csrf_field() !!}
							<div class="row">
								<div class="col-md-9 col-lg-7">
									<div class="form-group big">
										<label>Select Date of Appointment</label>
										<div class="calendar"></div>
										<div class="box"></div>
									</div>
									<input type="hidden" name="date_appointment" class="date_appointment" value="{{ old('date_appointment') }}">
								</div>
								<div class="col-lg-3 offset-lg-1">
									<div class="form-group big">
										<label>Select Time</label>
										<ul class="l-time">
											<li><a class="open"><span class="get">10:00 - 12:00</span> <img src="{{ asset('images/time.png') }}" alt="" title=""/></a></li>
											<li><a><span class="get">13:00 - 15:00</span> <img src="{{ asset('images/time.png') }}" alt="" title=""/></a></li>
											<li><a><span class="get">16:00 - 18:00</span> <img src="{{ asset('images/time.png') }}" alt="" title=""/></a></li>
										</ul>
									</div>
								</div>
								<input type="hidden" name="time_appointment" class="time_appointment" value="10:00 - 12:00">
							</div>
							<div class="t-appo">Personal Data</div>
							<div class="form-group big">
								<label for="name">Name</label>
								<input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" />
								@if($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span>  @endif
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group big">
										<label for="email">Email</label>
										<input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}"/>
										@if($errors->has('email')) <span class="help-block">{{ $errors->first('email') }}</span>  @endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group big">
										<label for="phone">Phone</label>
										<input class="form-control only-number" type="text" id="phone" name="phone" value="{{ old('phone') }}"/>
										@if($errors->has('phone')) <span class="help-block">{{ $errors->first('phone') }}</span>  @endif
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group big">
										<label for="groom-ring">Groom’s ring size</label>
										<input class="form-control only-number" type="text" id="groom-ring" name="groom_ring" value="{{ old('groom_ring') }}"/>
										@if($errors->has('groom_ring')) <span class="help-block">{{ $errors->first('groom_ring') }}</span>  @endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group big">
										<label for="bride-ring">Bride’s ring size</label>
										<input class="form-control only-number" type="text" id="bride-ring" name="bride_ring" value="{{ old('bride_ring') }}"/>
										@if($errors->has('bride_ring')) <span class="help-block">{{ $errors->first('bride_ring') }}</span>  @endif
									</div>
								</div>
							</div>
							<div class="form-group big">
								<label>Select the diamond shape(s) you are interested in (pick more than one)*</label>
								<div class="clearfix">
									<ul class="css-radio">
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Flat-band" value="Flat Band" name="checkbox_diamond[]" @if(old('checkbox_diamond')) @if(in_array("Flat Band", old('checkbox_diamond'))) checked @endif @endif>
	                                            <label for="Flat-band">Flat band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Round-Band" value="Round Band" name="checkbox_diamond[]" @if(old('checkbox_diamond')) @if(in_array("Round Band", old('checkbox_diamond'))) checked @endif @endif>
	                                            <label for="Round-Band">Round Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Knife-Edge-Band" value="Knife Edge Band" name="checkbox_diamond[]" @if(old('checkbox_diamond')) @if(in_array("Knife Edge Band", old('checkbox_diamond'))) checked @endif @endif>
	                                            <label for="Knife-Edge-Band">Knife Edge Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Infinity-Band" value="Infinity Band" name="checkbox_diamond[]" @if(old('checkbox_diamond')) @if(in_array("Infinity Band", old('checkbox_diamond'))) checked @endif @endif>
	                                            <label for="Infinity-Band">Infinity Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Half-Infinity-Band" value="Half Infinity Band" name="checkbox_diamond[]" @if(old('checkbox_diamond')) @if(in_array("Half Infinity Band", old('checkbox_diamond'))) checked @endif @endif>
	                                            <label for="Half-Infinity-Band">Half Infinity Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="2/3-Infinity-Band" value="2/3 Infinity Band" name="checkbox_diamond[]" @if(old('checkbox_diamond')) @if(in_array("2/3 Infinity Band", old('checkbox_diamond'))) checked @endif @endif>
	                                            <label for="2/3-Infinity-Band">2/3 Infinity Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="V-Band" value="V Band" name="checkbox_diamond[]" @if(old('checkbox_diamond')) @if(in_array("V Band", old('checkbox_diamond'))) checked @endif @endif>
	                                            <label for="V-Band">V Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Custom-Band" value="Custom Band" name="checkbox_diamond[]" @if(old('checkbox_diamond')) @if(in_array("Custom Band", old('checkbox_diamond'))) checked @endif @endif>
	                                            <label for="Custom-Band">Custom Band</label>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </div>
	                            @if($errors->has('checkbox_diamond')) <span class="help-block">{{ $errors->first('checkbox_diamond') }}</span>  @endif
							</div>
							<div class="form-group big">
								<label>Will you be joining by yourself or with a guest*</label>
								<ul class="css-radio block">
                                    <li>
                                        <a>
                                            <input type="radio" value="Just myself" id="Just myself" name="radio_joined" @if(old('radio_joined') == 'Just myself') checked @endif>
                                            <label for="Just myself">Just myself</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <input type="radio" value="With a partner" id="With a partner" name="radio_joined" @if(old('radio_joined') == 'With a partner') checked @endif>
                                            <label for="With a partner">With a partner</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <input type="radio" value="With a friend" id="with a friend" name="radio_joined" @if(old('radio_joined') == 'With a friend') checked @endif>
                                            <label for="with a friend">With a friend</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <input type="radio" value="With a family member" id="with a family member" name="radio_joined" @if(old('radio_joined') == 'With a family member') checked @endif>
                                            <label for="with a family member">With a family member</label>
                                        </a>
                                    </li>
                                </ul>
                                @if($errors->has('radio_joined')) <span class="help-block">{{ $errors->first('radio_joined') }}</span>  @endif
							</div>
							<div class="form-group big">
								<label for="guest-name">Guest’s Name(s)* (if none, enter none)</label>
								<input class="form-control" type="text" id="guest-name" name="guest_name" value="{{ old('guest_name') }}"/>
								@if($errors->has('guest_name')) <span class="help-block">{{ $errors->first('guest_name') }}</span>  @endif
							</div>
							<div class="form-group big">
								<label for="guest-email">Guest’s Email(s)* (if none, enter none)</label>
								<input class="form-control" type="text" id="guest-email" name="guest_email" value="{{ old('guest_email') }}"/>
								@if($errors->has('guest_email')) <span class="help-block">{{ $errors->first('guest_email') }}</span>  @endif
							</div>
							<div class="form-group big">
								<label>What would you like to achieve through this appointment? (pick more than one)</label>
								<div class="clearfix">
									<ul class="css-radio block">
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" value="Product knowledge" id="Product-knowledge" name="checkbox_achieve[]" @if(old('checkbox_achieve')) @if(in_array("Product knowledge", old('checkbox_achieve'))) checked @endif @endif>
	                                            <label for="Product-knowledge">Product knowledge</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" value="Design Consultation" id="Design-Consultation" name="checkbox_achieve[]"  @if(old('checkbox_achieve')) @if(in_array("Product Design Consultation", old('checkbox_achieve'))) checked @endif @endif>
	                                            <label for="Design-Consultation">Design Consultation</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" value="Purchase-Deal" id="Purchase-Deal" name="checkbox_achieve[]"  @if(old('checkbox_achieve')) @if(in_array("Purchase-Deal", old('checkbox_achieve'))) checked @endif @endif>
	                                            <label for="Purchase-Deal">Purchase-Deal</label>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </div>
	                            @if($errors->has('checkbox_achieve')) <span class="help-block">{{ $errors->first('checkbox_achieve') }}</span>  @endif
							</div>
							<div class="form-group big">
								<label>Have you confirmed that your contact email and phone number are correct?*</label>
								<ul class="css-radio block">
                                    <li>
                                        <a>
                                            <input type="radio" id="Yes" value="Yes" name="radio_confirm">
                                            <label for="Yes">Yes</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <input type="radio" id="No" value="No" name="radio_confirm">
                                            <label for="No">No</label>
                                        </a>
                                    </li>
                                </ul>
                                @if($errors->has('radio_confirm')) <span class="help-block">{{ $errors->first('radio_confirm') }}</span>  @endif
							</div>
							<div class="g-recaptcha" data-sitekey="6LeCycYUAAAAAN5JXVOKsaaqLeS9syAeZ9SJWVyP"></div>
							@if($errors->has('g-recaptcha-response')) <span class="help-block">{{ $errors->first('g-recaptcha-response') }}</span>  @endif<br>
							<div>
								<button type="submit" class="btn">CONFIRM MY APPOINTMENT</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if ($message_success= Session::get('success_wedding'))
    <div id="success-modal" class="modal fade" role="dialog" tabindex='-1'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-pop" data-dismiss="modal"><i class="fas fa-times"></i></div>
                <div class="t-pop">Success</div>
                <div class="bdy-pop">
                    <p>Thank you. </p>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('calender/js/pignose.calendar.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('calender/js/pignose.calendar.min.js') }}"></script>

<script type="text/javascript">
	$(function() {
		$('.nav-wedding').addClass('active');

		$('ul.l-time li a').click(function(event) {
			$('ul.l-time li a').removeClass('open')
			$(this).addClass('open');
			var getTime = $(this).find('.get').html();
			$('.txt .getTime').html(getTime);
			$('.time_appointment').val(getTime);
		});

        $('.calendar').pignoseCalendar({
            select: function(date, context){
            	var $element = context.element;
	            var $calendar = context.calendar;
	            var $box = $element.siblings('.box').show();
	            var getfull = $element.parents('.row').find('.get-text').show();
	            var text = '';

	            if (date[0] !== null) {
	                text += date[0].format('MMMM DD, YYYY');
	            }

	            if (date[0] !== null && date[1] !== null) {
	                text += ' ~ ';
	            }
	            else if (date[0] === null && date[1] == null) {
	                text += 'Nothing';
	            }

	            if (date[1] !== null) {
	                text += date[1].format('MMMM DD, YYYY');
	            }
	            
	            $('.date_appointment').val(text);
	            getfull.text(text);
            },
            disabledWeekdays: [
		        0
		    ],
			disabledDates: [
				moment().add(2, 'd').format("YYYY-MM-DD"),
				moment().add(0, 'd').format("YYYY-MM-DD"),
			],
			minDate: moment(),
        });

		var today = new Date();
		var dd = String(today.getDate() + 3).padStart(2, '0');
		var mm = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
		var yyyy = today.getFullYear();

		today = mm[today.getMonth()] + ' ' + dd + ', ' + yyyy;

		var old_today = $('.date_appointment').val();
		if(old_today){
			$('.date_appointment').val(old_today);
			$('.txt .get-text').html(old_today);
		}else{
			$('.date_appointment').val(today);
			$('.txt .get-text').html(today);
		}
	});
</script>
@if ($message_success= Session::get('success_wedding'))
<script>
    $(function() {
            $("#success-modal").modal("toggle");
    });
</script>
@endif
@endsection