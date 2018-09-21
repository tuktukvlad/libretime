<?php

require_once('Phpmailer.php');
require_once('Smtp.php');


$mail = new PHPMailer();

		//$mail->setLanguage('ru', 'components/');
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug = 3;
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mars.neolocation.net';  								// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'contact@minsk-house.by';              // SMTP username
		$mail->Password = 'TuktukVlad07091988';               // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to
		$mail->isHTML(true);    


		$mail->addAddress("tuktukvlad@gmail.com", "Влад");

		$sitename = "Тест";
		$time = strftime("%d-%m-%Y в %H:%M", time());

		$mail->Subject = "Тест - ".$time;

		
//$header = "Content-type: text/html; charset=\"utf-8\"\n ";

		$mail->setFrom("contact@minsk-house.by", "Misty");
		$mail->addReplyTo('contact@minsk-house.by', $sitename);




		$mail->Body =<<<EMAILBODY

Тестовое письмо
<b>{$time}</b>

EMAILBODY;

		$result = $mail->send();
		echo "<pre>";
		print_r($result);	
		echo "</pre>";

		

//mail($to, $pagetitle, $message, $header);

?>
