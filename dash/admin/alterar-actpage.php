<?php
include('../../class/dbconn.php');
if(isset($_POST['editID'])){
    $userid = addslashes($_POST['iduser']);
    $perfil = addslashes($_POST['editID']);
    $sqlupd = "UPDATE usuarios SET perfil = $perfil WHERE id_usuario = $userid";
    if(mysqli_query($conn,$sqlupd)){
            echo 
            "<script>
            alert('Alterado com sucesso!');
            </script>";
            header('Location: ./alterarconta.php');
    } else {
        echo 
        "<script>
        alert('Erro ao alterar.');
        
        </script>";
    }
}
?>