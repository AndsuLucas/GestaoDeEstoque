<?php
/* classe responsável por todas as ações que um gestor pode adotar em relação a outros gestores. */
class Gestor{
	private $id_gestor;
	private $permissao;
	private $usuario;
	private $email;
	private $senha;
	
	public function login($usuario,$senha){
		$this->usuario = $usuario;
		$this->senha = md5($senha); 
		$pdo = connectar();
		
		$sql = $pdo->prepare("SELECT * FROM gestor WHERE password = ? and usuario = ? ");

		$sql->bindValue(1,$this->senha);
		$sql->bindValue(2,$this->usuario);
		$sql->execute();
		
		$dados = $sql->fetchAll();
		$num_registros = $sql->rowCount();
		
		$this->id_gestor = addslashes(trim($dados[0]["id_gestor"]));
		$this->permissao = addslashes(trim($dados[0]["permissao"]));
		$this->usuario = addslashes(trim($dados[0]["usuario"]));
		$this->email = addslashes(trim($dados[0]["email"]));
		$this->senha = md5(addslashes(trim($dados[0]["password"])));


		if(!empty($num_registros)){
			
			return true;
		}else{
			return false;
		}

	}

	public function cadastrarGestor($permissao,$usuario,$email,$password){
	
		$pdo = connectar();
		
		$this->permissao = $permissao;
		$this->usuario = $usuario;
		$this->email = $email;
		$this->password = md5($password);
		

		$sql = $pdo->prepare("
				INSERT INTO gestor SET permissao = ?,
				usuario = ? , email = ?,
				password = ?
			
			");
		
		$sql->bindValue(1,$this->permissao);
		$sql->bindValue(2,$this->usuario);
		$sql->bindValue(3,$this->email);
		$sql->bindValue(4,$this->password);
		
		//DADOS SERÁ VALIDADOS NO CONTROLER (AUTENTICACAO_GESTOR.PHP)	
		$sql->execute();
	}
	//RETORNA DADOS DA INSÂNCIA PARA SESSÃO "GESTOR" EM FORMA DE ARRAY (AUTENTICACAO_GESTOR.PHP)
	public function retornarDados() {
		$dados_gestor = [];

		$dados_gestor["id"] = $this->id_gestor; 
		$dados_gestor["usuario"] = $this->usuario;
		$dados_gestor["permissao"] = $this->permissao;
		$dados_gestor["email"] = $this->email;
			

		return $dados_gestor;
	}
	public function mostrarGestores(){
		$pdo = connectar();

		$sql = ("SELECT id_gestor,usuario,email,descricao FROM gestor INNER JOIN permissao ON  gestor.permissao = permissao.id_permissao");

		$query = $pdo->prepare($sql);

		$query->bindValue(1,$id);

		$query->execute();

		return $query->fetchAll();

	}
	public function acharGestor($id) {
		$pdo = connectar();
		$sql = "SELECT * FROM gestor WHERE id_gestor = ?";

		$query = $pdo->prepare($sql);

		$query->bindValue(1,$id);

		$query->execute();

		return $query->fetch();



	}
	public function atualizarGestor($id,$usuario,$email,$permissao) {
		$pdo = connectar();
		$sql = "UPDATE gestor SET usuario = ?, email = ?, permissao = ? WHERE id_gestor = ?";

		$query =  $pdo->prepare($sql);

		$query->bindValue(1,$usuario);
		$query->bindValue(2,$email);
		$query->bindValue(3,$permissao);
		$query->bindValue(4,$id);

		$query->execute();


	}
	public function deletarGestor($id) {

		$pdo = connectar();

		$sql = "DELETE FROM gestor WHERE id_gestor = ?";

		$query = $pdo->prepare($sql);
		$query->bindValue(1,$id);
		$query->execute();



	}
	public function filtrarGestor($filtro,$busca) {
		$pdo = connectar();
		$filtro = addslashes($filtro);
		$busca = addslashes($busca);
		$sql = ("SELECT id_gestor,usuario,email,descricao FROM gestor INNER JOIN permissao ON  gestor.permissao = permissao.id_permissao WHERE $filtro like '%$busca%' ");

		$query = $pdo->prepare($sql);



		$query->execute();

		return $query->fetchAll();


	}



}



?>