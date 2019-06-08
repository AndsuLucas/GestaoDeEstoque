<?php 
include_once "../../../vendor/autoload.php";

if(!isset($_SESSION)){
	iniciarSessao();
}
$gestor = new Gestor();
if(autenticarPermissaoGestor()) {
	if(isset($_POST["confirmar"])) {
		$gestor->deletarGestor($_POST["id"]);
		alerta("mensagem","Registro deletado com sucesso","sucesso");
		header("location: /gestor.php?page=ver_gestores");
		
	} else {
		alerta("mensagem","Operação concelada!","sucesso");
		header("location: /gestor.php?page=ver_gestores");	
	}

} else {
	alerta("mensagem","Você não tem permissao para esta ação","erro");
	header("location: /gestor.php?page=cadastrar_gestor");
}










?>