<?php 

include_once "../../../vendor/autoload.php";

	if(!iniciarSessao()) {
		iniciarSessao();
	}
$categoria = new Categoria();


$dados_categoria = tratarDados(array(
	"nome_categoria" => "s"
));



if(!validacaoForm($dados_categoria)) {
	alerta("mensagem","Preencha todos os campos!","erro");
	header("location: /gestor.php?page=cadastrar_categoria");

} else {
	$categoria->cadastrarCategoria(
		$dados_categoria["nome_categoria"]
	);

	alerta("mensagem","Categoria cadastrada com sucesso!","sucesso");

	//header("location:");



}
















?>