<?php 
	include_once("settings/setting.php");
	@session_start();
	
?>

<html>
	<head><title>Sistema de Login</title></head>
	<body>
	<div id="login">
		<h1>Entrar</h1>
		<form action="" method="POST" enctype="multipart/form-data">
		<p><input type="text" name="usuario" placeholder="usuario" /></p>
		<p><input type="password" name="senha" placeholder="********" /></p>
		<p><input type="submit" value="Entrar" /></p>
		<p><input type="hidden" name="entrar" value="login" /></p>
	</div>
	

	
	<!-- placeholder="********" fundo do campo do formulario -->
<?php 
	if(isset($_POST['entrar'])&& $_POST['entrar'] == "login"){
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		
		if(empty($usuario) || empty($senha)){
			echo'Preencha todos os campos!';
		}
		else{
			$query = "SELECT nome, usuario, senha FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
			$result = mysql_query($query);
			$busca = mysql_num_rows($result); // vai retornar se achou ou não
			$linha = mysql_fetch_assoc($result);
			
			if($busca > 0){
				$_SESSION['nome'] = $linha['nome'];
				$_SESSION['usuario'] = $linha['usuario'];
				header('location: logado.php'); //aqui redireciona para a pagina de logado!
				exit;
			}else{
				echo'Usuario e senha invalidos!';
			}
		}
	}
 ?>
<br>
	<a href="cadastro.php">Ainda não possui cadastro? - Cadastre-se</a>
	</body>
</html>