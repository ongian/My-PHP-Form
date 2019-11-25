<?php 
	$formSubmitMsg = '';
	$msgClass = '';
	if(filter_has_var(INPUT_POST, 'submit')){
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$phone = htmlspecialchars($_POST['phone']);
		$message = htmlspecialchars($_POST['message']);

		if(!empty($name) && !empty($email) && !empty($phone) && !empty($message)){
			if(isset($_POST['submit'])){
				$toEmail = 'ongchristian117@gmail.com';
				$subject = 'Message request from' . $name;
				$body = "<h2>$subject</h2><p>Email: $email</p><p>Name: $name</p><p>Phone: $phone</p><p>Message: $message</p>";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: $name <$email>" . "\r\n";
				if(mail($toEmail, $subject, $body, $headers)){
					$formSubmitMsg = 'Your Email was sent';
					$msgClass = 'alert-success';
				} else {
					$formSubmitMsg = 'Your Email was not sent';
					$msgClass = 'alert-danger';
				}
			} else {
				$formSubmitMsg = 'Please fill-up the required fields';
				$msgClass = 'alert-danger';
			}
		}
	}
	
?>