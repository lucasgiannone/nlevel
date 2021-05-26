<?php
include('../../class/dbconn.php'); 

if(isset($_REQUEST['enviar'])){
    $ref = $_REQUEST['enviar'];
} else {
    $ref = 0;
}
switch($ref){
case 0:
$sql = "SELECT * FROM conteudo ORDER BY data desc LIMIT 10";
break;
case 1:
$sql = "SELECT * FROM conteudo WHERE titulo LIKE \"%{$_REQUEST['input']}%\"";
break;
}

$query = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($query)){
    $row["img"] = '../assets/images/conteudo/'. '' . $row['imagem'];
?>
<div class="d-inline-block col-sm-12 col-md-12 col-lg-6 mb-3">
    <div class="app-card align-items-start shadow-sm">
        <img class="card-img-top" src="<?=$row['img']?>" alt="Card image">
        <div class="app-card-header">
            <div class="row align-items-center">
                    <h4 style="height:30px;" class="app-card-title m-3"><?=$row['titulo']?></h4>
            </div>
        </div><!-- CARD BODY -->
        <div class="app-card-footer p-4 mt-auto">
            <a class="btn app-btn-secondary w-100" href="/dash/conteudo/review.php?id_conteudo=<?=$row['id_conteudo']?>">Ver mais</a>
        </div><!-- CARD FOOTER -->
    </div>
</div>
<?php 
}
?>