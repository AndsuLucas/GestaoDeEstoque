<?php
function iniciarSessao(){
	return session_start();
}
//colocar esse função em outro arquívo mais tarde (refatoramento).
function carregarPagina(){
	$pagina = filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING);
	
	if(!$pagina){
		
		$pagina = "./paginas/home.php";
	}else{
		$pagina = "./paginas/$pagina".".php";
	}
	
	if(!file_exists($pagina)){

		$pagina = "./paginas/home.php";
	}
	return $pagina;
}
function autenticarPermissaoEstoque($permissao) {
	if(($_SESSION["gestor"]["permissao"] == $permissao)or($_SESSION["gestor"]["permissao"] == 5)or($_SESSION["gestor"]["permissao"] ==6)){

		return true;
	}else{
		return false;
	}

}
function autenticarPermissaoGestor() {

	if($_SESSION["gestor"]["permissao"] == 6) {
		
		return true;
	
	} else {

		return false;

	}

}
function verPermissao(){

	$permissao =$_SESSION["gestor"]["permissao"];

	switch ($permissao) {
		case 1:
			return "você tem a permissao de ver os produtos/estoque/fornecedores etc.";
			break;
			
		case 2:
			return "você tem a permissão de criar novos registros  de produtos/estoque/fornecedores etc.";
			break;
		case 3:
			return "você pode atualizar informações sobre produtos/estoque/fornecedores etc.";
			break;
		case 4:
			return "você pode deletar informações sobre produtos/estoque/fornecedores etc.";
			break;
		case 5:
			return "você pode atualizar/deletar/criar/ver registros de produtos/estoque/fornecedores.";
			break;
		case 6:
			return "você pode fazer todas as ações relacionadas ao estoque, além de gerenciar os gestores.";
			break;
	}

}



?>