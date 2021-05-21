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

    $navtogglestate = "active";
    $administrador = $navtogglestate;
    $admlink [0] = $navtogglestate;
    $admtoggle [0] = "true";
    $admtoggle [1] = "show";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <title>Certificate Generator</title>
        <!-- Dependencias -->
        <link rel="shortcut icon" href="../assets/images/icon.svg"> 
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
        <!-- App CSS -->  
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
    </head>
<!-- <style>
    .container{
        background-color:lightskyblue;
    }
   .container>h1{
       text-align: center;
       color: rgb(30, 57, 210);
   }
   .container>label{
    color: rgb(30, 57, 210);
   }
</style> -->

<body class="app">
<?php require '../components/navbar.php';?>
<div class="app-wrapper pl-3 pl-md-5">
        <div class="app-content pt-3">
            <div class="container row px-md-5">
                <h1 class="page-title pb-0">Gerador de Certificado</h1>
                    <!-- CONTEÚDO -->
        <label>
            Name:
            <input id="name" type='text'>
            <br>
            Data:
            <input id="data" type='text'>
            <br>
            Palestra:
            <input id="palestra" type='text'>
        </label>
        <a href="#" id="download-btn">Download</a>
        <canvas id="canvas"height="350px" width="500px"></canvas>
        <!-- A4 <canvas id="canvas"height="2480px" width="3508px"></canvas> -->
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
    <script src="../assets/js/script.js"></script>
</body>
</html>