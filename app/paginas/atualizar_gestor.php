<?php 
include "../../vendor/autoload.php";

?>

<form action="./paginas/gestores/atualizar_gestor.php" class="container" method="POST">
	<input type="hidden" name="id" value="<?=$_POST[user_id]?>">
	<div class="form-group">
		<label for="usuario">Nome:</label>
		<input class="form-control" type="text" name="usuario" value="<?=$_POST[username]?>" >
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
		<input class=" form-control" type="email" name="email" value="<?=$_POST[user_email]?>">
	</div>
	<div class="form-group">
		<label for="permissao">Permissão:</label>
		<select id="permissao" class="form-control form-control" name="permissao">
            	<option value="1">Ver registros (estoque)</option>
            	<option value="2">Criar registros (estoque)</option>
            	<option value="3">Atualizar (estoque)</option>
           		<option value="4">Deletar registros (estoque) </option>
            	<option value="5">Super </option>
        	    <option value="6">Admin </option>
   		</select>
   		<small class="text-danger"><?= "Atualmente a permissão do usuário é <strong>".$_POST["user_permissao"]."</strong>"?></small>
   	</div>
	<input type="submit" class="btn btn-primary" name="confirmar" value="confirmar">
	<input type="submit" class="btn btn-danger" name="cancelar" value="cancelar">
</form>