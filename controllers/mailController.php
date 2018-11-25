<?php

namespace Controllers;

use PHPMailer\PHPMailer as PHPMailer;
use PHPMailer\Exception;

class MailController
{
    private $acount = "mi.evento.news@gmail.com";
    private $pass = "eventos123";

    private $host = "smtp.gmail.com";
    private $port = "587";
    

    private $prepare = false;

    private $mail;

    private function prepare()
    {
        $this->mail = new PHPMailer(true); 
        
        //$this->mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = $this->host;
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = $this->acount;                 // SMTP username
        $this->mail->Password = $this->pass;                           // SMTP password
        $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = $this->port;

        $this->mail->setFrom($this->acount);

        $prepare = true;
    }

    public function send($email = "",$Subject = "asunto",  $msg = "mensaje")
    {
        $error = "";

        $this->prepare();

        try
        {

            $this->mail->addAddress($email);
            $this->mail->Subject = $Subject;

            $this->mail->isHTML(true);
            $this->mail->Body = $msg;

            $this->mail->msgHTML($msg);

            $this->mail->send();
        }
        catch( Exception $ex )
        {
            $error = "error en el envio de mails, aguarde un momento y pruebe nuevamente";
        }
  
        return $error;
    }

}

?>