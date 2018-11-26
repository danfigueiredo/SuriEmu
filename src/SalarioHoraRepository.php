<?php
	class SalarioHoraRepository implements RepositoryImpl {

		public function save($salarioHora) {
			$id = $salarioHora->getId();
			$valorHora = $salarioHora->getValorHora();
			$descricao = $salarioHora->getDescricao();
			$dataAlteracaoSalario = $salarioHora->getDataAlteracaoSalario();

			$query = "";
		 	$conn = ConnectionFactory::getConnection();

		 	$statement = null;
		 	if (!empty($id)) {
				$query = "UPDATE SalarioHora SET ValorHora = ?, Descricao = ?, DataAlteracaoSalario = ? WHERE ID = ?";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sssi", $nome, $valor, $descricao, $id);
			} else {
				$query = "INSERT INTO SalarioHora (ValorHora, Descricao, DataAlteracaoSalario) VALUES (?, ?, ?)";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sss", $nome, $valor, $descricao);
			}
		    $statement->execute();
		    $id = $conn->insert_id();
		    $conn->close();

		    return $id;
		}

		public function remove($id) {
			$query = "DELETE FROM SalarioHora WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $conn->close();
		}

		public function findById($id) {
			$query = "SELECT * FROM SalarioHora WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $result = $statement->get_result();

		    $salarioHora = new SalarioHora();
		    $salarioHoraDb = $result->fetch_assoc();
	    	$salarioHora->setId($salarioHoraDb["ID"]);
	    	$salarioHora->setValorHora($salarioHoraDb["ValorHora"]);
	    	$salarioHora->setDescricao($salarioHoraDb["Descricao"]);
	    	$salarioHora->setDataAlteracaoSalario($salarioHoraDb["DataAlteracaoSalario"]);
		 	$conn->close();

		    return $salarioHora;
		}

		public function findAll() {
			$query = "SELECT * FROM SalarioHora";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->execute();
		    $result = $statement->get_result();
		   	$salariosHora = array();
		    while($salarioHoraDb = $result->fetch_assoc()){
		    	$salarioHora = new SalarioHora();
		    	$salarioHora->setId($salarioHoraDb["ID"]);
	    		$salarioHora->setValorHora($salarioHoraDb["ValorHora"]);
	    		$salarioHora->setDescricao($salarioHoraDb["Descricao"]);
	    		$salarioHora->setDataAlteracaoSalario($salarioHoraDb["DataAlteracaoSalario"]);

		    	$salariosHora[] = $salarioHora;
			}
		 	$conn->close();

		    return $salariosHora;
		}
	}
?>