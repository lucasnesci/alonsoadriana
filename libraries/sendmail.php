<?php

if($_POST)
{
    $to_Email       = "nescilucas@gmail.com"; //Replace with recipient email address
    $subject        = 'Comentario desde AlonsoAdriana.com.ar'; //Subject line for emails

    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

        //exit script outputting json data
        $output = json_encode(
        array(
            'type'=>'error',
            'text' => 'Estamos experimentando problemas, por favor escribanos a</br>adri-alonso@hotmail.com'
        ));

        die($output);
    }

    if (isset($_POST["spambox"])) {
        //Die, because it is spam
        die();
    }

    //check $_POST vars are set, exit if any missing
    if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userMessage"]))
    {
        $output = json_encode(array('type'=>'error', 'text' => 'No puede dejar campos vacios!'));
        die($output);
    }

    //Sanitize input data using PHP filter_var().
    $user_Name        = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $user_Email       = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
    $user_Message     = filter_var($_POST["userMessage"], FILTER_SANITIZE_STRING);

    //proceed with PHP email.
    /*
    Incase your host only allows emails from local domain,
    you should un-comment the first line below, and remove the second header line.
    Of-course you need to enter your own email address here, which exists in your cp.
    */
    //$headers = 'From: your-name@YOUR-DOMAIN.COM' . "\r\n" .
    $headers = 'From: '.$user_Email.'' . "\r\n" . //remove this line if line above this is un-commented
    'Reply-To: '.$user_Email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

        // send mail
    $sentMail = mail(
        $to_Email,
        $subject,
        "De: " . $user_Name . "\r\n" . "Mail: " . $user_Email . "\r\n" . "Mensaje: " . $user_Message,
        $headers);

    if(!$sentMail) {
        $output = json_encode(array('type'=>'error', 'text' => 'El mensaje no se ha podido enviar, intente de nuevo o escribanos a</br>adri-alonso@hotmail.com'));
        die($output);
    } else {
        $output = json_encode(array('type'=>'message', 'text' => 'Hola '.$user_Name .', gracias por su comentario.</br>Pronto nos pondremos en contacto con usted'));
        die($output);
    }
}
?>
