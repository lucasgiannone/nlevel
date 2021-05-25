<?php
    require_once '../../class/usuarios.php';
    session_start();

    if(($_SESSION['perfil'] < 3)){
        echo "
        <script>
            alert('Acesso não permitido!');
            window.location='../../login';
        </script>";
        session_destroy();
    }

    include '../../class/dbconn.php';
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
                <h1 class="page-title pb-2">Solicitações:</h1>   
                        <!-- Class -->
                        <?php
                            /*$palestrante = "active";
                            $pallink[0] = "active";
                            $paltoggle[0] = "true";
                            $paltoggle[1] = "show";*/

                            $sql = "SELECT * FROM conteudoParaAutorizar";

                            $query = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($query) > 0){
                                $conteudo = [];
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $row["Aceitar"] = "<button>Aceitar</button>";
                                    $row["Recusar"] = "<button>Recusar</button>";   
                                    $conteudo[] = $row;
                                }

                                $index = array_keys(current($conteudo));
                                $valores = array_values(current($conteudo));

                                ?>
                                <table class="table table-hover">
                                    <thead>
                                    <?php  
                                        foreach ($index as $value){
                                            echo "
                                                <th>$value</th>
                                            ";
                                        }
                                    ?>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($valores as $value){
                                            echo "
                                                <td>$value</td>
                                            ";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<span><center><b>Nenhuma solicitação de conteúdo</b></center></span>";
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


