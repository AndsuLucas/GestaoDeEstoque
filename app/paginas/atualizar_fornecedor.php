<?php 
include "../../vendor/autoload.php";

?>
<!--
<th scope="col">Cnpj</th>
			<th scope="col">Nome_empresa</th>
			<th scope="col">Cep</th>
			<th scope="col">Telefone</th>
			<th scope="col">Email</th>
-->
<form action="./paginas/fornecedores/atualizar_fornecedor.php" class="container" method="POST">
	<input type="hidden" name="pk" value="<?=$_POST[cnpj]?>" >
	<div class="form-group">
		<label for="cnpj">Cnpj:</label>
		<input class="form-control" type="number" name="cnpj" value="<?=$_POST[cnpj]?>" >
	</div>
	<div class="form-group">
		<label for="nome_empresa">Nome da Empresa:</label>
		<input class=" form-control" type="text" name="nome_empresa" value="<?=$_POST[nome_empresa]?>">
	</div>
	<div class="form-group">
		<label for="cep">Cep:</label>
		<input class=" form-control" type="number" name="cep" value="<?=$_POST[cep]?>">
	</div>
	<div class="form-group">
		<label for="telefone">Telefone:</label>
		<input class=" form-control" type="number" name="telefone" value="<?=$_POST[telefone]?>">
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
		<input class=" form-control" type="email" name="email" value="<?=$_POST[email]?>">
	</div>
	<input type="submit" class="btn btn-primary" name="confirmar" value="confirmar">
	<input type="submit" class="btn btn-danger" name="cancelar" value="cancelar">
</form>