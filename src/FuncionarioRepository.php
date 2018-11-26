<?php
	class FuncionarioRepository implements RepositoryImpl {

		public function save($funcionario) {
			$id = $funcionario->getId();
			$codigoFuncional = $funcionario->getCodigoFuncional();
			$nome = $funcionario->getNome();
			$nomeJapones = $funcionario->getNomeJapones();
			$dataNascimento = $funcionario->getDataNascimento();
			$dataEntrada = $funcionario->getDataEntrada();
			$descricao = $funcionario->getDescricao();
			$idTipoFuncionario = $funcionario->getTipoFuncionario()->getId();
			$salarioHora = $funcionario->getSalarioHora();
			$descontos = $funcionario->getDescontos();
			$idShakaiHoken = $funcionario->getShakaiHoken()->getId();
			$idSetor = $funcionario->getSetor()->getId();

			$query = "";
		 	$conn = ConnectionFactory::getConnection();

		 	$conn->autocommit(false);

			$salarioHoraRepository = SalarioHoraRepository();
			$idSalarioHora = $salarioHoraRepository->save($salarioHora);

		 	$statement = null;
		 	if (!empty($id)) {
				$query = "UPDATE Funcionario SET CodigoFuncional = ?, Nome = ?, NomeJapones = ?, DataNascimento = ?, DataEntrada = ?, Descricao = ?, ID_TIPO_FUNCIONARIO = ?, ID_SALARIO_HORA = ?, ID_SHAKAI_HOKEN = ?, ID_SETOR = ? WHERE ID = ?";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("ssssssiiiii", $codigoFuncional, $nome, $nomeJapones, $dataNascimento, $dataEntrada, $descricao, $idTipoFuncionario, $idSalarioHora, $idShakaiHoken, $idSetor, $id);
			} else {
				$query = "INSERT INTO Funcionario (CodigoFuncional, Nome, NomeJapones, DataNascimento, DataEntrada, Descricao, ID_TIPO_FUNCIONARIO, ID_SALARIO_HORA, ID_SHAKAI_HOKEN, ID_SETOR) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("ssssssiiii", $codigoFuncional, $nome, $nomeJapones, $dataNascimento, $dataEntrada, $descricao, $idTipoFuncionario, $idSalarioHora, $idShakaiHoken, $idSetor);
			}
		    $statement->execute();
		    $id = $conn->insert_id();

		    $descontoRepository = new DescontoRepository();
		    foreach ($descontos as $desconto) {
				$descontoRepository->saveDescontoPorFuncionario($desconto->getId(), $id);
			}

		    $conn->commit();
		    $conn->close();
		}

		public function remove($id) {
			$query = "DELETE FROM Funcionario WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $conn->close();
		}

		public function findById($id) {
			$query = "SELECT f.*, tf.Nome as NomeTipoFuncionario, tf.Sigla as SiglaTipoFuncionario, tf.HorasDeTrabalho as HorasDeTrabalhoTipoFuncionario, tf.Descricao as DescricaoTipoFuncionario, sh.ValorHora as ValorHoraSalarioHora, sh.Descricao as DescricaoSalarioHora, sh.DataAlteracaoSalario as DataAlteracaoSalarioSalarioHora, s.CodigoSetor as CodigoSetor, s.Nome as NomeSetor, s.Descricao as DescricaoSetor, sha.PorcentagemSeguroSaude as PorcentagemSeguroSaudeShakaiHoken, sha.PorcentagemSeguroEnfermagem as PorcentagemSeguroEnfermagemShakaiHoken, sha.PorcentagemAposentadoria as PorcentagemAposentadoriaShakaiHoken, sha.AnoDaVigencia as AnoDaVigenciaShakaiHoken FROM Funcionario f INNER JOIN TipoFuncionario tf ON f.ID_TIPO_FUNCIONARIO = tf.ID INNER JOIN SalarioHora sh ON f.ID_SALARIO_HORA = sh.ID INNER JOIN Setor s ON f.ID_SETOR = s.ID INNER JOIN ShakaiHoken sha ON f.ID_SHAKAI_HOKEN = sha.ID WHERE f.ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $result = $statement->get_result();

		    $funcionario = new Funcionario();
		    $funcionarioDb = $result->fetch_assoc();
	    	$funcionario->setId($funcionarioDb["ID"]);
	    	$funcionario->setCodigoFuncional($funcionarioDb["CodigoFuncional"]);
	    	$funcionario->setNome($funcionarioDb["Nome"]);
	    	$funcionario->setNomeJapones($funcionarioDb["NomeJapones"]);
	    	$funcionario->setDataNascimento($funcionarioDb["DataNascimento"]);
	    	$funcionario->setDataEntrada($funcionarioDb["DataEntrada"]);
	    	$funcionario->setDescricao($funcionarioDb["Descricao"]);

	    	$tipoFuncionario = new TipoFuncionario();
	    	$tipoFuncionario->setId($funcionarioDb["ID_TIPO_FUNCIONARIO"]);
	    	$tipoFuncionario->setNome($funcionarioDb["NomeTipoFuncionario"]);
	    	$tipoFuncionario->setSigla($funcionarioDb["SiglaTipoFuncionario"]);
	    	$tipoFuncionario->setHorasDeTrabalho($funcionarioDb["HorasDeTrabalhoTipoFuncionario"]);
	    	$tipoFuncionario->setDescricao($funcionarioDb["DescricaoTipoFuncionario"]);
	    	$funcionario->setTipoFuncionario($tipoFuncionario);

	    	$salarioHora = new SalarioHora();
	    	$salarioHora->setId($funcionarioDb["ID_SALARIO_HORA"])
	    	$salarioHora->setValorHora($funcionarioDb["ValorHoraSalarioHora"])
	    	$salarioHora->setDescricao($funcionarioDb["DescricaoSalarioHora"])
	    	$salarioHora->setDataAlteracaoSalario($funcionarioDb["DataAlteracaoSalarioSalarioHora"])
	    	$funcionario->setSalarioHora($salarioHora);

	    	$setor = new Setor();
	    	$setor->setId($funcionarioDb["ID_SETOR"])
	    	$setor->setCodigoSetor($funcionarioDb["CodigoSetor"]);
	    	$setor->setNome($funcionarioDb["NomeSetor"]);
	    	$setor->setCodigoSetor($funcionarioDb["CodigoSetor"]);
	    	$setor->setDescricao($funcionarioDb["DescricaoSetor"]);
	    	$funcionario->setSetor($setor);

	    	$shakaiHoken = new ShakaiHoken();
	    	$shakaiHoken->setId($funcionarioDb["ID_SHAKAI_HOKEN"]);
	    	$shakaiHoken->setPorcentagemSeguroSaude($funcionarioDb["PorcentagemSeguroSaudeShakaiHoken"]);
	    	$shakaiHoken->setPorcentagemSeguroEnfermagem($funcionarioDb["PorcentagemSeguroEnfermagemShakaiHoken"]);
	    	$shakaiHoken->setPorcentagemAposentadoria($funcionarioDb["PorcentagemAposentadoriaShakaiHoken"]);
	    	$shakaiHoken->setAnoDaVigencia($funcionarioDb["AnoDaVigenciaShakaiHoken"]);
	    	$funcionario->setShakaiHoken($shakaiHoken);

	    	$descontoRepository　= new DescontoRepository();
	    	$descontos = $descontoRepository->findByIdFuncionario($id);
	    	$funcionario->setDescontos($descontos);

	    	$absenteismoRepository　= new AbsenteismoRepository();
	    	$absenteismos = $absenteismoRepository->findByIdFuncionario($id);
	    	$funcionario->setAbsenteismos($absenteismos);

		 	$conn->close();

		    return $funcionario;
		}

		public function findAll() {
			$query = "SELECT f.*, tf.Nome as NomeTipoFuncionario, tf.Sigla as SiglaTipoFuncionario, tf.HorasDeTrabalho as HorasDeTrabalhoTipoFuncionario, tf.Descricao as DescricaoTipoFuncionario, sh.ValorHora as ValorHoraSalarioHora, sh.Descricao as DescricaoSalarioHora, sh.DataAlteracaoSalario as DataAlteracaoSalarioSalarioHora, s.CodigoSetor as CodigoSetor, s.Nome as NomeSetor, s.Descricao as DescricaoSetor, sha.PorcentagemSeguroSaude as PorcentagemSeguroSaudeShakaiHoken, sha.PorcentagemSeguroEnfermagem as PorcentagemSeguroEnfermagemShakaiHoken, sha.PorcentagemAposentadoria as PorcentagemAposentadoriaShakaiHoken, sha.AnoDaVigencia as AnoDaVigenciaShakaiHoken FROM Funcionario f INNER JOIN TipoFuncionario tf ON f.ID_TIPO_FUNCIONARIO = tf.ID INNER JOIN SalarioHora sh ON f.ID_SALARIO_HORA = sh.ID INNER JOIN Setor s ON f.ID_SETOR = s.ID INNER JOIN ShakaiHoken sha ON f.ID_SHAKAI_HOKEN = sha.ID";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->execute();
		    $result = $statement->get_result();
		   	$custos = array();
		    while($custoDb = $result->fetch_assoc()){
		    	$custo = new Custo();
		    	$custo->setId($custoDb["ID"]);
		    	$custo->setNome($custoDb["Nome"]);
		    	$custo->setValor($custoDb["Valor"]);
		    	$custo->setDescricao($custoDb["Descricao"]);

		    	$custos[] = $custo;
			}
		 	$conn->close();

		    return $custos;
		}
	}
?>