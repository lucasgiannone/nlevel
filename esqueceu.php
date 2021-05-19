<!-- HTML -->
<!DOCTYPE html>
<html lag="en" dir="ltr">
<head>
<meta charset="utf-8">
	<title id="title">Next Level - Recuperar Senha</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/esqueceu.css" rel="stylesheet">
	<link rel="icon" href="https://athonedu.com.br/wp-content/uploads/2021/01/favicon.png" sizes="192x192">
	<script src="./scripts/fontawesome.js" crossorigin="anonymous"></script>
	<script src="./scripts/jquery.js"></script>
    <!-- SCRIPT NAV -->
	<script src="./scripts/nav.js"></script>
</head>
<body>
	<!-- NAVBAR -->
<?php 
require_once "./components/nav.php"
?>
<!-- DIV PARA O CSS -->
<div id="esqueceupage">
	<!-- FORM DE LOGIN -->
	<form action="PHPMailer/recuperar.php" method="post">
		<!-- EMAIL -->
		<a id="logoEsqueceu"><img class="logoEsqueceu"src="images/athonLogo.svg"></a>
		<label for="uname"><b>E-mail</b></label>
		<input class="input-login" type="text" placeholder="Digite o seu e-mail" name="uname" required>
		<!-- BOTÃO -->
		<div class="button-wrap">
	  	<button type="submit">Enviar</button>	
	</div>
	</form>
</div>
<!-- FOOTER -->
<footer>
    <address class="copyright">Copyright NextLevelCO 2021.</address>
</footer>
</body>
</html>