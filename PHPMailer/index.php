<?php
    if (!empty($_REQUEST['uname'])){
        
        include('../class/dbconn.php');
        require 'phpmailer.php';

        $email = addslashes($_REQUEST['uname']);

        $sql = "SELECT email, REPLACE(CONCAT(email, NOW()), \" \", \"\") tudo FROM usuarios WHERE email = '$email'";            
        $query = mysqli_query($conn,$sql);

        $sql = "SELECT email FROM recuperar WHERE email = '$email'";  
        $query2 = mysqli_query($conn,$sql);

        if (mysqli_num_rows($query) == 1 && mysqli_num_rows($query2) == 0){                
            $result = mysqli_fetch_assoc($query);
            
            $md5 = md5($result['tudo']);
            echo $md5.'<br>';

            $di = new DateTime(date('Y-m-d H:i'));               
            $di = $di->modify('+3 hours');
            $di = $di->format('Y-m-d H:i') . "\n";

            $sql = "INSERT INTO recuperar (email, token, datelimit) VALUES ('{$result['email']}', '$md5', '$di')";
            
            if (mysqli_query($conn, $sql)){                    
                $assunto = 'Recuperar Senha';
                $mensagem = "Sua nova senha é <b>$md5</b>";

                send($assunto, $mensagem, $email);

                $sql = "UPDATE usuarios SET senha = ".md5($md5)." WHERE email = '$email'";
                mysqli_query($conn, $sql);

                echo "
                <script>
                    alert('Nova senha enviada para seu email.');
                    window.location.href='index.php';
                </script>
            ";
            } else {
                echo "
                    <script>
                        alert('Não foi possível');
                    </script>
                ";
            }

            
        } else {
            echo "
                <script>
                    alert('Não foi possível, já existe um registro para troca de senha');
                </script>
            ";
        }
    }
    

    
    
?>