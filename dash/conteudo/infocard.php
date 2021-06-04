<?php
include('../../class/dbconn.php');

$id = $_REQUEST['id_conteudo'];
$sql = "SELECT * FROM `conteudo` c INNER JOIN conteudoaluno ca on c.id_conteudo = ca.id_conteudo WHERE c.id_conteudo = $id LIMIT 1";
$query = mysqli_query($conn,$sql);




while($row = mysqli_fetch_array($query)){
    $row["img"] = '../assets/images/conteudo/'. '' . $row['imagem'];
    $row["imgpal"] = '../assets/images/conteudo/'. '' . $row['img_palestrante'];
    $mes_ref = DateTime::createFromFormat('Y-m-d H:i:s', $row['data']);
    $mes_ref = $mes_ref->format('d/m/Y H:i');

?>

<style>
.img-pal{
    display: inline-block;
    width: 15vw;
    height: 15vw;
    border-radius: 50%;

    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
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
            <img class="img-pal" src="<?=$row['imgpal']?>" alt="Imagem Palestrante">
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
                    <div class="col-6">
                        <a style="float:right;" href="../../class/conteudo.php?btn=1&id_conteudo=<?=$row['id_conteudo']?>" class="btn"><strong>Se Inscrever</strong></a>
                    </div>
                <?php 
                } else{
                ?>
                    <div class="col-6">
                        <a style="float:right;" href="/dash/conteudo/player.php?id_conteudo=<?=$row['id_conteudo']?>" class="btn"><strong>Assistir</strong></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <?php
                        if ($row['concluiu'] == 0 ){

                        
                    ?>
                        <a style="float:right;" href="../../class/conteudo.php?btn=2&id_conteudo=<?=$row['id_conteudo']?>" class="btn"><strong>Cancelar Inscrição</strong></a>
                
                    <?php
                    }else{
                    ?>
                        <a style="float:right;" href="/dash/usuario/certificados.php" class="btn"><strong>Certificado</strong></a>
                    <?php
                    }
                    ?>
                        </div>    
                </div>
                <?php 
                }
                ?>
                 <?php
                    if($_SESSION['perfil'] == 3 || $_SESSION['perfil'] == 4){
                ?>
                <div class="row">
                    <div class="col-12">
                        <a style="float:right;" href="../../class/conteudo.php?btn=3&id_conteudo=<?=$row['id_conteudo']?>" class="btn"><strong>Excluir conteudo</strong></a>
                    </div>    
                </div>
                <?php 
                }
                ?>
            </div>
        </div>
    </div>
<?php 
}
?>