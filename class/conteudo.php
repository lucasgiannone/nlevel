<?php 
    require "./dbconn.php";
    session_start();
    $conteudo = $_REQUEST['id_conteudo'];
    $userid = $_SESSION['id_usuario'];
    
    switch ($_REQUEST['btn']){
        case 1:
            $return = registroconteudo($conn,$conteudo,$userid);
    
            if($return == "true"){
                echo "
                <script> 
                    alert('Inscrito com sucesso.');
                    window.location='/dash/conteudo/';
                </script>
                ";
            }
            elseif($return == "alert"){
                echo "
                <script> 
                    alert('Você já está inscrito.');
                    window.location='/dash/conteudo/';
                </script>
                ";
            }

        break;

        case 2:
            $cancelar = desregistroconteudo($conn,$conteudo,$userid);

            if($cancelar == "true"){
                echo "
                <script> 
                    alert('Inscrição cancelada com sucesso.');
                    window.location='/dash/conteudo/';
                </script>
                ";
            }

        break;
        
    }
    
?>