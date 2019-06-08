<?php include "../vendor/autoload.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<?php include_once "recursos/templates/css_metatags.html"; ?>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">Sistema de Gestão</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Gestores
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="?page=cadastrar_gestor">Cadastrar Gestor</a>
							<a class="dropdown-item" href="?page=ver_gestores">Ver Gestores</a>
							
						</div>
					</li>
					
				</ul>
				<form class="form-inline my-2 my-lg-0" method="POST" action="./paginas/gestores/autenticacao_gestor.php">
					<button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="sair" value="Sair">Sair</button>
				</form>
			</div>
		</nav>
		<?php
		
		iniciarSessao();
		
		if(!$_SESSION["login"]) {
			
			header("location: /");
		}
		
		?>
		
		<?php	include_once carregarPagina(); ?>
		
		<?php include_once "recursos/templates/js.html";?>
	</body>
	
</html>