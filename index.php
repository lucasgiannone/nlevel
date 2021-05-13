<!DOCTYPE html>
<html lag="en" dir="ltr">
<!-- HEAD -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- DEPENDENCIAS -->
	<link href="css/default.css" rel="stylesheet">
	<link rel="icon" href="https://athonedu.com.br/wp-content/uploads/2021/01/favicon.png" sizes="192x192">
	<script src="/scripts/fontawesome.js" crossorigin="anonymous"></script>
	<script src="/scripts/jquery.js"></script>
	<!-- SCRIPT NAV -->
	<script src="../scripts/nav.js"></script>
</head>
<!-- BODY -->
<body>
<nav>
	<div class="container">
	<!-- Menu mobile -->
	<input type="checkbox" id="check">
	<label for="check" class="checkbtn">
		<i class="fas fa-align-left"></i>
	</label>
	<!-- Logo -->
	<a id="logo"><img class="logo"src="images/athonLogo.svg"></a>
	<!-- Botões da Navbar -->
	<ul class="buttons">
		<li class="item"><a class="link"	id="home" 	href="./">Home</a></li>
		<li class="item"><a class="link" 	id="sobre"	href="./pages/sobre.php">Sobre</a></li>
		<li class="item"><a class="link"	id="login"	href="./pages/login.php">Login</a></li>
		<li class="item"><a class="link" 	id="reg"	href="./pages/registro.php">Cadastre-se</a></li>
		
	</ul>
	</div>
</nav>
	<!-- Container JS -->
	<div id="conteudo"></div>
	<!-- Rodapé -->
	<footer>
		<address class="copyright">Copyright NextLevelCO 2021.</address>
	</footer>
</body>
</html>