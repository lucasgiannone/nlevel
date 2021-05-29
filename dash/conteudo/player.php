<?php
session_start();
include('../../class/dbconn.php');

$id = $_REQUEST['id_conteudo'];
$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT * FROM `conteudo` WHERE id_conteudo = $id";

$query = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($query)){
?>
<!DOCTYPE html>
<!-- HEAD -->
<html lang="en"> 
    <head>
        <title><?=$row['titulo']?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Dependencias -->
        <link rel="shortcut icon" href="../assets/images/icon.svg"> 
        <script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>
        <!-- App CSS -->  
        <link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">
        <script type="text/javascript">
        $document.getElementById('livechat').contentDocument.getElementById('button').setAttribute("target","_blank");
        </script>
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
                                let id_usuario = <?=$id_usuario?>;
                                let id_conteudo = <?=$id?>;
                                let timer;
                                setInterval(function(){ 
                                    if (player.getPlayerState() != 1){
                                        timer = false;
                                        alert(id_usuario+' '+id_conteudo);

                                    } else if (player.getPlayerState() == 1){
                                        if (timer == true){
                                            alert("Deu certo;");   

                                            (async () => {
                                                const db = require("./conn");
                                                console.log('Começou!');
                                            
                                                console.log("SELECT * FROM conteudoaluno WHERE id_usuario ="+id_usuario+"");
                                                const clientes = await db.selectCustomers();
                                                console.log(clientes);
                                            })();                                            

                                            /*console.log('UPDATE CLIENTES');
                                            const result2 = await db.updateCustomer(id, {watchtime: timer});
                                            console.log(result2);*/
                                        }

                                        timer = true;
                                    }
                                }, 10000);
                            }

                            // 5. The API calls this function when the player's state changes.
                            //    The function indicates that when playing a video (state=1),
                            //    the player should play for six seconds and then stop.
                            var done = false;
                            function onPlayerStateChange(event) {
                                if (event.data == YT.PlayerState.PLAYING && !done) {
                                
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