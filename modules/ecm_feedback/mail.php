<?php
include(dirname(__FILE__) . '/../../config/config.inc.php');
	//declare our assets
	$name = stripcslashes($_POST['name']);
	$emailAddr = stripcslashes($_POST['email']);
	$comment = stripcslashes($_POST['message']);
	$subject = stripcslashes($_POST['subject']);
        $page = stripcslashes($_POST['page']);
        $headers = "From: \"$name\" <$emailAddr>\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
	$contactMessage =
"Имя отправителя: $name <$emailAddr>

$comment

Письмо отправлено со страницы: $page
IP отправителя: $_SERVER[REMOTE_ADDR]";

		//send the email
		mail(Configuration::get('_TO_'), $subject, $contactMessage, $headers);
		echo('success'); //return success callback
?>
