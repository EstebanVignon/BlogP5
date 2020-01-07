<?php

namespace Model;

use App\Mail;
use App\View;

class MailManager
{
    public function send(array $values, string $to, string $subject)
    {
        $mail = new Mail();

        $mail->setTo($to);
        $mail->setSubject($subject);
        $mail->setName($values['name']);
        $mail->setEmail($values['email']);
        $mail->setMessage($values['message']);

        $to = $mail->getTo();
        $subject = $mail->getSubject();
        $message = '<p>Name: ' . $mail->getName() . '</p>
                    <p>Email: ' . $mail->getEmail() . '</p>
                    <p>Message:<br>' . nl2br($mail->getMessage()) . '</p>';
        $headers = 'From: ' . $mail->getTo() . "\r\n";
        $headers .= 'Reply-To: ' . $mail->getEmail() . "\r\n";
        $headers .= "X-Mailer: PHP " . phpversion() . "\n";
        $headers .= "X-Priority: 1 \n";
        $headers .= "Mime-Version: 1.0\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "Content-type: text/html; charset= utf-8\n";
        $headers .= "Date:" . date("D, d M Y h:s:i") . " +0200\n";

        mail($to, $subject, $message, $headers);

        $view = new View();
        $view->redirect('home');
    }
}


