


<!-- Class -->
<?php
    require_once '../../class/usuarios.php';
    session_start();

    if(!isset($_SESSION['perfil'])){
        echo "
        <script>
            alert('Acesso não permitido!');
            window.location='../../pages/login';
        </script>";
        session_destroy();
    } 


?>
<!DOCTYPE html>
<!-- HEAD -->
<html lang="en"> 
    <head>
        <title><?=$_REQUEST['titulo']?></title>
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
    <?php require '../components/smnav.php';?>
    <div>
        <div class="app-content">
            <div class="container row mw-100 m-1">
                    <h1 class="app-page-title justify-content m-1"> <?=$_REQUEST['titulo']?> </h1>
                    <!-- IFRAME -->
                    <div class="embed col-8 p-0 m-0">
                    <iframe class="mh-100" src="https://www.youtube.com/embed/<?=$_REQUEST['url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="embed col-4 p-0 m-0">
                    <iframe src="https://studio.youtube.com/live_chat?v=<?=$_REQUEST['url']?>&embed_domain=localhost"></iframe>
                    </div>
                    <style>
                    .embed>iframe{
                        width: 100%;
                        height: 75vh;
                    }
                    </style>
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