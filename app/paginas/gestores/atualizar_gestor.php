<?php 
require_once "../../../vendor/autoload.php";
if(!isset($_SESSION)){
	iniciarSessao();
}
$gestor = new Gestor();
if(autenticarPermissaoGestor()) {
	if(isset($_POST["confirmar"])) {
		if(validacaoForm($_POST)) {
			alerta("mensagem","Dados atualizados com sucesso!","sucesso");
			$gestor->atualizarGestor(
				$_POST["id"],
				$_POST["usuario"],
				$_POST["email"],
				$_POST["permissao"]
			);

			header("location: /gestor.php?page=ver_gestores");
		} else {
			header("location: /gestor.php?page=ver_gestores");
			alerta("mensagem","Não é permitido deixar campos vazios","erro");
		}
	} else {
		alerta("mensagem","Operação concelada!","sucesso");
		header("location: /gestor.php?page=ver_gestores");	
	}

}else {
	alerta("mensagem","Você não tem permissao para acessar esta página","erro");
	header("location: /");
}




?>