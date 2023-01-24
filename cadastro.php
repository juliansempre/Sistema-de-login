<?php
	include_once("settings/setting.php");
	@session_start();
	if(isset($_SESSION['nome']) && isset($_SESSION['usuario'])){
		header('Location: logado.php');
		exit;
	}
?>
<html>
<head><title>Cadastrar</title></head>
<body>
<a href="index.php"> Inicio</a>
	<div id="cadastro">
		<h3>Cadastre-se</h3>
		
		<form action="" method="POST" enctype="multipart/form-data">
			<label>Nome: <label>
			<input type="text" name="nome" id="nome" placeholder="Meu nome" /><br> 
			<label>Usuario: <label>
			<input type="text" name="usuario" id="usuario" placeholder="Meu usuario" /><br> 
			<label>Senha: <label>
			<input type="password" name="senha" id="senha" placeholder="********" /> <br><br>
			<input type="submit" value="Cadastrar" />
			<input type="hidden" name="cadastrar" value="register" />
			
			
			
		</form>
	</div>

<?php
	if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == "register"){
		$nome = $_POST['nome'];
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		
			if(empty($nome) || empty($usuario) || empty($senha)){
				echo"<script language='javascript' type='text/javascript'>alert('Volte e preencha todos os campos.');window.location.href='cadastro.php';</script>";
				exit;
			}else{
				$query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
				$result = mysql_query($query);
				$conta = mysql_num_rows($result);
				$busca = mysql_fetch_assoc($result);
				
				if($conta > 0){
					echo"Usuario já cadastrado. ";
				}else{
					$cadastrar = "INSERT INTO usuarios (nome, usuario, senha) VALUES ('$nome', '$usuario', '$senha')";
						if(mysql_query($cadastrar)){
							
							$_SESSION['nome'] = $nome;
							$_SESSION['usuario'] = $usuario;
							
							echo"Cadastro efetuado com sucesso!";
							echo"Seus dados são: </br>";
							echo"Usuário: ". $usuario ."</br>";
							echo"Senha: ". $senha ."</br>";
							echo"<a href='index.php'> Clique aqui para entrar";
						}else{
							echo"Erro ao cadastrar, contate o administrador";
						}
				}
				
			}
	}
?>	
	

</body>
</html>



















