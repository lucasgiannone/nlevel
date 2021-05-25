
<!-- Class -->
<?php
    require_once '../../class/usuarios.php';
    session_start();

    if(($_SESSION['perfil'] < 3)){
        echo "
        <script>
            alert('Acesso não permitido!');
            window.location='../../pages/login';
        </script>";
        session_destroy();
    }

    include '../../class/dbconn.php';
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
        <table class="table-striped table-bordered" style="text-align: center; margin: 10%; width: 80%;">
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
<script src="../assets/plugins/popper.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>  