<?php
    require_once './class/usuarios.php';
    $u = new Usuario;
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
	<script src="./scripts/fontawesome.js" crossorigin="anonymous"></script>
	<script src="./scripts/jquery.js"></script>
	<script src="./scripts/mask.js"></script>
	<!-- SCRIPT NAV -->
	<script src="./scripts/nav.js"></script>
	<script type="text/javascript">		
	$(document).ready(function () {
	
		$.getJSON('./scripts/estados_cidades.json', (data) => {
			var options = '';	

			$.each(data, function (key, val) {
				options += '<option value="' + val.nome + '">' + val.nome + '</option>';
			});					
			$("#estados").html(options);				
			
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
		
		});
		$('.telefone').mask("(99) 99999-9999");
	});
</script>
</head>
<body>
<?php 
require_once "./components/nav.php"
?>
<!-- FORM -->
	<div class="reg-wrap">
		<form method="post">
			<h2 id="registroh2">Registro de Usuário:</h2>	
			<!-- NOME -->
			<br>
			<label for="uname">Nome</label>
			<input type="text" placeholder="Digite o seu nome" name="uname" required>
			<p class="alert">Atenção:  escreva seu nome completo respeitando as letras iniciais maiúsculas, pois é assim que será impresso em seu certificado.</p>
			<!-- TELEFONE -->
			<br>
			<label for="telefone">Telefone</label>
			<input type="text" placeholder="(__) _____-____" class="telefone" name="telefone" id="telefone" required>
			<!-- <input type="tel" placeholder="(__) _____-____" class="telefone" name="telefone" id="telefone" required> -->
			<!-- DT NASCIMENTO -->
			<br>
			<label for="dtnasc">Data de Nascimento</label>
			<input type="date" placeholder="DD/MM/AAAA" max="9999-12-31" name="dtnasc" id="dtnasc" required>
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
				<input type="radio" id="masculino" name="genero" value="Masculino" required>
				<label for="feminino">Feminino</label>
				<input type="radio" id="feminino" name="genero" value="Feminino" required>
				<label for="feminino">Outro</label>
				<input type="radio" id="feminino" name="genero" value="Outro" required>
				<br>
			</div>
			<!-- E-MAIL -->
			<br>
			<label for="email">E-mail</label>
			<input type="email" placeholder="Digite o seu e-mail" name="email" required>
			<!-- SENHA -->
			<br>
			<label for="psw">Senha</label>
			<input type="password" placeholder="Digite a senha" name="psw" required> 
			<!-- CONFIRMAR SENHA -->
			<br>
			<label for="pswv">Confirmar Senha</label>
			<input type="password" placeholder="Confirme a senha" name="pswv" required> 
			<!-- Botão Registrar -->
			<br>
			<button type="submit">Registrar-se</button>
		</form>


	</div>
	<footer>
		<address class="copyright">Copyright NextLevelCO 2021.</address>
	</footer>
	<?php
    	if (isset($_REQUEST['uname']))
		{
        	$nome = addslashes($_REQUEST['uname']);
    		$telefone = addslashes($_REQUEST['telefone']);
        	$dt_nasc = addslashes($_REQUEST['dtnasc']);
        	$estado = addslashes($_REQUEST['estado']);
        	$cidade = addslashes($_REQUEST['cidade']);
        	$perfil = addslashes($_REQUEST['tipo']);
        	$genero = addslashes($_REQUEST['genero']);
        	$email = addslashes($_REQUEST['email']);
        	$senha = addslashes($_REQUEST['psw']);
        	$senhav = addslashes($_REQUEST['pswv']);
	
                if ($senha == $senhav)
				{                
                    //conecta no banco
					$u->conectar("u871029417_athon","92.249.44.207","u871029417_athon","Vitor@123");
					
                    if ($u->msgErro == "")
					{                        
                        if($u->cadastrar($nome, $telefone, $dt_nasc, $estado, $cidade, $perfil, $genero, $email, $senha))
						{
                            echo "
                                <script>
                                    alert('Cadastrado com sucesso !');
									window.location='./login.php';
                                </script>
                            ";
						} 	
						else 
						{
                            echo "
                                <script>
                                    alert('Email já Cadastrado');
                                </script>
                            ";
                        }
					} 	
				}
				else 
				{
					echo "
						<script>
							alert('Senhas não correspondem!');
						</script>
					";
				}
				 
		}	
		 
	?>



</body>
</html>