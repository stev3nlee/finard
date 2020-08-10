<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Appointment</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #000000;line-height: 24px;">
	<div style="width:600px;margin:0 auto;background-color:#fff;">
		<div style="text-align: center;padding: 10px 0;">
			<a href="#">
				<img src="{{ asset('images/logo.png') }}" style="width: 100px;" />
			</a>
		</div>
		<div style="margin-bottom: 20px;">
			<p>Hi {{ $data->name }},</p> 
		</div>
		<div style="margin-bottom: 10px;">
			<p>Thank you for contacting us!</p>
		</div>
		<div>
			<p style="margin-bottom: 10px;">We have received your appointment and will respond to you within 3 working days. All information received will always remain confidential. Thank you.</p>
		</div>
		
		<div style="padding: 15px 0;font-size:12px;">
			<div>
				<p style="font-style: italic;color: #797979;">Note: Please do not reply this email as this email is auto generated system.</p>
			</div>
			<p style="margin: 0;">Regards,</p>
			<p style="margin: 0;">The Finard</p>
			<p style="margin: 0;"><a href="https://www.thefinard.com" target="_blank" style="color: #0080ff;">https://www.thefinard.com</a></p>
		</div>
	</div>
</body>
</html>