<?php 
class Categoria {
	private $id_categoria;
	private $nome_categoria;


	public function cadastrarCategoria ($nome_categoria) {

		$this->nome_categoria = addslashes($nome_categoria);
		$pdo = connectar();

		$sql = "INSERT INTO categoria SET nome_categoria = ?";


		$query = $pdo->prepare($sql);
		$query->bindValue(1,$this->nome_categoria);
		$query->execute();


	}

	public function mostrarCategorias () {

		$pdo = connectar();
		
		$sql = "SELECT nome_categoria FROM categoria";

		$query = $pdo->prepare($sql);	

		$query->execute();

		return $query->fetchAll();



	}
	public function deletarCategoria ($id_cagoria) {

		$this->id_categoria = addslashes($id_categoria);

		$pdo = connectar();


		$sql = "DELETE FROM categoria WHERE id_categoria = ?";

		$query = $pdo->prepare($sql);

		$query->execute();

	}





}


















?>