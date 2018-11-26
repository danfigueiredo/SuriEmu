<?php 
	
	class Funcionario implements JsonSerializable {
		
		private $id;
		private $codigoFuncional;
		private $nome;
		private $nomeJapones;
		private $dataNascimento;
		private $dataEntrada;
		private $descricao;
		private $tipoFuncionario;
		private $salarioHora;
		private $descontos;
		private $shakaiHoken;
		private $absenteismos;
		private $setor;

		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getCodigoFuncional() {
			return $this->codigoFuncional;
		}

		public function setCodigoFuncional($codigoFuncional) {
			$this->codigoFuncional = $codigoFuncional;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getNomeJapones() {
			return $this->nomeJapones;
		}

		public function setNomeJapones($nomeJapones) {
			$this->nomeJapones = $nomeJapones;
		}

		public function getDataNascimento() {
			return $this->dataNascimento;
		}

		public function setDataNascimento($dataNascimento) {
			$this->dataNascimento = $dataNascimento;
		}

		public function getDataEntrada() {
			return $this->dataEntrada;
		}

		public function setDataEntrada($dataEntrada) {
			$this->dataEntrada = $dataEntrada;
		}

		public function getDescricao() {
			return $this->descricao;
		}

		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}

		public function getTipoFuncionario() {
			return $this->tipoFuncionario;
		}

		public function setTipoFuncionario(TipoFuncionario $tipoFuncionario) {
			$this->tipoFuncionario = $tipoFuncionario;
		}

		public function getSalarioHora() {
			return $this->salarioHora;
		}

		public function getDescontos() {
			return $this->descontos;
		}

		public function setDescontos(array $descontos) {
			$this->descontos = $descontos;
		}

		public function setSalarioHora(SalarioHora $salarioHora) {
			$this->salarioHora = $salarioHora;
		}

		public function getShakaiHoken() {
			return $this->shakaiHoken;
		}

		public function setShakaiHoken(ShakaiHoken $shakaiHoken) {
			$this->shakaiHoken = $shakaiHoken;
		}

		public function getAbsenteismos() {
			return $this->absenteismos;
		}

		public function setAbsenteismos(array $absenteismos) {
			$this->absenteismos = $absenteismos;
		}

		public function getSetor() {
			return $this->setor;
		}

		public function setSetor(Setor $setor) {
			$this->setor = $setor;
		}

		public function createObjectByPost($post) {
			$this->id = $post["id"];
			$this->codigoFuncional = $post["codigoFuncional"];
			$this->nome = $post["nome"];
			$this->nomeJapones = $post["nomeJapones"];
			$this->dataNascimento = $post["dataNascimento"];
			$this->dataEntradadescricao = $post["dataEntradadescricao"];
			$this->descricao = $post["descricao"];

			$tipoFuncionario = new TipoFuncionario();
			$this->tipoFuncionario = $tipoFuncionario->createObjectByPost($post["tipoFuncionario"]);

			$salarioHora = new SalarioHora();
			$this->salarioHora = $salarioHora->createObjectByPost($post["salarioHora"]);

			$shakaiHoken = new ShakaiHoken();
			$this->shakaiHoken = $shakaiHoken->createObjectByPost($post["shakaiHoken"]);


			$setor = new Setor();
			$this->setor = $setor->createObjectByPost($post["setor"]);

			$descontos = $post["descontos"];
			foreach ($descontos as $descontoPost) {
				$desconto = new Desconto();
				$this->descontos[] = $desconto->createObjectByPost($descontoPost);
			}

			$absenteismos = $post["absenteismos"];
			foreach ($absenteismos as $absenteismoPost) {
				$absenteismo = new Absenteismo();
				$this->absenteismos[] = $absenteismo->createObjectByPost($absenteismoPost);
			}

			return $this;
		}

		public function jsonSerialize() {
		    return get_object_vars($this);
		}

	}
?>