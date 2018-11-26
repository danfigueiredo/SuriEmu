<?php
	class TipoFuncionario implements JsonSerializable {

		private $id;
		private $nome;
		private $sigla;
		private $horasDeTrabalho;
		private $descricao;

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

		public function getSigla() {
			return $this->sigla;
		}

		public function setSigla($sigla) {
			$this->sigla = $sigla;
		}

		public function getHorasDeTrabalho() {
			return $this->horasDeTrabalho;
		}

		public function setHorasDeTrabalho($horasDeTrabalho) {
			$this->horasDeTrabalho = $horasDeTrabalho;
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}

		public function createObjectByPost(array $post) {
			$this->id = $post["id"];
			$this->nome = $post["nome"];
			$this->sigla = $post["sigla"];
			$this->horasDeTrabalho = $post["horasDeTrabalho"];
			$this->descricao  = $post["descricao"];

			return $this;
		}

		public function jsonSerialize() {
		    return get_object_vars($this);
		}
	}
?>