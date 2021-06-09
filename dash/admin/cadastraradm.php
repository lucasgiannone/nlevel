<!-- Class -->
<?php
    require_once '../../class/usuarios.php';
    session_start();

    if(!isset($_SESSION['perfil'])){
        echo "
        <script>
            alert('Acesso não permitido!');
            window.location='../../login';
        </script>";
        session_destroy();
    }

    include '../../class/dbconn.php';
    $administrador = "active";
    $admlink[0] = "active";
    $admtoggle[0] = "true";
    $admtoggle[1] = "show";

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
    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="card d-flex">
            <div class="app-card m-4">
                <div class="row">
                    <!-- Icon -->
                    <div class="col-auto">
                        <div class="app-icon-holder">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </div>
                    </div>
                    <!-- Title -->
                    <div class="col-auto">
                        <h4 class="app-title m-2">Nova solicitação:</h4>
                    </div>
                </div>
                <!-- Form as table -->
                    <form method="POST" enctype="multipart/form-data">
                        <table class="table w-100">
                            <input name="hidden" type="hidden" value="true">
                            <tr>
                                <td><label for="titulo">Titulo</label></td>
                                <td><input name="titulo" type="text" required></td>        
                            </tr>
                            <tr>
                                <td><label for="descricao">Descrição</label></td>
                                <td><textarea name="descricao" type="text" class="w-100" style="height:100px; font-size:12px" ></textarea></td>                              
                            </tr>
                            <tr>
                                <td><label for="link">URL</label></td>
                                <td><input name="link" type="link" required></td>        
                            </tr>
                            <tr>
                                <td><label for="datetime">Data</label></td>
                                <td colspan="1"><input name="datetime" type="date" max="9999-12-31" required></td>
                            </tr>
                            <tr>
                                <td><label for="time">Hora</label></td>
                                <td colspan="3"><input name="time" type="time" value="00:00" max="24:59" required></td>          
                            </tr>
                            <tr>
                                <td><label for="img">Imagem (.JPG)</label></td>

                                <td><input name="img" type="file" required></td>
                            </tr>
                            <tr>
                                <td><label for="nmpal">Nome do Palestrante</label></td>
                                <td><input name="nmpal" type="text" required></td>        
                            </tr>
                            <tr>
                                <td><label for="imgpal">Imagem Palestrante (.JPG)</label></td>

                                <td><input name="imgpal" type="file" required></td>
                            </tr>
                        </table>
                        <button class="btn" >Confirmar</button>
                        </div>
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
</body>
</html>



<?php    
    if (@$_REQUEST['hidden'] == true){
        
        $titulo = addslashes($_REQUEST['titulo']);
        $descricao = addslashes($_REQUEST['descricao']);
        $palestrante = addslashes($_REQUEST['nmpal']);
        $link = addslashes($_REQUEST['link']);
        $link = str_replace("https://www.youtube.com/watch?v=","",$link);

        $data = "{$_REQUEST['datetime']} {$_REQUEST['time']}";

        /**TRATAMENTO DE IMAGENS */
        //PASTA
        $_UP['pasta'] = '../assets/images/conteudo/';

        //TAMANHO
        $_UP['tamanho'] = 1024*1024*100; //5mb

        //EXTENSÕES
        $type = array('png','jpg','jpeg');

        //ERROS
        $_FILES['error'][0] = 'Não houve erro';
        $_FILES['error'][1] = 'img maior que o limite do PHP';
        $_FILES['error'][2] = 'img maior que o limite especificado no HTML';
        $_FILES['error'][3] = 'Upload do img foi feito parcialmente';
        $_FILES['error'][4] = 'Não foi efetuado o upload do img';

        $extensao[0] = @strtolower(end(explode('.', $_FILES['img']['name'])));
        $extensao[1] = @strtolower(end(explode('.', $_FILES['imgpal']['name'])));

        //Verifica se houve erro
        if ($_FILES['img']['error'] != 0){
            die("Não foi possível efetuar o upload, erro: <br />".$_UP['error'][$_FILES['img']['erro']]);
            exit;
        }
        else if ($_FILES['imgpal']['error'] != 0){
            die("Não foi possível efetuar o upload, erro: <br />".$_UP['error'][$_FILES['imgpal']['erro']]);
            exit;
        }

        //VERIFICAR A EXTENSÃO
        
        else if (!array_search($extensao[0], $type)){                 
            echo "
                <script>
                    alert(\"Extensão inválida\");
                </script>
            ";
            die();
        }
        else if (!array_search($extensao[1], $type)){                 
            echo "
                <script>
                    alert(\"Extensão inválida\");
                </script>
            ";
            die();
        }

        //VERIFICAR O TAMANHO DO img
        else if ($_UP['tamanho'] < $_FILES['img']['size']){
            echo "
                <script>
                    alert(\"Tamanho inválido\");
                </script>
            ";
            die();
        }
        else if ($_UP['tamanho'] < $_FILES['imgpal']['size']){
            echo "
                <script>
                    alert(\"Tamanho inválido\");
                </script>
            ";
            die();
        }
        /**FIM TRATAMENTO IMAGEM */

        else if (!empty($titulo) && !empty($descricao) && !empty($link) && !empty($data && !empty($palestrante))){

            $nome_imagem = verificaNomeImagem($conn, $_FILES['img']['name']);
            $nome_imgpal = verificaNomeImagem($conn, $_FILES['imgpal']['name']);

            if (cadastrarConteudo($conn, $nome_imagem, $titulo, $descricao, $data, $link, $palestrante, $nome_imgpal)){
                move_uploaded_file($_FILES['img']['tmp_name'], $_UP['pasta']. $nome_imagem);
                move_uploaded_file($_FILES['imgpal']['tmp_name'], $_UP['pasta']. $nome_imgpal);
                echo "
                <script>
                    alert(\"Contéudo solicitado com sucesso\");
                </script>
                ";
            } else {
                echo "
                <script>
                    alert(\"Não foi possível criar o conteúdo\");
                </script>
                ";
            }         
        }

        $_REQUEST['hidden'] = false;
        $_REQUEST['titulo'] = "";
        $_REQUEST['descricao'] = "";
        $_REQUEST['link'] = "";
        $_REQUEST['datetime'] = "";
    }
?>
