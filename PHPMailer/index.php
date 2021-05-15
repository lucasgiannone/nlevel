<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "Email com PHPMailer";

        require 'phpmailer.php';
        $assunto = 'Recuperar Senha';
        $mensagem = 'Deuuuu certoooo';
        $email = 'luiz.renandeassis@gmail.com';
        send($assunto, $mensagem, $email);
    ?>
</body>
</html>