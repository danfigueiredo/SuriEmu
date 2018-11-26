<?php
	class SetorRepository implements RepositoryImpl {
		public function save($setor) {
			$id = $setor->getId();
			$codigoSetor = $setor->getCodigoSetor();
			$nome = $setor->getNome();
			$descricao = $setor->getDescricao();
			$idDepartamento = $setor->getDepartamento()->getId();

			$query = "";
		 	$conn = ConnectionFactory::getConnection();

		 	$statement = null;
		 	if (!empty($setor->getId())) {
		 		$id = $setor->getId();
				$query = "UPDATE Setor SET CodigoSetor = ?, Nome = ?, Descricao = ?, ID_DEPARTAMENTO = ? WHERE ID = ?";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sssii", $codigoSetor, $nome, $descricao, $idDepartamento, $id);
			} else {
				$query = "INSERT INTO Setor (CodigoSetor, Nome, Descricao, ID_DEPARTAMENTO) VALUES (?, ?, ?, ?)";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("sssi", $codigoSetor, $nome, $descricao, $idDepartamento);
			}
		    $statement->execute();
		    $conn->close();
		}

		public function remove($id) {
			$query = "DELETE FROM Setor WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $conn->close();
		}

		public function findById($id) {
			$query = "SELECT s.*, d.CodigoDepartamento as CodigoDepartamento, d.Nome as NomeDepartamento, d.Descricao as DescricaoDepartamento FROM setor s INNER JOIN departamento d ON d.ID = s.ID_DEPARTAMENTO WHERE s.ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $result = $statement->get_result();

		    $setorDb = $result->fetch_assoc();

		    $departamento = new Departamento();
	    	$departamento->setId($setorDb["ID_DEPARTAMENTO"]);
	    	$departamento->setCodigoDepartamento($setorDb["CodigoDepartamento"]);
	    	$departamento->setNome($setorDb["NomeDepartamento"]);
	    	$departamento->setDescricao($setorDb["DescricaoDepartamento"]);

		    $setor = new Setor();
	    	$setor->setId($setorDb["ID"]);
	    	$setor->setCodigoSetor($setorDb["CodigoSetor"]);
	    	$setor->setNome($setorDb["Nome"]);
	    	$setor->setDescricao($setorDb["Descricao"]);
	    	$setor->setDepartamento($departamento);
		 	$conn->close();

		    return $setor;
		}

		public function findAll() {
			$query = "SELECT s.*, d.CodigoDepartamento as CodigoDepartamento, d.Nome as NomeDepartamento, d.Descricao as DescricaoDepartamento FROM Setor s INNER JOIN departamento d ON d.ID = s.ID_DEPARTAMENTO";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->execute();
		    $result = $statement->get_result();
		   	$setores = array();
		    while($setorDb = $result->fetch_assoc()){
		    	$departamento = new Departamento();
		    	$departamento->setId($setorDb["ID_DEPARTAMENTO"]);
		    	$departamento->setCodigoDepartamento($setorDb["CodigoDepartamento"]);
		    	$departamento->setNome($setorDb["NomeDepartamento"]);
		    	$departamento->setDescricao($setorDb["DescricaoDepartamento"]);

			    $setor = new Setor();
		    	$setor->setId($setorDb["ID"]);
		    	$setor->setCodigoSetor($setorDb["CodigoSetor"]);
		    	$setor->setNome($setorDb["Nome"]);
		    	$setor->setDescricao($setorDb["Descricao"]);
		    	$setor->setDepartamento($departamento);

		    	$setores[] = $setor;
			}
		 	$conn->close();

		    return $setores;
		}
	}
?>