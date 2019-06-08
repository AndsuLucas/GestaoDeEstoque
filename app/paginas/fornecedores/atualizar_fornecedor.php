<?php 
include_once "../../../vendor/autoload.php";
ini_set('default_charset','UTF-8');

if(!isset($_SESSION)){
	iniciarSessao();
}
$fornecedor = new Fornecedor();

//capturando dad;os sobre endereço através da api
//caso o cep seja inválido, mostrar na tela.

//inserindo os dados caputrados na API
//TENHO QUE ARRUMA UM JEITO MELHOR DE TRATALOS POIS ESTA REMOVENDO LETRAS.


//falta ver as permissoes
if(isset($_POST["confirmar"])){
	$dados_endereco = json_decode(file_get_contents("https://viacep.com.br/ws/".$_POST["cep"]."/json/"),true);

	$dados_fornecedor = tratarDados( array (
		"nome_empresa" => "s",
		"cep" => "i",
		"cnpj" => "i",
		"telefone" => "i",
		"email" => "e",
		"pk" => "i"
	));
	$dados_fornecedor["bairro"] = $dados_endereco["bairro"];
	$dados_fornecedor["cidade"] = $dados_endereco["localidade"];
	$dados_fornecedor["rua"] = $dados_endereco["logradouro"];
	$dados_fornecedor["uf"] = $dados_endereco["uf"];
	if (!validacaoForm($dados_fornecedor)) {
		alerta("mensagem","Preencha todos os campos!","erro");
		header("location: /gestor.php?page=ver_fornecedores");
	}else {
		echo "conirmado";
		$fornecedor->atualizarFornecedor(
			$dados_fornecedor["pk"],$dados_fornecedor["cnpj"],
			$dados_fornecedor["nome_empresa"],$dados_fornecedor["cep"], 
			$dados_fornecedor["telefone"],$dados_fornecedor["email"]
		);
		alerta(
			"mensagem","Dados atualizados com sucesso!",
			"sucesso"
		);
		header("location: /gestor.php?page=ver_fornecedores");
	}
}else{
	alerta("mensagem","Processo cancelado.",
			"sucesso");
	header("location: /gestor.php?page=ver_fornecedores");
}
?>