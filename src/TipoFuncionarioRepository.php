<?php
	class TipoFuncionarioRepository implements RepositoryImpl {

		public function save($tipoFuncionario) {
			$nome = $tipoFuncionario->getNome();
			$sigla = $tipoFuncionario->getSigla();
			$horasDeTrabalho = $tipoFuncionario->getHorasDeTrabalho();
			$descricao = $tipoFuncionario->getDescricao();

			$query = "";
		 	$conn = ConnectionFactory::getConnection();

		 	$statement = null;
		 	if (!empty($tipoFuncionario->getId())) {
		 		$id = $tipoFuncionario->getId();
				$query = "UPDATE TipoFuncionario SET Nome = ?, Sigla = ?, HorasDeTrabalho = ?, Descricao = ? WHERE ID = ?";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("ssdsi", $nome, $sigla, $horasDeTrabalho, $descricao, $id);
			} else {
				$query = "INSERT INTO TipoFuncionario (Nome, Sigla, HorasDeTrabalho, Descricao) VALUES (?, ?, ?, ?)";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("ssds", $nome, $sigla, $horasDeTrabalho, $descricao);
			}
		    $statement->execute();
		    $conn->close();
		}

		public function remove($id) {
			$query = "DELETE FROM TipoFuncionario WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $conn->close();
		}

		public function findById($id) {
			$query = "SELECT * FROM TipoFuncionario WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $result = $statement->get_result();

		    $tipoFuncionario = new TipoFuncionario();
		    $tipoFuncionarioDb = $result->fetch_assoc();
	    	$tipoFuncionario->setId($tipoFuncionarioDb["ID"]);
	    	$tipoFuncionario->setNome($tipoFuncionarioDb["Nome"]);
	    	$tipoFuncionario->setSigla($tipoFuncionarioDb["Sigla"]);
	    	$tipoFuncionario->setHorasDeTrabalho($tipoFuncionarioDb["HorasDeTrabalho"]);
	    	$tipoFuncionario->setDescricao($tipoFuncionarioDb["Descricao"]);
		 	$conn->close();

		    return $tipoFuncionario;
		}

		public function findAll() {
			$query = "SELECT * FROM TipoFuncionario";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->execute();
		    $result = $statement->get_result();
		   	$tipos = array();
		    while($tipoFuncionarioDb = $result->fetch_assoc()){
		    	$tipoFuncionario = new TipoFuncionario();
		    	$tipoFuncionario->setId($tipoFuncionarioDb["ID"]);
		    	$tipoFuncionario->setNome($tipoFuncionarioDb["Nome"]);
		    	$tipoFuncionario->setSigla($tipoFuncionarioDb["Sigla"]);
		    	$tipoFuncionario->setHorasDeTrabalho($tipoFuncionarioDb["HorasDeTrabalho"]);
		    	$tipoFuncionario->setDescricao($tipoFuncionarioDb["Descricao"]);

		    	$tipos[] = $tipoFuncionario;
			}
		 	$conn->close();

		    return $tipos;
		}
	}
?>