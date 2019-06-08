<?php
	include "../vendor/autoload.php";
	if(!isset($_SESSION)) {
		iniciarSessao();
		
	}	
	if($_SESSION["login"]) {
		header("location: /gestor.php");

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "recursos/templates/css_metatags.html"; ?>
		<title>GERENCIAMENTO DE LOJA</title>
		
	</head>
	<body>
		
		<main>
			<form class="container col-sm-12 col-lg-6 col-md-8 border rounded-lg"  action="./paginas/gestores/autenticacao_gestor.php" method="POST" style="margin-top: 5%;">
				<div class="form-group ">
					<label for="nome" >Usuário:</label>
					<input type="text" class="form-control " placeholder="Usuário" name="usuario">
					
				</div>
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input type="password" class="form-control"  placeholder="Senha" name="senha">
				</div>
				<button type="submit" class="btn btn-primary btn-sm">Submit</button>
				<div>
					<small class="text-danger">Para utilizar os recursos do sistema é necessário efetuar o login.</small>
				</div>
			</form>
			
			<?= getAlerta("mensagem") ?>
		</main>
		
		
		<?php include_once "recursos/templates/js.html";
	
		?>
	</body>
</html>