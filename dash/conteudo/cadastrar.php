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

       
//Cadastrar Novo Conteúdo ?>
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
        </tr>
        <tr>
            <td><label for="img">Imagem</label></td>
            <td><input name="img" type="file" required></td>           
        </tr>
        <tr><td><button>Confirmar</button></td></tr>
    </table>
</form>
<?php    
    if (@$_REQUEST['hidden'] == true){
        
        $titulo = addslashes($_REQUEST['titulo']);
        $descricao = addslashes($_REQUEST['descricao']);
        $link = addslashes($_REQUEST['link']);
        $data = addslashes($_REQUEST['datetime']);
        $img = $_FILES['img']['name'];

        /**TRATAMENTO DE IMAGENS */
        //PASTA
        $_UP['pasta'] = '../assets/images/conteudo/';

        //TAMANHO
        $_UP['tamanho'] = 1024*1024*100; //5mb

        //EXTENSÕES
        $_UP['extensoes'] = array('png','jpg','jpeg','gif');

        //RENOMEAR
        $_UP['renomeia'] = false;

        //ERROS
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'Arquivo maior que o limite do PHP';
        $_UP['erros'][2] = 'Arquivo maior que o limite especificado no HTML';
        $_UP['erros'][3] = 'Upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi efetuado o upload do arquivo';

        //Verifica se houve erro
        if ($_FILES['arquivo']['erros'] != 0){
            die("Não foi possível efetuar o upload, erro: <br />".$_UP['erros'][$_FILES['arquivo']['erro']]);
            exit;
        }

        /**FIM TRATAMENTO IMAGEM */

        if (!empty($titulo) && !empty($descricao) && !empty($link) && !empty($data)){
            cadastrarConteudo($conn, $titulo, $descricao, $link, $data);
        }

        $_REQUEST['hidden'] = false;
        $_REQUEST['titulo'] = "";
        $_REQUEST['descricao'] = "";
        $_REQUEST['link'] = "";
        $_REQUEST['datetime'] = "";        
    }
?>
