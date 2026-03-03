<?php
	if (empty($_POST['name_16582']) && strlen($_POST['name_16582']) == 0 || empty($_POST['email_16582']) && strlen($_POST['email_16582']) == 0 || empty($_POST['message_16582']) && strlen($_POST['message_16582']) == 0)
	{
		return false;
	}
	
	$name_16582 = $_POST['name_16582'];
	$email_16582 = $_POST['email_16582'];
	$message_16582 = $_POST['message_16582'];
	
	// Create Message	
	$to = 'receiver@yoursite.com';
	$email_subject = "Message from a Blocs website.";
	$email_body = "You have received a new message. \n\nName_16582: $name_16582 \nEmail_16582: $email_16582 \nMessage_16582: $message_16582 \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: contact@yoursite.com\r\n";
	$headers .= "Reply-To: $email_16582";

	// Post Message
	if (function_exists('mail'))
	{
		$result = mail($to,$email_subject,$email_body,$headers);
	}
	else // Mail() Disabled
	{
		$error = array("message" => "The php mail() function is not available on this server.");
	    header('Content-Type: application/json');
	    http_response_code(500);
	    echo json_encode($error);
	}	
?>