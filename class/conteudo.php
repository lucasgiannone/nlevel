<?php 
    require "./dbconn.php";
    session_start();
    $conteudo = $_REQUEST['id_conteudo'];
    $userid = $_SESSION['id_usuario'];
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
    else{
        echo "
        <script> 
            alert('ERRO.');
            window.location='/dash/conteudo/';
        </script>
        ";
    }

?>