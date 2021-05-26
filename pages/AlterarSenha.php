<?php
    require_once '../class/usuarios.php';
    session_start();
	include('../class/dbconn.php');

    if(!isset($_SESSION['perfil'])){
        echo "
        <script>
            alert('Acesso não permitido!');
            window.location='../../login';
        </script>";
        session_destroy();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next Level - Alterar</title>
	<link rel="icon" href="https://athonedu.com.br/wp-content/uploads/2021/01/favicon.png" sizes="192x192">
	<link rel="stylesheet" href="../css/altsenha.css">
	<script src="../scripts/fontawesome.js" crossorigin="anonymous"></script>
	<script src="../scripts/jquery.js"></script>
	<script src="../scripts/mask.js"></script>
	<!-- SCRIPT NAV -->
	<script src="../scripts/nav.js"></script>
	<script type="text/javascript">	
	
</script>
</head>
<body>
<nav>
<?php require_once "../components/navPortal.php"?>
</nav>
<!-- FORM -->
<div class="reg-wrap">
	<form method="post">
			<h2 id="registroh2">Alterar Senha:</h2>	
			<!-- CONFIRMAR SENHA -->
			<br>
			<label for="pswv">Digite a Senha atual</label>
			<input type="password" placeholder="Digite a sua senha atual" name="pswv" required> 
			<!-- CONFIRMAR SENHA -->			
			<br>
			<label for="npsw">Nova Senha</label>
			<input type="password" placeholder="Digite a sua sua senha nova" name="npsw" required> 
			<!-- CONFIRMAR SENHA -->			
			<br>
			<label for="npswv">Confirmar Nova Senha</label>
			<input type="password" placeholder="Confirme a sua senha nova" name="npswv" required> 
			<!-- BOTÃO -->
			<br>
			<button type="submit">Alterar</button>
	</div>
	</div>
	</form>

</div>
	<footer>
		<address class="copyright">Copyright NextLevelCO 2021.</address>
	</footer>
</body>
</html>
<?php
$SelectQuery = "SELECT * FROM usuarios WHERE id_usuario=" . '' . $_SESSION['id_usuario'];
$ExecuteQuery = mysqli_query($conn,$SelectQuery);
while($row = mysqli_fetch_array($ExecuteQuery)){
$configsenha = $row['senha'];
}

if(isset($_REQUEST['pswv'])){
	$id = addslashes($_SESSION['id_usuario']);
	$pswv = addslashes(md5($_REQUEST['pswv']));
	$npsw = addslashes(md5($_REQUEST['npsw']));

	if($configsenha == $pswv){

		if($_REQUEST['npsw'] == $_REQUEST['npswv']){
		$update = "UPDATE usuarios SET senha = '$npsw' WHERE id_usuario = $id";
			if(mysqli_query($conn, $update)){
				echo 
				"<script>
				alert('Senha alterada.');
				window.location='/login.php'
				</script>";
				session_destroy();
			} else {
				echo 
				"<script>
				alert('Erro ao alterar.');
				</script>";
			}
		} else{
			echo 
			"<script>
			alert('Senhas não conferem.');
			</script>";
		}
	} else {
		echo 
			"<script>
			alert('Senha atual não confere.');
			</script>";
	}
}
?>