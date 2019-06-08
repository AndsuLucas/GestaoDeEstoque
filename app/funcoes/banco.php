<?php
function connectar(){	
	try{
		$pdo = new PDO("mysql:host=localhost;dbname=sistema_estoque;charset=utf8","root","password");
		return $pdo;
	}catch(PDOException $e){
	
		die($e);
	}
}

?>