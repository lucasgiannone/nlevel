
	//Definindo página home ao carregar site
	$(document).ready(function(){
		$("#conteudo").load("./pages/home.php");
		//Script de botões mudando as páginas com uncheck para o menu mobile		
		$("#logo").click(function(){
			document.title= 'Next Level - Home';
			window.location = '../';
		});
		
		$("#home").click(function(){
			document.title= 'Next Level - Home';
			window.location = './';
		});
		$("#sobre").click(function(){
			window.location = './pages/sobre.php';
		});
		$("#login").click(function(){
			window.location = './pages/login.php';
		});
		$("#reg").click(function(){
			window.location = './pages/registro.php';
		});
	});