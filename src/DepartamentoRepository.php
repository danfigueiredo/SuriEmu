<?php
	class DepartamentoRepository implements RepositoryImpl {

		public function save($departamento) {
			$codigoDepartamento = $departamento->getCodigoDepartamento();
			$nome = $departamento->getNome();
			$descricao = $departamento->getDescricao();

			$query = "";
		 	$conn = ConnectionFactory::getConnection();

		 	$statement = null;
		 	if (!empty($departamento->getId())) {
		 		$id = $departamento->getId();
				$query = "UPDATE Departamento SET CodigoDepartamento = ?, Nome = ?, Descricao = ? WHERE ID = ?";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sssi", $codigoDepartamento, $nome, $descricao, $id);
			} else {
				$query = "INSERT INTO Departamento (CodigoDepartamento, Nome, Descricao) VALUES (?, ?, ?)";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sss", $codigoDepartamento, $nome, $descricao);
			}
		    $statement->execute();
		    $conn->close();
		}

		public function remove($id) {
			$query = "DELETE FROM Departamento WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $conn->close();
		}

		public function findById($id) {
			$query = "SELECT * FROM Departamento WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $result = $statement->get_result();

		    $departamento = new Departamento();
		    $departamentoDb = $result->fetch_assoc();
	    	$departamento->setId($departamentoDb["ID"]);
	    	$departamento->setCodigoDepartamento($departamentoDb["CodigoDepartamento"]);
	    	$departamento->setNome($departamentoDb["Nome"]);
	    	$departamento->setDescricao($departamentoDb["Descricao"]);
		 	$conn->close();

		    return $departamento;
		}

		public function findAll() {
			$query = "SELECT * FROM Departamento";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->execute();
		    $result = $statement->get_result();
		   	$departamentos = array();
		    while($departamentoDb = $result->fetch_assoc()){
		    	$departamento = new Departamento();
		    	$departamento->setId($departamentoDb["ID"]);
		    	$departamento->setCodigoDepartamento($departamentoDb["CodigoDepartamento"]);
		    	$departamento->setNome($departamentoDb["Nome"]);
		    	$departamento->setDescricao($departamentoDb["Descricao"]);

		    	$departamentos[] = $departamento;
			}
		 	$conn->close();

		    return $departamentos;
		}
	}
?>