<?php
    if (!empty($_REQUEST['uname'])){
        
        include('../class/dbconn.php');
        require 'phpmailer.php';

        $email = addslashes($_REQUEST['uname']);

        $sql = "SELECT email, REPLACE(CONCAT(email, NOW()), \" \", \"\") tudo FROM usuarios WHERE email = '$email'";
        $query = mysqli_query($conn,$sql);
        
        if (mysqli_num_rows($query) == 1){    
                        
            $result = mysqli_fetch_assoc($query);
            
            $md5 = md5($result['tudo']);

            $sql = "UPDATE usuarios SET senha = '".md5($md5)."' WHERE email = '$email'";

            echo $sql;
            // die;

            if (mysqli_query($conn, $sql)){                    
                $assunto = 'Recuperar Senha';
                $mensagem = "Sua nova senha é <b>$md5</b>";

                send($assunto, $mensagem, $email);
                echo "
                <script>
                    alert('Nova senha enviada para seu email.');
                    window.location.href='../login.php';
                </script>
                ";

            } else {
                echo "
                    <script>
                        alert('Não foi possível');
                        window.location.href='../index.php';
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