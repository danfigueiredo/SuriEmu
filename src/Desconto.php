<?php
	
	class Desconto implements JsonSerializable {
		
		private $id;
		private $nome;
		private $porcentagem;
		private $valor;
		private $descricao;
		private $vigente;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getPorcentagem() {
			return $this->porcentagem;
		}

		public function setPorcentagem($porcentagem) {
			$this->porcentagem = $porcentagem;
		}

		public function getValor() {
			return $this->valor;
		}

		public function setValor($valor) {
			$this->valor = $valor;
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}

		public function isVigente() {
			return $this->vigente;
		}

		public function setVigente($vigente) {
			$this->vigente = $vigente;
		}

		public function createObjectByPost($post) {
			$this->id = $post["id"];
			$this->nome = $post["nome"];
			$this->porcentagem = $post["porcentagem"];
			$this->valor = $post["valor"];
			$this->descricao = $post["descricao"];
			$this->vigente = $post["vigente"];

			return $this;
		}

		public function jsonSerialize() {
		    return get_object_vars($this);
		}
	}
 
?>