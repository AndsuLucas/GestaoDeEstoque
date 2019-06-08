<?php 
include_once "../../../vendor/autoload.php";

if(!isset($_SESSION)) {
	iniciarSessao();
}
$fornecedor = new Fornecedor();

if(isset($_POST["confirmar"])) {
	$fornecedor->deletarFornecedor($_POST["id"]);
	alerta("mensagem","Funcionário deletado com sucesso","success");
	header("location: /gestor.php?page=ver_fornecedores");
}else{
	if(isset($_POST["cancelar"])){
		alerta("mensagem","Ação cancelada","success");
		header("location: /gestor.php?page=ver_fornecedores");

		}	
}

?>