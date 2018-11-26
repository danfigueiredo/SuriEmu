<?php
	class Departamento implements JsonSerializable {

		private $id;
		private $codigoDepartamento;
		private $nome;
		private $descricao;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getCodigoDepartamento() {
			return $this->codigoDepartamento;
		}

		public function setCodigoDepartamento($codigoDepartamento) {
			$this->codigoDepartamento = $codigoDepartamento;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}

		public function createDepartamentoByPost(array $post) {
			$this->id = $post["id"];
			$this->codigoDepartamento = $post["codigoDepartamento"];
			$this->nome = $post["nome"];
			$this->descricao  = $post["descricao"];

			return $this;
		}

		public function jsonSerialize() {
		    return get_object_vars($this);
		}
	}
?>