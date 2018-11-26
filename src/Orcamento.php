<?php
	class Orcamento {

		private $id;
		private $diasUteis;
		private $horasExtras;
		private $horasNoturnas;
		private $valorHora;
		private $valorHoraExtra;
		private $adicionalNoturno;
		private $valorTotalHorasNormais;
		private $valorTotalHorasExtras;
		private $valorTotalAdicionalNoturno;
		private $valorTotalFuncionario;
		private $previsaoDescontoFuncionario;
		private $valorTotalMaoDeObra;
		private $funcionario;
		private $custos;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getDiasUteis() {
			return $this->diasUteis;
		}

		public function setDiasUteis($diasUteis) {
			$this->diasUteis = $diasUteis;
		}

		public function getHorasExtras() {
			return $this->horasExtras;
		}

		public function setHorasExtras($horasExtras) {
			$this->horasExtras = $horasExtras;
		}

		public function getHorasNoturnas() {
			return $this->horasNoturnas;
		}

		public function setHorasNoturnas($horasNoturnas) {
			$this->horasNoturnas = $horasNoturnas;
		}

		public function getValorHora() {
			return $this->valorHora;
		}

		public function setValorHora($valorHora) {
			$this->valorHora = $valorHora;
		}

		public function getValorHoraExtra() {
			return $this->valorHoraExtra;
		}

		public function setValorHoraExtra($valorHoraExtra) {
			$this->valorHoraExtra = $valorHoraExtra;
		}

		public function getAdicionalNoturno() {
			return $this->adicionalNoturno;
		}

		public function setAdicionalNoturno($adicionalNoturno) {
			$this->adicionalNoturno = $adicionalNoturno;
		}

		public function getValorTotalHorasNormais() {
			return $this->valorTotalHorasNormais;
		}

		public function setValorTotalHorasNormais($valorTotalHorasNormais) {
			$this->valorTotalHorasNormais = $valorTotalHorasNormais;
		}

		public function getValorTotalHorasExtras() {
			return $this->valorTotalHorasExtras;
		}

		public function setValorTotalHorasExtras($valorTotalHorasExtras) {
			$this->valorTotalHorasExtras = $valorTotalHorasExtras;
		}

		public function getValorTotalAdicionalNoturno() {
			return $this->valorTotalAdicionalNoturno;
		}

		public function setValorTotalAdicionalNoturno($valorTotalAdicionalNoturno) {
			$this->valorTotalAdicionalNoturno = $valorTotalAdicionalNoturno;
		}

		public function getValorTotalFuncionario() {
			return $this->valorTotalFuncionario;
		}

		public function setValorTotalFuncionario($valorTotalFuncionario) {
			$this->valorTotalFuncionario = $valorTotalFuncionario;
		}

		public function getPrevisaoDescontoFuncionario() {
			return $this->previsaoDescontoFuncionario;
		}

		public function setPrevisaoDescontoFuncionario($previsaoDescontoFuncionario) {
			$this->previsaoDescontoFuncionario = $previsaoDescontoFuncionario;
		}

		public function getValorTotalMaoDeObra() {
			return $this->valorTotalMaoDeObra;
		}

		public function setValorTotalMaoDeObra($valorTotalMaoDeObra) {
			$this->valorTotalMaoDeObra = $valorTotalMaoDeObra;
		}

		public function getFuncionario() {
			return $this->funcionario;
		}

		public function setFuncionario(Funcionario $funcionario) {
			$this->funcionario = $funcionario;
		}

		public function getCustos() {
			return $this->custos;
		}

		public function setCustos(array $custos) {
			$this->custos = $custos;
		}
	}
?>