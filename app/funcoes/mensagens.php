<?php  

function  alerta($sessao,$msg,$tipoMsg) {
	$_SESSION[$sessao]= $msg;
	if($tipoMsg == "erro"){
		$_SESSION[$sessao]="<div width='150px'class='alert alert-danger col-lg-6 col-sm-12' style='positon:relative; left:25%; margin-top:20px' role='alert'>".$msg."</div>";
	}else{
		$_SESSION[$sessao]="<div width='150px'class='alert alert-success col-lg-6 col-sm-12' style='positon:relative; left:25%; margin-top:20px' role='alert'>".$msg."</div>";
	}
	


}
 
function getAlerta($sessao) {
		if(isset($_SESSION[$sessao])){
			$mensagem = $_SESSION[$sessao];
			unset($_SESSION[$sessao]);
			return $mensagem;
		}

}












?>