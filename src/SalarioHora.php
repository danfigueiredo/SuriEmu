<?php
	
	class SalarioHora implements JsonSerializable {
		
		private $id;
		private $valorHora;
		private $descricao;
		private $dataAlteracaoSalario;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getValorHora() {
			return $this->valorHora;
		}

		public function setValorHora($valorHora) {
			$this->valorHora = $valorHora;
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}

		public function getDataAlteracaoSalario() {
			return $this->dataAlteracaoSalario;
		}

		public function setDataAlteracaoSalario($dataAlteracaoSalario) {
			$this->dataAlteracaoSalario = $dataAlteracaoSalario;
		}

		public function createObjectByPost($post) {
			$this->id = $post["id"];
			$this->valorHora = $post["valorHora"];
			$this->descricao = $post["descricao"];
			$this->dataAlteracaoSalario = $post["dataAlteracaoSalario"];
			return $this;
		}

		public function jsonSerialize() {
		    return get_object_vars($this);
		}
	}
	
?>