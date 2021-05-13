<!-- PHP -->
<?php
    require_once '../class/usuarios.php';
    $u = new Usuario;
?>
<!-- HTML -->
<!DOCTYPE html>
<html lag="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title id="title">Next Level - Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/login.css" rel="stylesheet">
	<link rel="icon" href="https://athonedu.com.br/wp-content/uploads/2021/01/favicon.png" sizes="192x192">
	<script src="../scripts/fontawesome.js" crossorigin="anonymous"></script>
	<script src="../scripts/jquery.js"></script>
    <!-- SCRIPT NAV -->
	<script src="../scripts/nav.js"></script>
</head>
<body>
<!-- NAVBAR -->
<nav>
    <div id="container">
    <!-- Menu mobile a partir de checkbox -->
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-align-left"></i>
    </label>
    <!-- Logo -->
    <a id="logo"><img class="logo"src="../images/athonLogo.svg"></a>
    <!-- Botões da Navbar -->
    <ul class="buttons">
        <li class="item"><a class="link"	id="home" 	href="../">Home</a></li>
        <li class="item"><a class="link" 	id="sobre"	href="./sobre.php">Sobre</a></li>
        <li class="item"><a class="link"	id="login"	href="./login.php">Login</a></li>
        <li class="item"><a class="link" 	id="reg"	href="./registro.php">Cadastre-se</a></li>
        
    </ul>
    </div>
</nav>
<!-- LOGIN -->
<div id="loginpage">
	<!-- FORM DE LOGIN -->
	<form method="post">
		<!-- EMAIL -->
		<a id="logoLogin"><img class="logoLogin"src="../images/athonLogo.svg"></a>
		<label for="uname"><b>E-mail</b></label>
		<input class="input-login" type="text" placeholder="Digite o seu e-mail" name="uname" required>
		<!-- SENHA -->
		<div class="input-line"></div>		
		<label for="psw"><b>Senha</b></label>
		<input type="password" placeholder="Digite a senha" name="psw" required> 
		<!-- BOTÃO -->
		<div class="button-wrap">
	  	<button type="submit">Entrar</button>
		<button type="button" id="forgot">Esqueceu a senha?</button>		
	</div>
	</form>
</div>
<script>
    $("#forgot").click(function(){
        document.title= "Next Level - Recuperar";
        window.location = './esqueceu.php';
    });
</script>

<!-- FOOTER -->
<footer>
    <address class="copyright">Copyright NextLevelCO 2021.</address>
</footer>
<!-- PHP -->
<?php
    if (isset($_REQUEST['uname']) && isset($_REQUEST['psw'])){
        $email = addslashes($_REQUEST['uname']);
        $senha = addslashes($_REQUEST['psw']);
        $u->conectar("u871029417_athon","92.249.44.207","u871029417_athon","Vitor@123");
        /*$u->conectar("next_level","localhost","root",""); */

        if ($u->msgErro == ""){
            if($u->logar($email, $senha)){
                //pagina do usuario
                switch($_SESSION['perfil']){
                    case 1:echo"
                            <script>
                                alert('Login efetuado com sucesso!');
                                window.location.href='../dash/';
                            </script>
                            ";
                    break;
                    case 2:echo"
                    <script>
                        alert('Login efetuado com sucesso!');
                        window.location.href='../dash/';
                    </script>
                    ";
                    break;
                    case 3:echo"
                    <script>
                        alert('Login efetuado com sucesso!');
                        window.location.href='../dash/';
                    </script>
                    ";
                    case 4:echo"
                    <script>
                        alert('Login efetuado com sucesso!');
                        window.location.href='../dash/';
                    </script>
                    ";
                    break;

                    default:
                    echo"
                    <script>
                        window.location.href='../';
                    </script>
                    ";
                    break;
                }
        }   else {
                echo "
                    <script>
                        alert('Email ou Senha inválidos!');
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Erro: $u->msgErro');
                </script>
            ";
        }

    }
?>
</body>
</html>