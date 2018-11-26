<?php
	class DescontoRepository implements RepositoryImpl {

		public function save($desconto) {
			$nome = $desconto->getNome();
			$porcentagem = $desconto->getPorcentagem();
			$valor = $desconto->getValor();
			$descricao = $desconto->getDescricao();
			$vigente = $desconto->isVigente();

			$query = "";
		 	$conn = ConnectionFactory::getConnection();

		 	$statement = null;
		 	if (!empty($desconto->getId())) {
		 		$id = $desconto->getId();
				$query = "UPDATE Desconto SET Nome = ?, Porcentagem = ?, Valor = ?, Descricao = ?, isVigente = ? WHERE ID = ?";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sddsii", $nome, $porcentagem, $valor, $descricao, $vigente, $id);
			} else {
				$query = "INSERT INTO Desconto (Nome, Porcentagem, Valor, Descricao, isVigente) VALUES (?, ?, ?, ?, ?)";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sddsi", $nome, $porcentagem, $valor, $descricao, $vigente);
			}
		    $statement->execute();
		    $conn->close();
		}

		public function saveDescontoPorFuncionario($idDesconto,　$idFuncionario) {
				$query = "INSERT INTO FuncionarioDesconto (ID_FUNCIONARIO, ID_DESCONTO) VALUES (?, ?)";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("ii", $idDesconto, $idFuncionario);
		}

		public function remove($id) {
			$query = "DELETE FROM Desconto WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $conn->close();
		}

		public function findById($id) {
			$query = "SELECT * FROM Desconto WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $result = $statement->get_result();

		    $desconto = new Desconto();
		    $descontoDb = $result->fetch_assoc();
	    	$desconto->setId($descontoDb["ID"]);
	    	$desconto->setNome($descontoDb["Nome"]);
	    	$desconto->setValor($descontoDb["Porcentagem"]);
	    	$desconto->setValor($descontoDb["Valor"]);
	    	$desconto->setDescricao($descontoDb["Descricao"]);
	    	$desconto->setVigente($descontoDb["isVigente"]);
		 	$conn->close();

		    return $desconto;
		}

		public function findByIdFuncionario($idFuncionario) {
			$query = "SELECT fd.* FROM FuncionarioDesconto fd INNER JOIN Desconto d ON fd.ID_DESCONTO = d.ID WHERE ID_FUNCIONARIO = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $idFuncionario);
		    $statement->execute();
		    $result = $statement->get_result();

		    $descontos = array();
		    while($descontoDb = $result->fetch_assoc()){
		    	$desconto = new Desconto();
		    	$desconto->setId($descontoDb["ID"]);
		    	$desconto->setNome($descontoDb["Nome"]);
		    	$desconto->setValor($descontoDb["Porcentagem"]);
		    	$desconto->setValor($descontoDb["Valor"]);
		    	$desconto->setDescricao($descontoDb["Descricao"]);
		    	$desconto->setVigente($descontoDb["isVigente"]);

		    	$descontos[] = $desconto;
			}
		 	$conn->close();

		    return $descontos;
		}

		public function findAll() {
			$query = "SELECT * FROM Desconto";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->execute();
		    $result = $statement->get_result();
		   	$descontos = array();
		    while($descontoDb = $result->fetch_assoc()){
		    	$desconto = new Desconto();
		    	$desconto->setId($descontoDb["ID"]);
		    	$desconto->setNome($descontoDb["Nome"]);
		    	$desconto->setValor($descontoDb["Porcentagem"]);
		    	$desconto->setValor($descontoDb["Valor"]);
		    	$desconto->setDescricao($descontoDb["Descricao"]);
		    	$desconto->setVigente($descontoDb["isVigente"]);

		    	$descontos[] = $desconto;
			}
		 	$conn->close();

		    return $descontos;
		}
	}
?>