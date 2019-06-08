<?php 
class Fornecedor {

	private $cnpj;
	private $nome_empresa;
	private $cep;
	private $bairro;
	private $telefone;
	private $email;
	private $rua;
	private $uf;
	private $cidade;
	
	public function mostrarFornecedores() {

		$pdo = connectar();

		$sql = "SELECT * FROM fornecedor";
		$query = $pdo->prepare($sql);
		$query->execute();


		return $query->fetchAll();



	}
	public function cadastrarFornecedor(
		$cnpj, $nome_empresa,
	 	$cep, $bairro,
	 	$telefone, $email,
	 	$rua, $uf, $cidade
	 ) {
	 		$this->cnpj = $cnpj;
			$this->nome_empresa = $nome_empresa;
			$this->cep = $cep;
			$this->bairro = $bairro;
			$this->telefone = $telefone;
			$this->email = $email;
			$this->rua = $rua;
			$this->uf = $uf;
			$this->cidade = $cidade;

	 	$pdo = connectar();
		
		$sql = "INSERT INTO fornecedor SET cnpj = ?, nome_empresa = ?, cep = ?, bairro = ?, telefone = ?, email = ?, rua = ?, uf = ?, cidade = ?";

		$query = $pdo->prepare($sql);

		$query->bindValue(1,$this->cnpj);
		$query->bindValue(2,$this->nome_empresa);
		$query->bindValue(3,$this->cep);
		$query->bindValue(4,$this->bairro);
		$query->bindValue(5,$this->telefone);
		$query->bindValue(6,$this->email);
		$query->bindValue(7,$this->rua);
		$query->bindValue(8,$this->uf);
		$query->bindValue(9,$this->cidade);


		$query->execute();		




	}

	public function atualizarFornecedor(
		$pk,$cnpj, $nome_empresa,
	 	$cep, $telefone, $email
	 	
	 )	{
	 	$this->pk = $pk;
		$this->cnpj = $cnpj;
		$this->nome_empresa = $nome_empresa;
		$this->cep = $cep;
		$this->telefone = $telefone;
		$this->email = $email;

		$pdo = connectar();


		$sql = ("
			UPDATE fornecedor SET cnpj = ?,nome_empresa = ?,
			cep = ?, telefone = ?, email = ? WHERE cnpj = ?
	
		"
		);

		$query = $pdo->prepare($sql);
		
		$query->bindValue(1,$this->cnpj);
		$query->bindValue(2,$this->nome_empresa);
		$query->bindValue(3,$this->cep);
		$query->bindValue(4,$this->telefone);
		$query->bindValue(5,$this->email);
		$query->bindValue(6,$this->pk);


		$query->execute();



	}
	public function deletarFornecedor($pk) {
		$pdo = connectar();

		$this->pk = $pk;
	
		$sql = "DELETE FROM fornecedor WHERE cnpj = ?";

		$query = $pdo->prepare($sql);

		$query->bindValue(1,$this->pk);


		$query->execute();





	}
}
 ?>