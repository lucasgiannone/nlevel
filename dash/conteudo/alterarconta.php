<?php
    require_once '../../class/usuarios.php';
    session_start();
    
    include('../../class/dbconn.php');
    $SelectQuery = $query="select * from usuarios";
    $ExecuteQuery = mysqli_query($conn,$SelectQuery);
    while($row = mysqli_fetch_array($ExecuteQuery)){
    $confignome = $row['nome'];
    $configtelefone = $row['telefone'];
    $configestado = $row['estado'];
    $configcidade = $row['cidade'];
    $configgen = $row['genero'];
    $configmail = $row['email'];
    $configsenha = $row['senha'];
    $configperfil =$row['perfil'];
    
    }
    
    // if(isset($_SESSION['perfil'])){
        
    // $administrador = "active";
    // $admlink[3] = "active";
    // $admtoggle[0] = "true";
    // $admtoggle[1] = "show";
?>
                        <?php
                            // switch(@$_REQUEST['btn_conteudo']){
                            //     case 1:
                            //         $sql = "SELECT * FROM conteudoParaAutorizar WHERE id_conteudo = '{$_REQUEST['id_conteudo']}'";
                            //         $query = mysqli_query($conn, $sql);
                            //         $result = mysqli_fetch_assoc($query);

                            //         $sql = "INSERT INTO conteudo (
                            //             imagem,
                            //             titulo,
                            //             descricao,
                            //             `data`,
                            //             `url`,
                            //             palestrante, 
                            //             img_palestrante )
                            //             VALUES (
                            //                 '{$result['imagem']}',
                            //                 '{$result['titulo']}',
                            //                 '{$result['descricao']}',
                            //                 '{$result['data']}',
                            //                 '{$result['url']}',
                            //                 '{$result['palestrante']}',
                            //                 '{$result['img_palestrante']}'
                            //             )                                        
                            //         ";

                            //         if (mysqli_query($conn, $sql)){
                            //             $sql = "DELETE FROM conteudoParaAutorizar WHERE id_conteudo = '{$_REQUEST['id_conteudo']}'";
                            //             mysqli_query($conn, $sql);
                            //             echo "
                            //                 <script>
                            //                     alert('Contéudo Aceito');
                            //                 </script>
                            //             ";
                            //         } else {
                            //             echo "
                            //                 <script>
                            //                     alert('Erro ao Aceitar Conteúdo');
                            //                 </script>
                            //             ";
                            //         }
                            //         $_REQUEST['btn_conteudo'] = 0;
                            //     break;

                            //     case 2:
                            //         $sql = "DELETE FROM conteudoParaAutorizar WHERE id_conteudo = '{$_REQUEST['id_conteudo']}'";
                            //         mysqli_query($conn, $sql);
                            //         $_REQUEST['btn_conteudo'] = 0;
                            //     break;

                            //     default;
                            // }
                            $sql = "SELECT * FROM usuarios";

                            $query = mysqli_query($conn, $sql);
   if (mysqli_num_rows($query) > 0){
    $conteudo = [];
    while ($row = mysqli_fetch_assoc($query)) {
        // $row["Aceitar"] = "<button name='btn_conteudo'><a href='solicitacao.php?btn_conteudo=1&id_conteudo={$row['id_conteudo']}'>Aceitar</a></button>";
        // $row["Recusar"] = "<button name='btn_conteudo'><a href='solicitacao.php?btn_conteudo=2&id_conteudo={$row['id_conteudo']}'>Recusar</a></button>";   
        $conteudo[] = $row;
    }

    $index = array_keys(current($conteudo));

    $valores = array_values(current($conteudo));

    ?>
                            <table class="table table-hover">
                                    <thead>
                                    <?php  
                                            // foreach ($index as $value){
                                            // echo "
                                            //     <th>$value</th>
                                                
                                            // ";
                                            // }
                                    ?>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th> usuario</th>
                                    <th> palestrante</th>
                                    <th> administrador</th>
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
                                echo "<span><center><b>Nenhum usuario cadastrado</b></center></span>";
                            }
                        ?>




    <!-- Javascript -->          
    <script src="../assets/plugins/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    <!-- JavaScript -->
    <script src="../assets/plugins/chart.js/chart.min.js"></script> 
    <script src="../assets/js/index-charts.js"></script>     
    <script src="../assets/js/app.js"></script> 