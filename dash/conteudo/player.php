<?php
session_start();
include('../../class/dbconn.php');
date_default_timezone_set("America/Sao_Paulo");


/**
 * Codigo do @author: wyventura
 * Recebe um posto e finaliza a execução da pagina
 * deve ser enviado no <b>POST</b> o id do conteudo | id do usuario | contagem de segundos do video
 * 
 * @param id_conteudo | id_usuario | contagem
 * 
 * 
 * @reports o exit; serve para não carregar a pagina inteira e finalizar a execucao
 */
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $count = $_POST['contagem'];
    $watchtime = gmdate("H:i:s", $count);
    $id_conteudo = $_POST['id_conteudo'];
    $id_usuario = $_POST['id_usuario'];
    $totalVideo = $_POST['totalVideo'];
    $dtconclusao = $_POST['dtconclusao'];
    $dtnow = date('Y-m-d H:i:s');
    $concluiu = $_POST['check'];
    $sql = "UPDATE `conteudoaluno` SET `watchtime` = '$watchtime', `duration` = '$totalVideo', `concluiu` = $concluiu, `dtconclusao` = '$dtnow' WHERE `id_conteudo` = $id_conteudo AND `id_usuario` = $id_usuario";
    $query = mysqli_query($conn,$sql);    
    exit;
}
$id = $_REQUEST['id_conteudo'];
$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT conteudo.*, conteudoaluno.watchtime FROM conteudo INNER JOIN conteudoaluno ON conteudo.id_conteudo = conteudoaluno.id_conteudo WHERE conteudo.id_conteudo = $id AND conteudoaluno.id_usuario = $id_usuario";
$query = mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($query)){
    $time = $row['watchtime'];
    $dt = new DateTime("1970-01-01 $time", new DateTimeZone('UTC'));
    $seconds = (int)$dt->getTimestamp();
    
?>
<!DOCTYPE html>
<!-- HEAD -->
<html lang="pt_br"> 
    <head>
    <!-- CONNJS -->
        <script type="text/javascript" src="conn.js"></script>
        <!-- HEAD -->
        <title><?=$row['titulo']?></title>
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
        <?php require '../components/smnav.php';?>
        <div class="row frameset">
            <div class="col-sm-12 col-md-8 p-0 m-0">
                <!-- Youtube Iframe API -->
                <div class="embed-responsive embed-responsive-16by9">
                <div class="embed-responsive-item" id="player"></div>
                </div>
                <script>
                // 2. This code loads the IFrame Player API code asynchronously.
                // Contador
                var today = new Date();
                // var dd = String(today.getDate()).padStart(2, '0');
                // var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                // var yyyy = today.getFullYear();
                // today = mm + '/' + dd + '/' + yyyy;
                var contador = 0;
                var check = 0;
                var wt = <?php echo $seconds ;?>;
                var tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                // 3. This function creates an <iframe> (and YouTube player)
                //    after the API code downloads.
                var player;
                function onYouTubeIframeAPIReady() {
                    player = new YT.Player('player', {
                    height: '360',
                    width: '640',
                    videoId: '<?=$row['url']?>',
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                    });
                }

                // 4. The API will call this function when the video player is ready.
                function onPlayerReady(event) {
                    event.target.playVideo();
                    player.seekTo(wt);
                    contador = wt;
                }

                // 5. The API calls this function when the player's state changes.
                //    The function indicates that when playing a video (state=1),
                //    the player should play for six seconds and then stop.
                function onPlayerStateChange(event) {
                    
                    if(event.data == 1){
                        // Timer
                        Interval = setInterval(() => {
                            contador = contador +10;
                            console.log(contador);
                            if(contador >= ((player.getDuration()/100)*70)){
                                duration = player.getDuration();
                                console.log(duration);
                                check = 1;
                            } else {
                                check = 0;
                            }
                            // Create XML
                            var http = new XMLHttpRequest();
                            //Sera enviado para a mesma pagina a atua
                            var url = '';
                            //Parametros os dados a serem enviado
                            var params = 'id_conteudo=<?php echo $id?>&id_usuario=<?php echo $id_usuario?>&contagem='+contador+'&totalVideo='+duration+'&check='+check+'&dtconclusao='+today;
                            //Abre uma conexão sera enviado um post interno
                            http.open('POST', url, true);
                            
                            //Seta o cabeçalho
                            http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            
                            //O que fazer quando finalizar o envio
                            http.onreadystatechange = function() {//Call a function when the state changes.
                            //Caso de sucesso enviar os dados por post para a pagina atual
                                if(http.readyState == 4 && http.status == 200) {
                                   console.log(http.responseText);
                                }
                            }
                            //Envia o post para a pagina atual no php request method == 'POST'
                            http.send(params);
                        }, 10000);
                        // Log
                        console.log('Video Rodando');
                    }
                    else if (event.data == 2) {
                        // Log
                        console.log('Video Pausado');
                        // Pause Timer
                        clearInterval(Interval);
                    }
                    else if (event.data == 3) {
                        console.log('Carregando');
                        duration = player.getDuration();
                        console.log(duration);
                        if(contador+1 >= duration){
                            contador = 0;
                            player.seekTo(contador);
                            clearInterval(Interval);
                        }
                    }
                    else if (event.data == 0) {
                        console.log('Video Acabou');
                        if(contador >= ((player.getDuration()/100)*70)){
                            alert('Carga horária atingida, acesse seu certificado em nossa plataforma.');
                        } else if(contador < ((duration/100)*70)){
                            alert('Assista novamente, carga horária não atingida.');
                        }
                        // Pause Timer
                        clearInterval(Interval);
                    }
                }
                function stopVideo() {
                    player.stopVideo();
                }

                </script>
            </div>
            <div class="col-sm-12 col-md-4 p-0 m-0">
            <iframe id="livechat" src="https://studio.youtube.com/live_chat?v=<?=$row['url']?>&embed_domain=<?=$_SERVER['HTTP_HOST']?>"></iframe>            </div>
    </div>
    
    <style>
    .frameset iframe{
        width: 100%;
        height: 90vh;
    }
    </style>

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
}
?>