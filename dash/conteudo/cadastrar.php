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

    include '../../class/dbconn.php';

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
            <div class="app-container">
            <h1 class="page-title">Novo conteúdo</h1>
            <form method="POST" enctype="multipart/form-data">
                <table>
                    Novo Contéudo
                    <input name="hidden" type="hidden" value="true">
                    <tr>
                        <td><label for="titulo">Titulo</label></td>
                        <td><input name="titulo" type="text" required></td>        
                    </tr>
                    <tr>
                        <td><label for="descricao">Descrição</label></td>
                        <td><input name="descricao" type="text" required></td>        
                    </tr>
                    <tr>
                        <td><label for="link">URL</label></td>
                        <td><input name="link" type="link" required></td>        
                    </tr>
                    <tr>
                        <td><label for="datetime">Data</label></td>
                        <td><input name="datetime" type="date" required></td>
                        <td><label for="time">Hora</label></td>
                        <td><input name="time" type="time" value="00:00" required></td>          
                    </tr>
                    <tr>
                        <td><label for="img">Imagem</label></td>
                        <td><input name="img" type="file" required></td>           
                    </tr>
                    <tr><td><button class="btn" >Confirmar</button></td></tr>
                </table>
            </form>
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

        $extensao = @strtolower(end(explode('.', $_FILES['img']['name'])));

        //Verifica se houve erro
        if ($_FILES['img']['error'] != 0){
            die("Não foi possível efetuar o upload, erro: <br />".$_UP['error'][$_FILES['img']['erro']]);
            exit;
        }

        //VERIFICAR A EXTENSÃO
        
        else if (!array_search($extensao, $type)){                 
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
        /**FIM TRATAMENTO IMAGEM */

        else if (!empty($titulo) && !empty($descricao) && !empty($link) && !empty($data)){

            $nome_imagem = verificaNomeImagem($conn, $_FILES['img']['name']);

            if (cadastrarConteudo($conn, $nome_imagem, $titulo, $descricao, $data, $link)){
                move_uploaded_file($_FILES['img']['tmp_name'], $_UP['pasta']. $nome_imagem);
                echo "
                <script>
                    alert(\"Contéudo criado com sucesso\");
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
