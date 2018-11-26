<?php
	class CustoRepository implements RepositoryImpl {

		public function save($custo) {
			$nome = $custo->getNome();
			$valor = $custo->getValor();
			$descricao = $custo->getDescricao();

			$query = "";
		 	$conn = ConnectionFactory::getConnection();

		 	$statement = null;
		 	if (!empty($custo->getId())) {
		 		$id = $custo->getId();
				$query = "UPDATE Custo SET Nome = ?, Valor = ?, Descricao = ? WHERE ID = ?";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sdsi", $nome, $valor, $descricao, $id);
			} else {
				$query = "INSERT INTO Custo (Nome, Valor, Descricao) VALUES (?, ?, ?)";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sds", $nome, $valor, $descricao);
			}
		    $statement->execute();
		    $conn->close();
		}

		public function remove($id) {
			$query = "DELETE FROM Custo WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $conn->close();
		}

		public function findById($id) {
			$query = "SELECT * FROM Custo WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $result = $statement->get_result();

		    $custo = new Custo();
		    $custoDb = $result->fetch_assoc();
	    	$custo->setId($custoDb["ID"]);
	    	$custo->setNome($custoDb["Nome"]);
	    	$custo->setValor($custoDb["Valor"]);
	    	$custo->setDescricao($custoDb["Descricao"]);
		 	$conn->close();

		    return $custo;
		}

		public function findAll() {
			$query = "SELECT * FROM Custo";
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