<br>
<form action="./paginas/gestores/deletar_gestor.php" class="container col-md-6" method="POST">
	<input type="hidden" value="<?=$_POST[user_id]?>" name="id">
	
	<?php 
		foreach($_POST as $key => $value){
	?>	
	<div class="form-group">
		<input class="form-control" type="text" value="<?= $value ?>" readonly>
	</div>
<?php } ?>
	<small class="text-danger"> Deletar Gestor?</small>
	<input type="submit" value="confirmar" name="confirmar" class="btn btn-primary">
	<input type="submit" value="cancelar" name="cancelar" class="btn btn-danger">
</form>