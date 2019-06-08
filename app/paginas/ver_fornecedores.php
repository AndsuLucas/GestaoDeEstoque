<?php
$fornecedor = new Fornecedor();
$fornecedores = $fornecedor->mostrarFornecedores();
//dar uma olhada no fetchall e fetch assoc. pois restou-me uma dúvida.
if(!isset($_SESSION)) {
	iniciarSessao();
}
?>

<script type="text/javascript" src="./recursos/js/funcoes.js">
</script>
<?= getAlerta("mensagem")?>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Cnpj</th>
			<th scope="col">Nome_empresa</th>
			<th scope="col">Cep</th>
			<th scope="col">Bairro</th>
			<th scope="col">Telefone</th>
			<th scope="col">Email</th>
			<th scope="col">Rua</th>
			<th scope="col">Uf</th>
			<th scope="col">Cidade</th>
			<th scope="col" colspan="2" >Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($fornecedores as $fornecedor) {
			
		?>
		<tr>
			
			<td class="dados"><?= $fornecedor["cnpj"] ?></td>
			<td class="dados"><?= $fornecedor["nome_empresa"] ?></td>
			<td class="dados"><?= $fornecedor["cep"] ?></td>
			<td class="dados"><?= $fornecedor["bairro"] ?></td>
			<td class="dados"><?= $fornecedor["telefone"]?></td>
			<td class="dados"><?= $fornecedor["email"]?></td>
			<td class="dados"><?= $fornecedor["rua"]?></td>
			<td class="dados"><?= $fornecedor["uf"]?></td>
			<td class="dados"><?= $fornecedor["cidade"]?></td>
			
			<td>
				<form action="?page=atualizar_fornecedor" method="POST">
					<input class="frm-update"  type="hidden" name="cnpj" value="">
					<input class="frm-update" type="hidden" name="nome_empresa" value="">
					<input class="frm-update" type="hidden" name="cep" value="">
					<input class="frm-update" type="hidden" name="bairro" value="">
					<input class="frm-update" type="hidden" name="telefone" value="">
					<input class="frm-update" type="hidden" name="email" value="">
					<input class="frm-update" type="hidden" name="rua" value="">
					<input class="frm-update" type="hidden" name="uf" value="">
					<input class="frm-update" type="hidden" name="cidade" value="">
					<button type="submit" class="btn btn-primary text-light">Atualizar</button>
				</form>
			</td>
			<td>
				<form action="?page=deletar_fornecedor" method="POST">
					<input class="frm-delete"  type="hidden" name="cnpj" value="">
					<input class="frm-delete" type="hidden" name="nome_empresa" value="">
					<input class="frm-delete" type="hidden" name="cep" value="">
					<input class="frm-delete" type="hidden" name="bairro" value="">
					<input class="frm-delete" type="hidden" name="telefone" value="">
					<input class="frm-delete" type="hidden" name="email" value="">
					<input class="frm-delete" type="hidden" name="rua" value="">
					<input class="frm-delete" type="hidden" name="uf" value="">
					<input class="frm-delete" type="hidden" name="cidade" value="">
					<button type="submit" class="btn btn-primary text-light">Deletar</button>
				</form>
			</td>
			
		</tr>
		<?php } ?>
	</tbody>
	
</table>s