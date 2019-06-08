<?php 
	if(!isset($_SESSION)){
		iniciarSessao();
	}
?>

<div class="container col-md-12 text-center jumbotron">
	<a class="h3" data-toggle="modal" data-target="#exampleModalLong" style="cursor: pointer">
		Seja bem Vindo<br><span class="text-muted hover">Clique aqui para informações sobre o sistema.</span>
	</a>
	<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Boas vindas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Seja bem vindo ao sistema!
					<br>
					Na barra de menu acima vocẽ pode ter acesso a todas as funcionalidades do sistema. Lembrando que dependendo da ação, você tera que ter uma permissão específica.
					<br>
					<small class="text-danger h5">
						<?= "sua permissão é: ".verPermissao() ?>
					</small>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				
				</div>
			</div>
		</div>
	</div>
</div>