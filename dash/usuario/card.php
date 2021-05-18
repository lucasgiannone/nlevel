<?php
include('../../class/dbconn.php');

$sql = "SELECT 
        cc.* FROM `conteudoaluno` c 
    LEFT JOIN `conteudo` cc ON
        cc.id_conteudo = c.id_conteudo
    WHERE c.id_usuario = {$_SESSION['id_usuario']}
    ORDER BY dtcadastro DESC
";

$query = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($query)){
    $row["img"] = '../assets/images/conteudo/'. '' . $row['imagem'];
?>
<div class="d-inline-block col-sm-6 col-xl-4 my-3">
    <div class="app-card align-items-start shadow-sm">
        <img class="card-img-top" src="<?=$row['img']?>" alt="Card image">
        <div class="app-card-header">
            <div class="row align-items-center">
                    <h4 style="height:30px;" class="app-card-title m-3"><?=$row['titulo']?></h4>
            </div>

        </div><!-- CARD BODY -->
        <div class="app-card-footer row p-4 mt-auto">
            <a class="btn app-btn-secondary w-50" href="/dash/conteudo/review.php?id_conteudo=<?=$row['id_conteudo']?>">Ver mais</a>
            <a class="btn app-btn-secondary w-50" href="/dash/conteudo/player.php?url=<?=$row['url']?>&titulo=<?=$row['titulo']?>">Assistir</a>
        </div><!-- CARD FOOTER -->
    </div>
</div>
<?php 
}
?>