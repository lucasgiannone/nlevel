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
                var tag = document.createElement('script');
                // var db = require('./conn');

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
                }

                // 5. The API calls this function when the player's state changes.
                //    The function indicates that when playing a video (state=1),
                //    the player should play for six seconds and then stop.
                function onPlayerStateChange(event) {
                    switch(event.data){
                        case 0:
                            alert('Fim de vídeo');
                            break;
                        case 1:
                            conn();
                            break;
                        case 2:
                            alert('Video pausado '+player.getCurrentTime());
                            break;
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