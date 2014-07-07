<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('enviarEmail')) {
    include_once("assets/libs/PHPMailer/class.phpmailer.php");
    include_once("assets/libs/PHPMailer/class.smtp.php");

    function enviarEmail($to, $subject, $msj, $bcc = array()) {
        if (!empty($bcc)) {
            $bcc = explode(",", $bcc);
        }else{
            $bcc=array();
        }

        $email = new PHPMailer();
        $email->IsSMTP();
        $email->SMTPAuth = true;
        $email->SMTPSecure = "ssl";
        $email->Host = "smtp.gmail.com";
        $email->Port = 465;
        $email->Username = 'info.ticademia@gmail.com';
        $email->From = "no-reply@nationaltours.com.co";
        $email->Password = "ticademia2014";
        $email->FromName = "National Tours";
        $email->Subject = utf8_decode($subject);
        foreach ($bcc as $row) {
            $email->AddBCC($row);
        }
        $email->MsgHTML($msj);
        $email->AddAddress($to, "destinatario");
        $email->IsHTML(true);
        $email->Send();
    }

}


