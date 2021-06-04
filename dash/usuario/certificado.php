<?php
include('../../class/dbconn.php');
require_once '../../class/usuarios.php';

$sql = 
"SELECT conteudoaluno.*, conteudo.titulo, usuarios.nome, usuarios.email 
FROM `conteudoaluno` 
LEFT JOIN `conteudo` 
ON conteudoaluno.id_conteudo = conteudo.id_conteudo 
LEFT JOIN `usuarios`
ON conteudoaluno.id_usuario = usuarios.id_usuario
WHERE conteudoaluno.id_usuario = {$_SESSION['id_usuario']}
ORDER BY `dtconclusao` DESC";

$query = mysqli_query($conn,$sql);

$counter = 0;
while($row = mysqli_fetch_array($query)){
    $dt_ref = DateTime::createFromFormat('Y-m-d H:i:s', $row['dtconclusao']);
    $dt_ref = $dt_ref->format('d/m/Y');
    if($row['concluiu']>0){
    $counter += 1;
    $id = $counter;
    ?>
    <tr>
    <td><?=$row['id_conteudo']?></td>
    <td><?=$row['titulo']?></td>
    <td><?=$dt_ref?></td>

        <form      id=<?=$id?> action="/dash/geradorcertificado/gerar_certificado/gerador.php" method="POST">
            <input form=<?=$id?> type="hidden" name="id_usuario" value="<?=$row['id_usuario']?>">
            <input form=<?=$id?> type="hidden" name="nome" value="<?=$row['nome']?>">
            <input form=<?=$id?> type="hidden" name="email" value="<?=$row['email']?>">
            <input form=<?=$id?> type="hidden" name="titulo" value="<?=$row['titulo']?>">
            <input form=<?=$id?> type="hidden" name="dtconclusao" value="<?=$dt_ref?>">
    <td>    <button form=<?=$id?> type="submit">Download</button>    </td>
        </form>
    </tr>
    <?php
    }
}

?>