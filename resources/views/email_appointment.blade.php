<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>APPOINTMENT FORM</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000000;line-height: 24px;">
	<div style="width:600px;margin:0 auto; border:1px solid #000; padding:20px 40px;">
		<div style="text-align: center;padding: 10px 0;">
			<a href="#">
				<img src="{{ asset('images/logo.png') }}" style="width: 100px;" />
			</a>
		</div>
		<div style="margin-bottom: 20px;">
			<p>Hi Admin,</p>
		</div>
		<div>
			<p>{{ $data->name }} sent an appointment form.</p>
		</div>
		<div>
			<p>Please check the following details:</p>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Appointment Type :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->type }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Email Address :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->email }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Name :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->name }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Phone Number :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->phone }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Date of Appointment :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ date('d F Y', strtotime($data->date)) }}, {{ $data->time }}</p>
				</div>
			</div>
			@if($data->type == 'Wedding Band Consultation')
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Groom's ring size :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->grooms_ring_size }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Bride's ring size :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->brides_ring_size }}</p>
				</div>
			</div>
			@endif
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Diamond shape(s) you are interested :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->diamond_shapes }}</p>
				</div>
			</div>
			@if($data->type == 'Engagement Ring Consultation')
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">esired carat weight :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->carat_weight }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Styles you are interested :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->style }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Budget :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->budget }}</p>
				</div>
			</div>
			@endif
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Will you be joining by yourself or with a guest :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->with_guest }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Guest’s Name :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->guest_name }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Guest’s Email :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->guest_email }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">What would you like to achieve through this appointment? :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $data->achieve }}</p>
				</div>
			</div>
		</div>
		<div style="padding: 15px 0;font-size:12px;">
			<!--
			<div>
				<p style="font-style: italic;color: #797979;">Note: Please do not reply this emaiil as this email is auto generated system.</p>
			</div>
			-->
			<p style="margin: 0;">Regards,</p>
			<p style="margin: 0;">The Finard</p>
			<p style="margin: 0;"><a href="https://www.thefinard.com" target="_blank" style="color: #0080ff;">https://www.thefinard.com</a></p>
		</div>
	</div>
</body>
</html>