<?php
if(!iniciarSessao()){
  iniciarSessao();
}
if(!$_SESSION["login"]){
  header("location: /");
}
?>
<hr>
<?= getAlerta("mensagem"); 
 
?>
<div class="container">
  <div class="row">
    <div class="container col-md-8">
      <form action="/paginas/gestores/cadastrar_gestor.php" method="POST">
        
        <div class="form-group">
          <label for="usuario">Nome De Usuário</label>
          <input type="text" class="form-control" id="usuario" placeholder="Nome" name="usuario">
        </div>
        <div class="form-group">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
        </div>
        <div class="form-group">
          <label for="repetir">Repetir Senha</label>
          <input type="password" class="form-control" id="repetir" placeholder="Repetir Senha" name="repetir">
        </div>
        <div class="form-group">
          <label for="permissao">Permissão</label>
          <select id="permissao" class="form-control" name="permissao">
            <option value="1">Ver registros (estoque)</option>
            <option value="2">Criar registros (estoque)</option>
            <option value="3">Atualizar (estoque)</option>
            <option value="4">Deletar registros (estoque) </option>
            <option value="5">Super </option>
            <option value="6">Admin </option>
          </select>
        </div>
        <input type="submit" class="btn btn-primary btn-md" value="Cadastrar">
      </form>
    </div>
    <div class="container col-md-4">
      <div class="card" style="width: 18rem;">
        <img src="../recursos/templates/imagens/lock.png" class="card-img-top" alt="..." style="height: 190px;">
        <div class="card-body">
          <h5 class="card-title">Cadastrar Gestores</h5>
          <p class="card-text">Para Cadastrar os funcionários é necessário ter as permissões para tal.</p>
          <br>
          <?= "sua permissão é: ".verPermissao() ?>
          </div>
          
            
          
      </div>
    </div>
  </div>
</div>