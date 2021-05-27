<?php
    require_once '../../class/usuarios.php';
    session_start();

    if(!isset($_SESSION['perfil']) && ($_SESSION['perfil'] != 3 || $_SESSION['perfil'] != 4)){
        echo "
        <script>
            alert('Acesso não permitido!');
            window.location='../../login.php';
        </script>";
        session_destroy();
    }
    
    $administrador = "active";
    $admlink[1] = "active";
    $admtoggle[0] = "true";
    $admtoggle[1] = "show";

    include('../../class/dbconn.php');
    ?>
    <!DOCTYPE html>
<!-- HEAD -->
<html lang="en"> 
    <head>
        <title>Solicitação de conteúdo</title>
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
                <h1 class="page-title pb-2">Usuários:</h1>
                <!-- search bar -->
                <form class="" action="" method="post">
                <div class="row m-1 mb-2">
                <input class="col"  type="text" name="input" id="input" placeholder="Pesquise o nome do usuário">
                <button class="col-2 col-sm-2 col-md-1" type="submit" name="enviar" value="1">
                <i class="fas fa-search"></i>
                </button>
                </div>
                </form>
                <?php
                if(isset($_REQUEST['enviar'])){
                    $ref = $_REQUEST['enviar'];
                } else {
                    $ref = 0;
                }
                switch($ref){
                case 0:
                $sql="SELECT * FROM usuarios ORDER BY id_usuario ASC";
                break;
                case 1:
                $sql = "SELECT * FROM usuarios WHERE nome LIKE \"%{$_REQUEST['input']}%\" ORDER BY nome ASC";
                break;
                }
                ?>
                <!-- / search bar -->
                <table class="table">
                <thead>
                    <th scope="col">ID do Usuário</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo de Conta</th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                <?php
                
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($query)){
                    switch($row['perfil']){
                        case 1:
                            $pfmask = "Aluno";
                            break;
                        case 2:
                            $pfmask = "Professor";
                            break;
                        case 3:
                            $pfmask = "Administrador";
                            break;
                        case 4:
                            $pfmask = "Tester";
                            break;
                        
                    }
                ?>
                <tr>
                    <th><?=$row['id_usuario']?></th>
                    <th><?=$row['nome']?></th>
                    <th><?=$row['email']?></th>
                    <th><?=$pfmask?></th>
                    <td>
                    <label class="btn">
                    <i class="fa fa-edit"></i> Editar <button type="button" data-toggle="modal" data-target="#modal-<?=$row['id_usuario']?>" style="display: none;" name="edit" required>
                    </label>
                    </td>
                    <!-- MODAL -->
                    <div class="modal fade" id="modal-<?=$row['id_usuario']?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditLabel">Alterar Tipo de Conta:</h5>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="alterar-actpage.php" method="post">
                                    <div class="m-1">
                                    <label for="iduser">ID do Usuário:</label> <?=$row['id_usuario']?>
                                    <input type="hidden" name="iduser" id="iduser" value="<?=$row['id_usuario']?>">
                                    </div>
                                    <div class="m-1">
                                    <label for="editID">Tipo de Conta:</label>
                                    <select name="editID" id="editID">
                                    <?php
                                    $sqledit="SELECT * FROM perfil";
                                    $queryedit = mysqli_query($conn,$sqledit);
                                    while($rowedit = mysqli_fetch_array($queryedit)){
                                    ?>
                                    <option value="<?=$rowedit['id_perfil']?>"><?=$rowedit['perfil']?></option>
                                    <?php 
                                    }
                                    ?>
                                    </select>
                                    </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-outline-primary">Salvar</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        </form>
                    <!-- MODAL END -->               
                </tr>
                <?php
                }
                ?>
                </tbody>
                </table>

    <!-- Javascript -->          
    <script src="../assets/plugins/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    <!-- JavaScript -->
    <script src="../assets/plugins/chart.js/chart.min.js"></script> 
    <script src="../assets/js/index-charts.js"></script>     
    <script src="../assets/js/app.js"></script>
    
</body>
</html>