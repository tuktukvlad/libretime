<?php

require_once('Phpmailer.php');
require_once('Smtp.php');







class Application_Model_Email
{

    /**
     * Send email
     *
     * @param  string $subject
     * @param  string $message
     * @param  mixed  $to
     * @return boolean
     */
    public static function send($subject, $message, $to) {

        $mail = new PHPMailer();

        $mail->CharSet = 'utf-8';
        $mail->SMTPDebug = 3;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mars.neolocation.net';                 // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'contact@minsk-house.by';              // SMTP username
        $mail->Password = 'TuktukVlad07091988';               // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        $mail->isHTML(true);    

        $mail->setFrom('contact@minsk-house.by', SAAS_PRODUCT_BRANDING_NAME);
        $mail->addReplyTo('contact@minsk-house.by', SAAS_PRODUCT_BRANDING_NAME);

        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;

        return $mail->send();

        //$headers = sprintf('From: %s <%s>', SAAS_PRODUCT_BRANDING_NAME, LIBRETIME_EMAIL_FROM);
        //return mail($to, $subject, $message, $headers);

    }

}
