<?php
include_once("settings/setting.php");
@session_start();

$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];

 if(isset($_SESSION['nome']) && isset($_SESSION['usuario']))	//verifica se sessao foi setada
  {

  }else{															

      header("location:index.php"); //se nao foi então manda para index.html
  } 
  
?>
<html>
<head>
	<title>Bem vindo <?php echo $usuario; ?></title>
</head>

<body>
	<p>Bem vindo <?php # echo $nome; ?> <b><?php echo $usuario; ?></b> <a href="sair.php"> Sair </a> </p>
	
	<br>
	<!-- SISTEMA DE BUSCA ABAIXO -->
	<div id="busca">
	Busca de Usuários: <br>
	<form accept="" method="POST" enctype="multipart/form-data">
		<input type="text" name="busca" placeholder="Digite sua busca" />
		<input type="submit" name="Buscar" value=" Procurar " />
		<input type="hidden" name="buscar" value="usuario" />
		
		
	
	</form>
	</div>
<?php
	if(isset($_POST['buscar']) && $_POST['buscar'] == "usuario"){
		$busca = $_POST['busca'];
		
		if(empty($busca)){
			echo"Digite sua busca!";
		}else{
			$query = "SELECT * FROM usuarios WHERE nome LIKE '%$busca%' or usuario LIKE '%$busca%'";
			$result = mysql_query($query);
			$total = mysql_num_rows($result);
			
			if($total <= 0){
				echo"Nunhum usuario foi encontrado com esse nome!";
			}else{
				while($row = mysql_fetch_array($result)){
					$nome = $row['nome'];
					$usuario = $row['usuario'];
					$senha = $row['senha'];
					
					echo "Nome: ".$nome . " | " . "Usuário: ".$usuario . " </br> ";
					
				}
			}
			
		}
	}
		
?>	
<?php # echo "Senha: ".$senha . " ";   ?> 
	
</body>

























</html>