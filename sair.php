<?php
	//removendo dados da sessão
	
	@session_start();
	session_destroy();
	unset($_SESSION);
	header('location: index.php');
	exit;
?>