<?php 
if(!iniciarSessao()) {

	iniciarSessao();

}
?>
<?= getAlerta("mensagem"); ?>
<form style="max-width: 350px; margin: auto;" method="POST" action="./paginas/categorias/cadastrar_categoria.php">
  <div class="form-group">
    <label for="categoria">Cadastrar Categoria</label>
    <input type="text" class="form-control" id="categoria" name="nome_categoria">
 </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>