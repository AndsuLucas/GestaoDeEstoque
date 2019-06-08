<?php 

function validacaoForm(array $fields){
	$validacao = true;
	foreach($fields as $key => $value){
		if(empty(trim($fields[$key]))){
			$validacao = false;
			
		}
	
	}

	return $validacao;

}

function tratarDados(array $fields){

	$dados = [];

	foreach ($fields as $key => $type) {
			
			switch ($type) {
					case("s"):

						$dados[$key] = utf8_encode(filter_var($_POST[$key],FILTER_SANITIZE_STRING));
				
					case("i"):

						$dados[$key] = filter_var($_POST[$key], FILTER_SANITIZE_NUMBER_INT);
				
					case("e"):
						$dados[$key] = filter_var($_POST[$key], FILTER_SANITIZE_EMAIL);
					
					
				}	
	}
	
	return $dados;


}
/*
function tirarAcentos($fields) {

	foreach ($collection as $value) {
			str_replace($value,"á",)
			str_replace($value,"é",)
			str_replace($value,"í",)
			str_replace($value,"ó",)
			str_replace($value,"ú",)
			str_replace($value,"Á",)
			str_replace($value,"É",)
			str_replace($value,"Í",)
			str_replace($value,"Ó",)
			str_replace($value,"Ú",)
			

	}

}
*/









?>