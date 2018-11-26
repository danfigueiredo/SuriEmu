<?php
	
	class ShakaiHoken implements JsonSerializable {

		private $id;
		private $porcentagemSeguroSaude;
		private $porcentagemSeguroEnfermagem;
		private $porcentagemAposentadoria;
		private $anoDaVigencia;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getPorcentagemSeguroSaude() {
			return $this->porcentagemSeguroSaude;
		}

		public function setPorcentagemSeguroSaude($porcentagemSeguroSaude) {
			$this->porcentagemSeguroSaude = $porcentagemSeguroSaude;
		}

		public function getPorcentagemSeguroEnfermagem() {
			return $this->porcentagemSeguroEnfermagem;
		}

		public function setPorcentagemSeguroEnfermagem($porcentagemSeguroEnfermagem) {
			$this->porcentagemSeguroEnfermagem = $porcentagemSeguroEnfermagem;
		}

		public function getPorcentagemAposentadoria() {
			return $this->porcentagemAposentadoria;
		}

		public function setPorcentagemAposentadoria($porcentagemAposentadoria) {
			$this->porcentagemAposentadoria = $porcentagemAposentadoria;
		}

		public function getAnoDaVigencia() {
			return $this->anoDaVigencia;
		}

		public function setAnoDaVigencia($anoDaVigencia) {
			$this->anoDaVigencia = $anoDaVigencia;
		}

		public function createObjectByPost($post) {
			$this->id = $post["id"];
			$this->porcentagemSeguroSaude = $post["porcentagemSeguroSaude"];
			$this->porcentagemSeguroEnfermagem = $post["porcentagemSeguroEnfermagem"];
			$this->porcentagemAposentadoria = $post["porcentagemAposentadoria"];
			$this->anoDaVigencia = $post["anoDaVigencia"];

			return $this;
		}

		public function jsonSerialize() {
		    return get_object_vars($this);
		}
	}

?>