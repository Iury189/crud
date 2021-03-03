<?php
  
	require_once '../classes/aluno.php';

	class CrudAluno extends Aluno {

		protected $tabela = 'aluno'; 
		
		public function Insert() {
			$sql = "INSERT INTO $this->tabela (nome, endereco) VALUES (:nome, :endereco)";
			$stm = BD::prepare($sql);
			$stm->bindParam(':nome', $this->nome);
			$stm->bindParam(':endereco', $this->endereco);
			return $stm->execute();
		}

		public function Select() {
			$sql = "SELECT * FROM $this->tabela";
			$stm = BD::prepare($sql);
			$stm->execute();
			return $stm->fetchAll();
		}

		public function Update() {
			$sql = "UPDATE $this->tabela SET nome = :nome, endereco = :endereco WHERE cd_aluno = :cd_aluno";
			$stm = BD::prepare($sql);
			$stm->bindParam(':cd_aluno', $this->cd_aluno, PDO::PARAM_INT);
			$stm->bindParam(':nome', $this->nome);
			$stm->bindParam(':endereco', $this->endereco);
			return $stm->execute();
		}
	
		public function Delete() {
			$sql = "DELETE FROM $this->tabela WHERE cd_aluno = :cd_aluno";
			$stm = BD::prepare($sql);
			$stm->bindParam(':cd_aluno', $this->cd_aluno, PDO::PARAM_INT);
			return $stm->execute();
		}
	}
?>