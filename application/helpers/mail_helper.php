<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('enviarEmail')) {

    function enviarEmail($to, $subject, $msj, $bcc = array()) {


        include_once("assets/libs/PHPMailer/class.phpmailer.php");
        include_once("assets/libs/PHPMailer/class.smtp.php");

        $email = new PHPMailer();
        $email->IsSMTP();
        $email->SMTPAuth = true;
        $email->SMTPSecure = "ssl";
        $email->Host = "smtp.gmail.com";
        $email->Port = 465;
        $email->Username = 'ejemplo@email.com';
        $email->From = "no-reply@nationaltours.com.co";
        $email->Password = "pass123";
        $email->FromName = "National Tours";
        $email->Subject = utf8_decode($subject);
        foreach ($bcc as $email) {
            $email->AddBCC($email);
        }
        $email->MsgHTML($msj);
        $email->AddAddress($to, "destinatario");
        $email->IsHTML(true);
        $email->Send();
    }

}


