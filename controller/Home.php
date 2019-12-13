<?php

class Home
{
    public function showHome()
    {
        require(VIEW . 'home.php');
    }

    public function contact()
    {
        if (
            empty($_POST['name']) ||
            empty($_POST['email']) ||
            empty($_POST['message']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        ) {
            header('Location: home');
        }

        $name = strip_tags(htmlspecialchars($_POST['name']));
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $message = strip_tags(htmlspecialchars($_POST['message']));

        $to = "vignon.esteban@gmail.com";
        $subject = "Formulaire de contact Site CV :  $name";
        $body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";
        $header = "From: vignon.esteban@gmail.com";
        $header .= "Reply-To: $email";

        mail($to, $subject, $body, $header);

        header('Location: home');
    }
}
