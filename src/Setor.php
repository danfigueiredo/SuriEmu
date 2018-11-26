<?php
	class Setor implements JsonSerializable {

		private $id;
		private $codigoSetor;
		private $nome;
		private $descricao;
		private $departamento;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getCodigoSetor() {
			return $this->codigoSetor;
		}

		public function setCodigoSetor($codigoSetor) {
			$this->codigoSetor = $codigoSetor;
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

		public function getDepartamento() {
			return $this->departamento;
		}

		public function setDepartamento(Departamento $departamento) {
			$this->departamento = $departamento;
		}

		public function createDepartamentoByPost(array $post) {
			$this->id = $post["id"];
			$this->codigoSetor = $post["codigoSetor"];
			$this->nome = $post["nome"];
			$this->descricao  = $post["descricao"];
			$departamento = new Departamento();
			$departamento->setId($post["idDepartamento"]);
			$this->departamento  = $departamento;

			return $this;
		}

		public function jsonSerialize() {
		    return get_object_vars($this);
		}
	}
?>