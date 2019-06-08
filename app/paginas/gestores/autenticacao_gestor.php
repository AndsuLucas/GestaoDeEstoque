<?php 
include_once "../../../vendor/autoload.php";
iniciarSessao();
$usuario = addslashes($_POST["usuario"]);
$senha = addslashes($_POST["senha"]);

$gestor = new Gestor();
																															

if($gestor->login($usuario,$senha)){
	

	$_SESSION["login"] = true;
	$_SESSION["gestor"] = $gestor->retornarDados();

	print_r($_SESSION["gestor"]);
	
	
	header("location: /gestor.php");



}else{
	alerta("mensagem","Login ou senha inválidos","erro");
	header("location: /");
	
}



if(isset($_POST["sair"])) {
	session_destroy();
}




?>