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

    $conteudo = "active";
?>
<!DOCTYPE html>
<!-- HEAD -->
<html lang="en"> 
    <head>
        <title>Aluno - Home</title>
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
    <div class="app-wrapper">
        <div class="app-content">
            <div class="container">
                <h1 class="page-title p-4 pb-0">Conteúdo</h1>
                    <!-- CONTEÚDO -->
                    <?php 
                    include('../../class/dbconn.php');
                    $SelectQuery = "select * from conteudo order by id_conteudo LIMIT 10";
                    $ExecuteQuery = mysqli_query($conn,$SelectQuery);
                    while($row = mysqli_fetch_array($ExecuteQuery)){
                            $cardimg= $url = '../assets/images/conteudo/'. '' . $row['imagem'];
                            $cardtitle= $row['titulo'];
                            $carddesc=$row['descricao'];
                            $carddate=$row['data'];
                            require '../components/card.php';                        
                    }
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