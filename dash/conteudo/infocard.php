<?php
include('../../class/dbconn.php');
$ids = $_SESSION['id_usuario'];
$id = $_REQUEST['id_conteudo'];
$sql = "SELECT * FROM conteudo WHERE id_conteudo = $id";
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($query)){
    $row["img"] = '../assets/images/conteudo/'. '' . $row['imagem'];
    $row["imgpal"] = '../assets/images/conteudo/'. '' . $row['img_palestrante'];
    $mes_ref = DateTime::createFromFormat('Y-m-d H:i:s', $row['data']);
    $mes_ref = $mes_ref->format('d/m/Y H:i');

?>

<style>
@media (min-width:300px) {
    .img-pal{
    display: inline-block;
    width: 30vw;
    height: 30vw;
    border-radius: 50%;
    background-image:url(<?=$row['imgpal']?>);
    background-position: center;
    background-size: contain;    
    background-repeat: no-repeat;
    }
}
@media screen and (min-width:768px) {
    .img-pal{
    display: inline-block;
    width: 15vw;
    height: 15vw;
    border-radius: 50%;
    background-image:url(<?=$row['imgpal']?>);
    background-position: center;
    background-size: contain;    
    background-repeat: no-repeat;
    }    
}

</style>
<div class="app-card app-card-account m-2 shadow-sm d-flex flex-column align-items-start">
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
        <div style="float: left; position: relative;" class="item p-3">    
            <img class="img-pal">
            <div class="text-center mt-2"><?=$row['palestrante']?></div>  
        </div>
        <!-- DESCRICAO CONTEUDO -->
        <div class="item mt-3">
            <div class="row justify-content-between align-items-center">
                <div style="font-size:20px;" class="col-auto w-100 ">
                    <div class="item-data border-bottom"style="white-space: pre-wrap;">
                        <p><?=$row['descricao']?></p>
                    </div>
                </div><!--//col-->
            </div><!--//row-->
        </div>
        <!-- DATA/ASSISTIR -->
        <div class="app-card-footer w-100">
            <div class="row">
                            <div class="col-6">
                            <p class="mx-2 mt-1 text-muted"><small><?=$mes_ref?></small></p>
                            </div>
                    <?php
                        $sqlinscrito = "SELECT * FROM conteudoaluno WHERE id_usuario = {$_SESSION['id_usuario']} AND id_conteudo = {$row['id_conteudo']}";
                        $queryinscrito = mysqli_query($conn, $sqlinscrito);
                    if (mysqli_num_rows($queryinscrito) == 0){   
                    ?>
                            <div class="col-6 mt-3">
                                <a style="float:right;" href="../../class/conteudo.php?btn=1&id_conteudo=<?=$row['id_conteudo']?>" class="btn"><strong>Se Inscrever</strong></a>
                            </div>
                    <?php 
                    } else{
                    ?>
                    
                    <?php
                     $sqlc = "SELECT conteudoaluno.* FROM conteudoaluno WHERE id_usuario = $ids AND id_conteudo = $id";
                     $queryc = mysqli_query($conn, $sqlc);
                     $rowc = mysqli_fetch_array($queryc);
                    if ($rowc['concluiu'] == 0){
                        ?>
                         <div class="col-12">
                        <a style="float:right;" href="../../class/conteudo.php?btn=2&id_conteudo=<?=$row['id_conteudo']?>" class="btn"><strong>Cancelar Inscri????o</strong></a>
                        </div>
                        <?php
                    }
                    ?>
                             <div class="col-12">
                                <a style="float:right;" href="/dash/conteudo/player.php?id_conteudo=<?=$row['id_conteudo']?>" class="btn"><strong>Assistir</strong></a>
                            </div>
                    <?php
                    }
                    $sqlc = "SELECT conteudoaluno.* FROM conteudoaluno WHERE id_usuario = $ids AND id_conteudo = $id";
                    $queryc = mysqli_query($conn, $sqlc);
                    $rowc = mysqli_fetch_array($queryc);
                    if ($rowc['concluiu'] == 1 ){
                    ?>
                        <div class="col-12">
                            <a style="float:right;" href="/dash/usuario/certificados.php" class="btn"><strong>Certificado</strong></a>    
                        </div>
                        <?php
                        } 
                        ?>   
                    <?php
                            if($_SESSION['perfil'] == 3 || $_SESSION['perfil'] == 4){
                    ?>                    
                        <div class="col-12">
                            <a style="float:right;" href="../../class/conteudo.php?btn=3&id_conteudo=<?=$row['id_conteudo']?>" class="btn"><strong>Excluir conteudo</strong></a>
                        </div>    
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php 
}
?>