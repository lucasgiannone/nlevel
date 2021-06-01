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

    $administrador = "active";
    $admlink[4] = "active";
    $admtoggle[0] = "true";
    $admtoggle[1] = "show";
?>
<!DOCTYPE html>
<!-- HEAD -->
<html lang="en"> 
    <head>
        <title>Seu conteúdo</title>
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
                <h1 class="page-title pb-0">Inscrito:</h1>
                <!-- search bar -->
                <form class="" action="" method="post">
                <div class="row m-1 mb-2">
                <input class="col"  type="text" name="input" id="input" placeholder="Pesquise o conteúdo">
                <button class="col-2 col-sm-2 col-md-1" type="submit" name="enviar" value="1">
                <i class="fas fa-search"></i>
                </button>
                </div>
                </form>
                
                    <!-- CONTEÚDO -->
                    <?php
                    include('./card.php');
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

