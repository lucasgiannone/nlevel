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
    $admlink[2] = "active";
    $admtoggle[0] = "true";
    $admtoggle[1] = "show";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <title>Gerador de Certificado </title>
        <!-- Dependencias -->
        <link rel="shortcut icon" href="../assets/images/icon.svg"> 
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
        <!-- App CSS -->  
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
    </head>
<body class="app">
<?php require '../components/navbar.php';?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="card d-flex">
            <div class="app-card m-4">
                <div class="row">
                    <!-- Icon -->
                    <div class="col-auto">
                        <div class="app-icon-holder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#15a362" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                        <path d="M14 3v5h5M16 13H8M16 17H8M10 9H8"/>
                        </svg>
                        </div>
                    </div>
                    <!-- Title -->
                    <div class="col-auto">
                        <h4 class="app-title m-2">Gerador de Certificado</h4>
                    </div>
                </div>
                <!-- Form as table -->
                    <form method="POST" enctype="multipart/form-data">
                        <table class="table w-100">
                            <input name="hidden" type="hidden" value="true">
                            <tr>
                                <td><label for="titulo">Nome:</label></td>
                                <td><input name="nome" id="name" type="text" required></td>        
                            </tr>

                            <tr>
                                <td><label for="descricao">Palestra</label></td>
                                <td><input name="palestra" id="palestra" type="text" required></td>        
                            </tr>

                            <tr>
                                <td><label for="datetime">Data</label></td>
                                <td colspan="1"><input name="date"  max="9999-12-31" id="data" type="date" required></td>
                            </tr>

                        </table>
                                <a href="#" id="download-btn">Download</a>
                                <canvas style="display:none;" id="canvas"height="350px" width="500px"></canvas>
                                <!-- A4 <canvas id="canvas"height="2480px" width="3508px"></canvas> -->
                    </form>
            </div>
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