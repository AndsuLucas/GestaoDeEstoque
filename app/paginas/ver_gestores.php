<?php
include_once "../../../vendor/autoload.php";
if(!iniciarSessao()) {
	iniciarSessao();
}
if(!$_SESSION["login"]) {
	header("location: /");
}
if(!autenticarPermissaoGestor()){
	header("location: /");
}
$gestor = new Gestor();
$registros = $gestor->mostrarGestores();
if(isset($_POST["submeter"])) {
	$registros = $gestor->filtrarGestor($_POST["filtro"],$_POST["busca"]);
	$contagem_registros = count($registros);
	if($contagem_registros == 0) {
		$mensagem = "<small class=text-danger>Nenhum registro encontrado.</small>";
	}else{
		$mensagem = "<small class=text-danger >$contagem_registros registros encontados.</small>";
	}
}
?>
<br>
<form class="form-inline col-md-8 container" method="POST">
	<div class="form-group ">
		
		<input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Buscar Gestor">
	</div>
	<div class="form-group ">
		<label for="inputState">Filtro:</label>
		<select id="inputState" class="form-control" name="filtro">
			<option value="id_gestor">Id</option>
			<option value="usuario">Usuario</option>
			<option value="email">Email</option>
			<option value="descricao">Permissão</option>
		</select>
	</div>
	<div class="form-group ">
		<input type="text" class="form-control" id="busca" placeholder="Insiras palavras chave.." name="busca">
	</div>
	<button type="submit" class="btn btn-primary " name="submeter">Buscar</button>
	<?= $mensagem ?>
</form>
<br>
<?= getAlerta("mensagem");?>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Linha</th>
			<th scope="col">id</th>
			<th scope="col">Usuário</th>
			<th scope="col">Email</th>
			<th scope="col">Permissão</th>
			<th scope="col" colspan="2" >Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registros as $dados) {
			$contador++
		?>
		<tr>
			<th scope="row"><?= $contador ?></th>
			<td><?= $dados[0] ?></td>
			<td><?= $dados[1] ?></td>
			<td><?= $dados[2] ?></td>
			<td><?= $dados[3] ?></td>
			<td>
				<form action="?page=atualizar_gestor" method="POST">
					<input type="hidden" value="<?=$dados[0]?>" name="user_id">
					<input type="hidden" name="username" value="<?=$dados[1]?>">
					<input type="hidden" name="user_email" value="<?=$dados[2]?>">
					<input type="hidden" name="user_permissao" value="<?=$dados[3]?>">
					<button type="submit" class="btn btn-primary text-light">Atualizar</button>
				</form>
			</td>
			<td>
				<form action="?page=deletar_gestor" method="POST">
					<input type="hidden" value="<?=$dados[0]?>" name="user_id">
					<input type="hidden" name="username" value="<?=$dados[1]?>">
					<input type="hidden" name="user_email" value="<?=$dados[2]?>">
					<input type="hidden" name="user_permissao" value="<?=$dados[3]?>">
					<button type="submit" class="btn btn-primary text-light">Deletar</button>
				</form>
			</td>
		</tr>
		<?php } ?>
	</tbody>
	
</table>