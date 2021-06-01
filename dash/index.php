<!-- Class -->
<?php
    require_once '../class/usuarios.php';
    session_start();
    
    function splitName($name){
        
        $exp = explode(' ', $name);
        $nome = trim($exp[0]);
        return $nome;
    }

    $home = 'active';
    
    if(isset($_SESSION['perfil'])){
?>
<!DOCTYPE html>
<!-- HEAD -->
<html lang="en"> 
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Dependencias -->
        <link rel="shortcut icon" href="./assets/images/icon.svg"> 
        <script defer src="./assets/plugins/fontawesome/js/all.min.js"></script>
        <!-- App CSS -->  
        <link id="theme-style" rel="stylesheet" href="./assets/css/portal.css">
    </head> 
<!-- Estrutura Conteúdo -->
<body class="app">
<?php require './components/navbar.php';?>
<div class="app-wrapper">
    <div class="app-content pt-3">
        <div class="container px-5">
            <h1 class="page-title">
                Bem vindo ao portal, <?php echo splitName($_SESSION['nome']);
                ?>!
            </h1>    
            <br>
            <h4>
            Nossas palestras e eventos garantem um excelente certificado de treinamento. Caso seja do seu interesse 
            assista 70% para garantir o seu certificado.
            </h4>
            <h4>
            Por favor, para conversar no chat das palestras ao vivo, entre com a sua conta da google.
            </h4>
        </div>
    </div>
</div>

<!-- Conteúdo -->
<style>
.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}
.profile-image {
  overflow: hidden;
  border-radius: 50%;
}
.app-card-notification .profile-image {
  object-fit: cover;
}

</style>


    <!-- Javascript -->          
    <script src="./assets/plugins/popper.min.js"></script>
    <script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    <!-- Charts JS -->
    <script src="./assets/plugins/chart.js/chart.min.js"></script> 
    <script src="./assets/js/index-charts.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="./assets/js/app.js"></script> 
</body>
</html>
<?php 
    }
    else{
        echo "
        <script>
            alert('Acesso não permitido!');
            window.location='../login.php';
        </script>";
        session_destroy();
    }
?>