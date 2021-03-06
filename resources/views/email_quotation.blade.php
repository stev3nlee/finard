<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>QUOTATION FORM</title>
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
			<p>{{ $name }} sent an quotation form.</p>
		</div>
		<div>
			<p>Please check the following details:</p>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Email Address :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $email }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Name :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $name }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Phone Number :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $phone }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Subject :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $subject }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Message :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $message_contact }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Stone :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $ring_detail }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Setting :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $setting }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Stone Carat (Weight) :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $carat }}</p>
				</div>
			</div>
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Budget (in Millions) :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;">{{ $budged }}</p>
				</div>
			</div>
			@if($image)
			<div style="display: table;width: 100%;">
				<div style="display: table-cell; width: 130px;">Style References :</div>
				<div style="display: table-cell;">
					<p style="margin: 5px;"><img src="{{ asset('/upload/'.$image) }}" width="100" height="100" /></p>
				</div>
			</div>
			@endif
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