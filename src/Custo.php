<?php
	class Custo implements JsonSerializable {

		private $id;
		private $nome;
		private $valor;
		private $descricao;
		
		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getValor() {
			return $this->valor;
		}

		public function setValor($valor) {
			$this->valor = $valor;
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

		public function createObjectByPost($post) {
			$this->id = $post["id"];
			$this->nome = $post["nome"];
			$this->valor = $post["valor"];
			$this->descricao = $post["descricao"];

			return $this;
		}

		public function jsonSerialize() {
		    return get_object_vars($this);
		}
	}
?>