<?php
//dad0s do servidor
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED); //tirar mensagem de advertencia

$host = "localhost";
$login = "root";
$senha = "";
$banco = "busca"; //banco de dados aqui!

//efetuar conexão

$conecta = mysql_connect($host, $login, $senha) or print(mysql_error());
mysql_select_db($banco, $conecta) or print(mysql_query());

//verificação
if(!mysql_connect($host, $login, $senha)){
	echo"Erro ao conectar ao banco de dados!";
}



// o usuario e a senha está no phpmyadmin criptografada 61c5470d43e5bd72bd2c4a1f1329b760

?>
