<?php
include('../../class/dbconn.php');
require_once '../../class/usuarios.php';
if(isset($_REQUEST['enviar'])){
    $ref = $_REQUEST['enviar'];
} else {
    $ref = 0;
}
switch($ref){
case 0:
$sql = 
"SELECT conteudoaluno.*, conteudo.titulo, usuarios.nome, usuarios.email 
FROM `conteudoaluno` 
LEFT JOIN `conteudo` 
ON conteudoaluno.id_conteudo = conteudo.id_conteudo 
LEFT JOIN `usuarios`
ON conteudoaluno.id_usuario = usuarios.id_usuario
WHERE conteudoaluno.id_usuario = {$_SESSION['id_usuario']}
ORDER BY `dtconclusao` DESC";
break;
case 1:
$sql = 
"SELECT conteudoaluno.*, conteudo.titulo, usuarios.nome, usuarios.email 
FROM `conteudoaluno` 
LEFT JOIN `conteudo` 
ON conteudoaluno.id_conteudo = conteudo.id_conteudo 
LEFT JOIN `usuarios`
ON conteudoaluno.id_usuario = usuarios.id_usuario
WHERE conteudoaluno.id_usuario = {$_SESSION['id_usuario']} AND conteudo.titulo LIKE \"%{$_REQUEST['input']}%\"
ORDER BY `dtconclusao` DESC
";
break;
}
$query = mysqli_query($conn,$sql);

$counter = 0;
while($row = mysqli_fetch_array($query)){
    $dt_ref = DateTime::createFromFormat('Y-m-d H:i:s', $row['dtconclusao']);
    $dt_ref = $dt_ref->format('d/m/Y');
    $time = $row['duration'];
    $dt = new DateTime("1970-01-01 $time", new DateTimeZone('UTC'));
    $seconds = (int)$dt->getTimestamp();
    $hours = round($seconds/3600);
    if($seconds < 60){
        $duration = "$seconds segundos.";
    }
    else if($seconds <= 1800){
        $hours = round($seconds/60);
        $duration = "$hours minutos.";
    }
    else if($hours == 1){
        $duration = "$hours hora.";
    }
    else{
        $duration = "$hours horas.";
    }
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
            <input form=<?=$id?> type="hidden" name="duration" value="<?=$duration?>">
    <td>    <button form=<?=$id?> type="submit">Download</button>    </td>
        </form>
    </tr>
    <?php
    }
}

?>