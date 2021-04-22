<?php
    require_once '../class/usuarios.php';
    session_start();
	include('../class/dbconn.php');
    $SelectQuery = $query="select * from usuarios WHERE id_usuario=" . '' . $_SESSION['id_usuario'];
    $ExecuteQuery = mysqli_query($conn,$SelectQuery);
    while($row = mysqli_fetch_array($ExecuteQuery)){
    $confignome = $row['nome'];
    $configtelefone = $row['telefone'];
	$confignasc= $row['dt_nasc'];
    $configestado = $row['estado'];
    $configcidade = $row['cidade'];
    $configgen = $row['genero'];
    $configmail = $row['email'];
	$configsenha = "";
    }

    if(!isset($_SESSION['perfil'])){
        echo "
        <script>
            alert('Acesso não permitido!');
            window.location='../../pages/login';
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
    <title>Next Level - Registro</title>
	<link rel="icon" href="https://athonedu.com.br/wp-content/uploads/2021/01/favicon.png" sizes="192x192">
	<link rel="stylesheet" href="../css/registro.css">
	<script src="../scripts/fontawesome.js" crossorigin="anonymous"></script>
	<script src="../scripts/jquery.js"></script>
	<script src="../scripts/mask.js"></script>
	<!-- SCRIPT NAV -->
	<script src="../scripts/nav.js"></script>
	<script type="text/javascript">	
	
	$(document).ready(function () {

		$.getJSON('http://mendesepereira.neuroteks.com/entrevista/estados_cidades.json', (data) => {
			var options = '';	

			$.each(data, function (key, val) {
				options += '<option value="' + val.nome + '">' + val.nome + '</option>';
			});					
			$("#estados").html(options);
			$(function() {
				var temp="<?= $configestado ?>" ; 
				$("#estados").val(temp);			
			});		
			$("#estados").change(function () {				

				var options_cidades = '';
				var str = "";					
				
				$("#estados option:selected").each(function () {
					str += $(this).text();
				});
				
				$.each(data, function (key, val) {
					if(val.nome == str) {							
						$.each(val.cidades, function (key_city, val_city) {
							options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
						});							
					}
				});

				$("#cidades").html(options_cidades);
				
				
			}).change();
			$(function() {
				var temp="<?= $configcidade ?>" ; 
				$("#cidades").val(temp);			
			});			

				
		});
		$('.telefone').mask("(99) 99999-9999");
	});

</script>
</head>
<body>
<nav>
    <div id="container">
    <!-- Logo -->
    <a id="logo"><img class="logo"src="../images/athonLogo.svg"></a>
</nav>
<!-- FORM -->
<div class="reg-wrap">
	<form method="post">
			<h2 id="registroh2">Alterar Configurações:</h2>	
			<!-- NOME -->
			<label for="uname">Nome</label>
			<input type="text" placeholder="Digite o seu nome" name="uname" value="<?= $confignome ?>" required>
			<p class="alert">Atenção:  escreva seu nome completo respeitando as letras iniciais maiúsculas, pois é assim que será impresso em seu certificado.</p>
			<!-- TELEFONE -->
			<br>
			<label for="telefone">Telefone</label>
			<input type="text" placeholder="(__) _____-____" class="telefone" name="telefone" id="telefone" value="<?= $configtelefone ?>" required>
			<!-- <input type="tel" placeholder="(__) _____-____" class="telefone" name="telefone" id="telefone" required> -->
			<!-- DT NASCIMENTO -->
			<br>
			<label for="dtnasc">Data de Nascimento</label>
			<input type="date" placeholder="DD/MM/AAAA" max="9999-12-31" name="dtnasc" id="dtnasc" value="<?= $confignasc ?>" required>
			<!-- ESTADO -->
			<br>
			<label for="estado">Estado</label>
			<select id="estados" name="estado">
			</select>
			<!-- CIDADE -->
			<br>
			<label for="cidade">Cidade</label>
			<select id="cidades" name="cidade">
			</select>
			<!-- TIPO -->
			<div style="display:none;" class="opt-wrap">
				<br>
				<label for="aluno">Aluno</label>
				<br>
				<input type="radio" id="aluno" name="tipo" value="1" checked>
				<br>
			</div>
			<!-- GENERO -->
			<br>
			<label for="genero">Gênero:</label>
			<div id="gen">
				<br>
				<label for="masculino">Masculino</label>
				<input type="radio" id="masculino" name="genero" value="Masculino"
				<?php if($configgen == 'Masculino'){?> checked <?php } ?> required>
				<label for="feminino">Feminino</label>
				<input type="radio" id="feminino" name="genero" value="Feminino"
				<?php if($configgen == 'Feminino'){?> checked <?php } ?> required>
				<br>
			</div>
			<!-- E-MAIL -->
			<br>
			<label for="email">E-mail</label>
			<input type="email" placeholder="Digite o seu e-mail" name="email" value="<?= $configmail ?>" required>
			<!-- CONFIRMAR SENHA -->
			<br>
			<label for="pswv">Confirmar Senha</label>
			<input type="password" placeholder="Confirme a senha" name="pswv" required> 
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