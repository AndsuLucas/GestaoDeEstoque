<?php 
/*
	id_produto    | int(11)     | NO   | PRI | NULL    | auto_increment |
| nome_produto  | varchar(50) | NO   |     | NULL    |                |
| preco_unidade | double(8,2) | NO   |     | NULL    |                |
| quantidade    | int(11)     | NO   |     | NULL    |                |
| fornecedor    | int(14)     | NO   | MUL | NULL    |                |
| categoria     | int(11)     | NO   | MUL | NULL    |                |
*/


public class Produto {

	private $id_produto;
	private $nome_produto;
	private $preco_unidade;
	private $quantidade;
	private $fornecedor;
	private $categoria;


	public function cadastrarProduto (
		
		 $nome_produto,
		$preco_unidade, $quantidade,
		$fornecedor, $categoria
		
	){

		
		$this->nome_produto = addslashes($nome_produto);
		$this->preco_unidade = addslashes($preco_unidade);
		$this->quantidade = addslashes($quantidade);
		$this->fornecedor = addslashes($fornecedor);
		$this->categoria = addslashes($categoria);
		
		//colocar no construtor. É muito melhor.
		$pdo = connectar();

		$sql = "
			INSERT INTO produto SET 
			nome_produto = ?, preco_unidade = ?,
			quantidade = ?, fornecedor = ?, categoria = ?	
		";

		$query = $pdo->prepare($sql);
		
		$query->bindValue(1,$this->nome_produto);
		$query->bindValue(2,$this->preco_unidade);
		$query->bindValue(3,$this->quantidade);
		$query->bindValue(4,$this->fornecedor);
		$query->bindValue(5,$this->categoria);


		$query->execute();

		
	}

	public function verProdutos{
		$pdo = connectar();
		//INNER JOIN AQUI	
		$sql = "SELECT * FROM produto ";

		$query = $pdo->prepare($sql);


		$query->execute();

		return $query->fetchAll();



	}

	public function deletarProduto($id_produto){
		$pdo = connectar();
		$this->produto = addslashes($id_produto);
		$sql = "DELETE FROM produto WHERE id_produto = ?";

		$query = $pdo->prepare($sql);


		$query->bindValue(1,$this->produto);

		$query->execute();



	}

	public function atualizarProduto(
		$id_produto,$nome_produto,
		$preco_unidade, $quantidade,
		$fornecedor, $categoria
	);



		$this->nome_produto = addslashes($nome_produto);
		$this->preco_unidade = addslashes($preco_unidade);
		$this->quantidade = addslashes($quantidade);
		$this->fornecedor = addslashes($fornecedor);
		$this->categoria = addslashes($categoria);
		$this->id_produto = addslashes($id_produto);

		$pdo = connectar();


		$sql = "
			UPDATE produto SET 
			nome_produto = ?, preco_unidade = ?,
			quantidade = ?, fornecedor = ?, categoria = ? WHERE id_produto =?	
		";

		$query = $pdo->prepare($sql);


		$query->bindValue(1,$this->nome_produto);
		$query->bindValue(2,$this->preco_unidade);
		$query->bindValue(3,$this->quantidade);
		$query->bindValue(4,$this->fornecedor);
		$query->bindValue(5,$this->categoria);
		$query->bindValue(6,$this->id_produto);

		$query->execute().

}






















?>