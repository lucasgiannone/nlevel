<!-- Class -->
<?php
    require_once '../../class/usuarios.php';
    session_start();

    if(!isset($_SESSION['perfil'])){
        echo "
        <script>
            alert('Acesso não permitido!');
            window.location='../../login.php';
        </script>";
        session_destroy();
    }

    if(isset($_REQUEST['enviar'])){
        $ref = $_REQUEST['enviar'];
    } else {
        $ref = 0;
    }
    switch($ref){
    case 0:
    $sql = "SELECT * FROM conteudo ORDER BY data desc LIMIT 10";
    break;
    case 1:
    $sql = "SELECT * FROM conteudo WHERE titulo LIKE \"%{$_REQUEST['input']}%\"";
    break;
    }

    $conteudo = "active";
?>
<!DOCTYPE html>
<!-- HEAD -->
<html lang="en"> 
    <head>
        <title>Conteúdo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Dependencias -->
        <link rel="shortcut icon" href="../assets/images/icon.svg"> 
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
        <!-- App CSS -->  
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
    </head> 
<!-- Estrutura Conteúdo -->
    <body class="app">
    <?php require '../components/navbar.php';?>


    <div class="app-wrapper pl-3 pl-md-5">
        <div class="app-content pt-3">
            <div class="container row px-md-5">
                <h1 class="page-title pb-0">Conteúdo:</h1>
                <!-- search bar -->
                <form action="" method="post">
                <input type="text" name="input" id="input" placeholder="Pesquise o conteúdo">
                <button type="submit" name="enviar" value="1">
                <i class="fas fa-search"></i>
                </button>
                </form>
                <?php

                ?>
                    <!-- CONTEÚDO -->
                    <?php
                    include('./cards.php');
                    ?>
            </div>
        </div>
    </div>

    <!-- Javascript -->          
    <script src="../assets/plugins/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    <!-- JavaScript -->
    <script src="../assets/plugins/chart.js/chart.min.js"></script> 
    <script src="../assets/js/index-charts.js"></script>     
    <script src="../assets/js/app.js"></script> 
</body>
</html>