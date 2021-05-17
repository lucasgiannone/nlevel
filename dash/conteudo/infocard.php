<?php
include('../../class/dbconn.php');


$id = $_REQUEST['id_conteudo'];
$sql = "SELECT * FROM `conteudo` WHERE id_conteudo = $id";

$query = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($query)){
    $row["img"] = '../assets/images/conteudo/'. '' . $row['imagem'];
    $row["imgpal"] = '../assets/images/conteudo/'. '' . $row['img_palestrante'];
?>
<style>
.img-pal{
    display: inline-block;
    width: 15vw;
    border-radius: 50%;

    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}
</style>
<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
    <!-- HEADER -->
    <div class="app-card-header w-100 border-bottom">
        <!-- IMAGEM CONTEUDO -->
        <img class="card-img-top " src="<?=$row['img']?>" alt="Card image">
        <!-- TITULO CONTEUDO -->
        <div class="row align-items-center p-3 pt-4 px-3">
            <div class="col-auto">
                <h3><?=$row['titulo']?></h3>
            </div>
        </div>
    </div>
    
    <div class="app-card-body w-100">
        <!-- TITULO CONTEUDO -->
        <div style="float: left; position: relative;" class="item p-4">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <img class="img-pal mb-3" src="<?=$row['imgpal']?>" alt="Imagem Palestrante">
                    <div class="mx-4 px-4"><?=$row['palestrante']?></div>
                </div><!--//col-->
            </div><!--//row-->
        </div>
        <!-- DESCRICAO CONTEUDO -->
        <div class="item w-100 my-3">
            <div class="row justify-content-between align-items-center">
                <div style="font-size:20px;" class="col-auto w-100">
                    <div class="item-data">
                        <p><?=$row['descricao']?></p>
                    </div>
                </div><!--//col-->
            </div><!--//row-->
        </div>
        <!-- DATA/ASSISTIR -->
        <div class="item">
            <div class="row border-top">
                <div class="d-inline">
                    <a><?=$row['data']?></a>
                    <?php
                        $sqlinscrito = "SELECT * FROM conteudoaluno WHERE id_usuario = {$_SESSION['id_usuario']} AND id_conteudo = {$row['id_conteudo']}";
                        $queryinscrito = mysqli_query($conn, $sqlinscrito);
                    if (mysqli_num_rows($queryinscrito) == 0){   
                    ?>
                    <a style="float:right;" href="../../class/conteudo.php?id_conteudo=<?=$row['id_conteudo']?>" class="btn"><strong>Se Inscrever</strong></a>
                    <?php 
                    } else {
                    ?>
                    <a style="float:right;" href="/dash/conteudo/player.php?url=<?=$row['url']?>&titulo=<?=$row['titulo']?>" class="btn"><strong>Assistir</strong></a>
                    <?php 
                    }
                    ?>
                </div>
                <div class="d-inline">
                    
                </div>
                </div><!--//col-->
            </div><!--//row-->
        </div>


        
        
        
        </div>
    </div>         
</div>
<?php 
}
?>