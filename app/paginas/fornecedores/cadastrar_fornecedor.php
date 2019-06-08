<?php 
ini_set('default_charset','UTF-8');




include_once "../../../vendor/autoload.php";
$fornecedor = new Fornecedor();


//inserindo os dados caputrados na API
//TENHO QUE ARRUMA UM JEITO MELHOR DE TRATALOS POIS ESTA REMOVENDO LETRAS.


//tratando os dados
$dados_fornecedor = tratarDados( array (
	"nome_empresa" => "s",
	"cep" => "i",
	"cnpj" => "i",
	"telefone" => "i",
	"email" => "e"
));

//validando
if (!validacaoForm($dados_fornecedor)) {
	alerta("mensagem","Preencha todos os campos!","erro");
	header("location: /gestor.php?page=cadastrar_fornecedor");
} else {
	
	//capturando dad;os sobre endereço através da api
	$dados_endereco = json_decode(file_get_contents("https://viacep.com.br/ws/".$_POST["cep"]."/json/"),true);

	$dados_fornecedor["bairro"] = $dados_endereco["bairro"];
	$dados_fornecedor["cidade"] = $dados_endereco["localidade"];
	$dados_fornecedor["rua"] = $dados_endereco["logradouro"];
	$dados_fornecedor["uf"] = $dados_endereco["uf"];
	$fornecedor->cadastrarFornecedor(
		$dados_fornecedor["cnpj"],$dados_fornecedor["nome_empresa"],
		$dados_fornecedor["cep"],$dados_fornecedor["bairro"],
		$dados_fornecedor["telefone"],$dados_fornecedor["email"],
		$dados_fornecedor["rua"],$dados_fornecedor["uf"],
		$dados_fornecedor["cidade"]

	);
	alerta("mensagem","Fornecedor cadastrado com sucesso!","sucesso");
	header("location: /gestor.php?page=ver_fornecedores");

}
















?>