<?php
    require_once "PHPMailer/src/PHPMailer.php";
    require_once "PHPMailer/src/SMTP.php";
    require_once "PHPMailer/src/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    function send($assunto, $mensagem, $email){
        try{
            $mail = new PHPMailer(true);
            $mail -> SetLanguage('br');
            $mail -> isSMTP();
            $mail -> SMTPAuth = true;
            $mail -> SMTPDebug = 0;
            $mail -> SMTPSecure = 'tls';
            $mail -> Host = 'tls://smtp.gmail.com';
            $mail -> Username = 'tcc.nextlevel.suporte';
            $mail -> Password = 'N3*T1eV3L';
            $mail ->  Port = 587;
            $mail -> setFrom('tcc.nextlevel.suporte@gmai.com');
            $mail -> addReplyTo('tcc.nextlevel.suporte@gmai.com');
            $mail -> addAddress($email);
            $mail -> isHTML(true);
            $mail -> CharSet = 'UTF-8';
            $mail -> Subject = $assunto;
            $mail -> Body = $mensagem;
            $envia = $mail -> send();

        }catch(Exception $e){
            echo $mail->ErrorInfo;
        }
    }
?>