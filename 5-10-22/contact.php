<?php
	if(isset($_POST['submit']))
		
	$phone = $_POST['phone'];
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	
	$email_form = 'jmmcookies@cnycookiesoem.com';
	$email_subject = "New Form Submission";
	$email_body = "User Name: $name\n".
					"User Phone: $phone\n".
						"User Email: $visitor_email\n".
							"User Message: $message\n";
						
	$to = "jmmcookiesoem@gmail.com";
	$headers = "Form: $email_form\r\n";
	$headers .= "Reply-To: $visitor_email \r\n";
	mail($to,$email_subject,$email_body,$headers);
	echo"<script type='text/javascript'>alert('your message sent successfully');
	window.location='index.html#contact';
	</script>";

?>