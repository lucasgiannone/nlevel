<!-- Class -->
<?php
    require_once '../class/usuarios.php';
    session_start();
    
    include('../class/dbconn.php');
    $SelectQuery = $query="select * from usuarios WHERE id_usuario=" . '' . $_SESSION['id_usuario'];
    $ExecuteQuery = mysqli_query($conn,$SelectQuery);
    while($row = mysqli_fetch_array($ExecuteQuery)){
    $confignome = $row['nome'];
    $configtelefone = $row['telefone'];
    $configestado = $row['estado'];
    $configcidade = $row['cidade'];
    $configgen = $row['genero'];
    $configmail = $row['email'];
    $configsenha = $row['senha'];
    
    }
    
    if(isset($_SESSION['perfil'])){
?>
<!DOCTYPE html>
<!-- HEAD -->
<html lang="en"> 
    <head>
        <title>Aluno - Home</title>
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


<!-- Conteúdo -->

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="app-card-header p-3 border-bottom-0">
                <div class="row align-items-center gx-3">
                    <div class="col-auto">
                        <div class="app-icon-holder">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="col-auto">
                        <h4 class="app-card-title">Perfil</h4>
                    </div>
                </div>
            </div>
            <!-- Card com Informações -->
            <div class="app-card-body px-4 w-100">
                <!-- Nome -->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Nome</strong></div>
                            <div class="item-data"><?= $confignome ?></div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div>
                <!-- Telefone -->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Telefone</strong></div>
                            <div class="item-data"><?= $configtelefone ?></div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div>
                <!-- Local -->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Estado</strong></div>
                            <div class="item-data">
                            <?= $configestado ?>
                            </div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div>
                <!-- Local -->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Cidade</strong></div>
                            <div class="item-data">
                            <?= $configcidade ?>
                            </div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div>
                <!-- Genero -->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Gênero</strong></div>
                            <div class="item-data">
                            <?= $configgen ?>
                            </div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div>
                <!-- Email -->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Email</strong></div>
                            <div class="item-data"><?= $configmail ?></div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div>
                <!-- Email -->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <a href="/pages/config.php" class="button"><strong>Alterar</strong></a>
                        </div><!--//col-->
                    </div><!--//row-->
                </div>
                <!-- Senha -->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Senha</strong></div>
                            <div class="item-label">********</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div>
                <!-- Alterar senha -->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <a href="/pages/AlterarSenha.php" class="button"><strong>Alterar senha</strong></a>
                        </div><!--//col-->
                    </div><!--//row-->
                </div>
            </div>         
        </div>
    </div>
</div>

<!-- Conteúdo -->

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
            window.location='../pages/login';
        </script>";
        session_destroy();
    }
?>