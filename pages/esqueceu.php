<!-- HTML -->
<!DOCTYPE html>
<html lag="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Next Level</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/esqueceu.css">
	<!-- SCRIPT NAV -->
	<script src="../scripts/nav.js"></script>
</head>
<body>
<!-- DIV PARA O CSS -->
<div id="loginpage">
	<!-- FORM DE LOGIN -->
	<form action="../PHPMailer/index.php" method="post">
		<!-- EMAIL -->
		<a id="logoLogin"><img class="logoLogin"src="images/athonLogo.svg"></a>
		<label for="uname"><b>E-mail</b></label>
		<input class="input-login" type="text" placeholder="Digite o seu e-mail" name="uname" required>
		<!-- BOTÃO -->
		<div class="button-wrap">
	  	<button type="submit">Enviar</button>	
	</div>
	</form>
</div>
</body>
</html>