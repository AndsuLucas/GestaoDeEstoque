<?php 
// ( [email] => a.lucassilvadeoliveira@gmail.com [permissao] => 3 [repetir] => 123 [senha] => 123 [usuario] => andsu )
include_once "../../../vendor/autoload.php";
iniciarSessao();
$gestor = new Gestor();
$dados = tratarDados(array(
		"email" => "e",
		"permissao" => "i",
		"repetir" => "s",
		"senha" => "s",
		"usuario" => "s"
		));
				

if(autenticarPermissaoGestor()) {
	//caso os dados não estejam todos preenchidos
	if (!validacaoForm($dados)) {
		alerta("mensagem","Preencha todos os campos!","erro");
		header("location: /gestor.php?page=cadastrar_gestor");
	}//caso a senha não seja igual a repetição
	if ($dados["senha"] != $dados["repetir"]) {
		alerta("mensagem","Senha não confere","erro");
		header("location: /gestor.php?page=cadastrar_gestor");
	}//caso tudo esteja bem
	else {
		$gestor->cadastrarGestor($dados["permissao"],$dados["usuario"],$dados["email"],$dados["senha"]);
		alerta("mensagem","usuario cadastrado com sucesso","sucesso");
		header("location: /gestor.php?page=cadastrar_gestor");
		
	}
}//caso o usuário não tenha permissão para tal ação
else {
 	alerta("mensagem","Você não tem permissao para esta ação","erro");
	header("location: /gestor.php?page=cadastrar_gestor");
			
}

?>