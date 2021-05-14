<!DOCTYPE html>
<html lag="en" dir="ltr">
<title id="title">Next Level - Home</title>
<!-- HEAD -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- DEPENDENCIAS -->
	<link rel="stylesheet" href="./css/index.css">
	<link rel="icon" href="https://athonedu.com.br/wp-content/uploads/2021/01/favicon.png" sizes="192x192">
	<script src="/scripts/fontawesome.js" crossorigin="anonymous"></script>
	<script src="/scripts/jquery.js"></script>
	<!-- SCRIPT NAV -->
	<script src="../scripts/nav.js"></script>
</head>
<!-- PHPNAV -->
<?php 
require_once "./components/nav.php"
?>
<!-- BODY -->
<body>
    <div id="homepage">
        <div id="heroimg">
            <div id="herotxt">
                <h1>NEXT LEVEL</h1>
                <p>Aulas e Palestras</p>
                <a href="./sobre.php"><button id="herobtn">Saber mais</button></a>
            </div>
        </div>
        <div id="homepage-2">
            <div class="boxes">
                <div class="box-1">
                    <div class="iconepg"><i class="fas fa-handshake iconepg"></i></div>
                    <h3>Melhor parceria entre professor e aluno.</h3>
                   <p>Tenha a garantia de um bom relacionamento e bom aprendizado com seu mestre!</p>
                </div>
                <div class="box-2">
                    <div class="iconepg"><i class="fas fa-medal medal"></i></div>
                    <h3>Garantia de qualidade.</h3>
                   <p>Faça o planejamento de sua carreira começando por aqui.</p>
                </div>
                <div class="box-3">
                    <div class="iconepg"><i class="fas fa-user-graduate student"></i></div>
                    <h3>Compatíveis com o mercado.</h3>
                   <p>Nossas palestras e eventos podem ajudar na sua carreira estudantil também.</p>
                </div>
            </div>
        </div>
        <div class="text" >
        </div>
    </div>
	<footer>
		<address class="copyright">Copyright NextLevelCO 2021.</address>
	</footer>
</body>
</html>