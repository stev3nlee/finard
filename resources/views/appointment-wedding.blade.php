@extends('layout')

@section('css')
<link href="{{ asset('calender/css/pignose.calendar.min.css') }}" rel="stylesheet"/>
@endsection

@section('content')

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
						<form>
							<div class="row">
								<div class="col-md-9 col-lg-7">
									<div class="form-group big">
										<label>Select Date of Appointment</label>
										<div class="calendar"></div>
										<div class="box"></div>
									</div>
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
							</div>
							<div class="t-appo">Personal Data</div>
							<div class="form-group big">
								<label for="name">Name</label>
								<input class="form-control" type="text" id="name" name="name"/>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group big">
										<label for="email">Email</label>
										<input class="form-control" type="text" id="email" name="email"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group big">
										<label for="phone">Phone</label>
										<input class="form-control only-number" type="text" id="phone" name="phone"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group big">
										<label for="groom-ring">Groom’s ring size</label>
										<input class="form-control only-number" type="text" id="groom-ring" name="groom-ring"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group big">
										<label for="bride-ring">Bride’s ring size</label>
										<input class="form-control only-number" type="text" id="bride-ring" name="bride-ring"/>
									</div>
								</div>
							</div>
							<div class="form-group big">
								<label>Select the diamond shape(s) you are interested in (pick more than one)*</label>
								<div class="clearfix">
									<ul class="css-radio">
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Flat-band" name="checkbox-diamond">
	                                            <label for="Flat-band">Flat band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Round-Band" name="checkbox-diamond">
	                                            <label for="Round-Band">Round Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Knife-Edge-Band" name="checkbox-diamond">
	                                            <label for="Knife-Edge-Band">Knife Edge Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Infinity-Band" name="checkbox-diamond">
	                                            <label for="Infinity-Band">Infinity Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Half-Infinity-Band" name="checkbox-diamond">
	                                            <label for="Half-Infinity-Band">Half Infinity Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="2/3-Infinity-Band" name="checkbox-diamond">
	                                            <label for="2/3-Infinity-Band">2/3 Infinity Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="V-Band" name="checkbox-diamond">
	                                            <label for="V-Band">V Band</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Custom-Band" name="checkbox-diamond">
	                                            <label for="Custom-Band">Custom Band</label>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </div>
							</div>
							<div class="form-group big">
								<label>Will you be joining by yourself or with a guest*</label>
								<ul class="css-radio block">
                                    <li>
                                        <a>
                                            <input type="radio" id="Just myself" name="radio-joined">
                                            <label for="Just myself">Just myself</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <input type="radio" id="With a partner" name="radio-joined">
                                            <label for="With a partner">With a partner</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <input type="radio" id="with a friend" name="radio-joined">
                                            <label for="with a friend">With a friend</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <input type="radio" id="with a family member" name="radio-joined">
                                            <label for="with a family member">With a family member</label>
                                        </a>
                                    </li>
                                </ul>
							</div>
							<div class="form-group big">
								<label for="guest-name">Guest’s Name(s)* (if none, enter none)</label>
								<input class="form-control" type="text" id="guest-name" name="guest-name"/>
							</div>
							<div class="form-group big">
								<label for="guest-email">Guest’s Email(s)* (if none, enter none)</label>
								<input class="form-control" type="text" id="guest-email" name="guest-email"/>
							</div>
							<div class="form-group big">
								<label>What would you like to achieve through this appointment? (pick more than one)</label>
								<div class="clearfix">
									<ul class="css-radio block">
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Product knowledge" name="checkbox-achieve">
	                                            <label for="Product knowledge">Product knowledge</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Design consultation" name="checkbox-achieve">
	                                            <label for="Design consultation">Design consultation</label>
	                                        </a>
	                                    </li>
	                                    <li>
	                                        <a>
	                                            <input type="checkbox" id="Purchase deal" name="checkbox-achieve">
	                                            <label for="Purchase deal">Purchase deal</label>
	                                        </a>
	                                    </li>
	                                </ul>
	                            </div>
							</div>
							<div class="form-group big">
								<label>Have you confirmed that your contact email and phone number are correct?*</label>
								<ul class="css-radio block">
                                    <li>
                                        <a>
                                            <input type="radio" id="Yes" name="radio-confirm">
                                            <label for="Yes">Yes</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <input type="radio" id="No" name="radio-confirm">
                                            <label for="No">No</label>
                                        </a>
                                    </li>
                                </ul>
							</div>
							<div>
								<button type="submit" class="btn">CONFIRM MY APPOINTMENT</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

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

		$('.txt .get-text').html(today);
	});
</script>
@endsection