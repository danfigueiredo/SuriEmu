<?php
	class ShakaiHokenRepository implements RepositoryImpl {

		public function save($shakaiHoken) {
			$porcentagemSeguroSaude = $shakaiHoken->getPorcentagemSeguroSaude();
			$porcentagemSeguroEnfermagem = $shakaiHoken->getPorcentagemSeguroEnfermagem();
			$porcentagemAposentadoria = $shakaiHoken->getPorcentagemAposentadoria();
			$anoDaVigencia = $shakaiHoken->getAnoDaVigencia();

			$query = "";
		 	$conn = ConnectionFactory::getConnection();

		 	$statement = null;
		 	if (!empty($shakaiHoken->getId())) {
		 		$id = $shakaiHoken->getId();
				$query = "UPDATE ShakaiHoken SET PorcentagemSeguroSaude = ?, PorcentagemSeguroEnfermagem = ?, PorcentagemAposentadoria = ?, AnoDaVigencia = ? WHERE ID = ?";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("dddsi", $porcentagemSeguroSaude, $porcentagemSeguroEnfermagem, $porcentagemAposentadoria, $anoDaVigencia, $id);
			} else {
				$query = "INSERT INTO ShakaiHoken (PorcentagemSeguroSaude, PorcentagemSeguroEnfermagem, PorcentagemAposentadoria, AnoDaVigencia) VALUES (?, ?, ?, ?)";
				$statement = $conn->prepare($query);
		  		$statement->bind_param("ddds", $porcentagemSeguroSaude, $porcentagemSeguroEnfermagem, $porcentagemAposentadoria, $anoDaVigencia);
			}
		    $statement->execute();
		    $conn->close();
		}

		public function remove($id) {
			$query = "DELETE FROM ShakaiHoken WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $conn->close();
		}

		public function findById($id) {
			$query = "SELECT * FROM ShakaiHoken WHERE ID = ?";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->bind_param("i", $id);
		    $statement->execute();
		    $result = $statement->get_result();

		    $shakaiHoken = new ShakaiHoken();
		    $shakaiHokenDb = $result->fetch_assoc();
	    	$shakaiHoken->setId($shakaiHokenDb["ID"]);
	    	$shakaiHoken->setPorcentagemSeguroSaude($shakaiHokenDb["PorcentagemSeguroSaude"]);
	    	$shakaiHoken->setPorcentagemSeguroEnfermagem($shakaiHokenDb["PorcentagemSeguroEnfermagem"]);
	    	$shakaiHoken->setPorcentagemAposentadoria($shakaiHokenDb["PorcentagemAposentadoria"]);
	    	$shakaiHoken->setAnoDaVigencia($shakaiHokenDb["AnoDaVigencia"]);
		 	$conn->close();

		    return $shakaiHoken;
		}

		public function findAll() {
			$query = "SELECT * FROM ShakaiHoken";
		 	$conn = ConnectionFactory::getConnection();
		    $statement = $conn->prepare($query);
		    $statement->execute();
		    $result = $statement->get_result();
		   	$shakaiHokens = array();
		    while($shakaiHokenDb = $result->fetch_assoc()){
		    	$shakaiHoken = new ShakaiHoken();
		    	$shakaiHoken->setId($shakaiHokenDb["ID"]);
		    	$shakaiHoken->setPorcentagemSeguroSaude($shakaiHokenDb["PorcentagemSeguroSaude"]);
		    	$shakaiHoken->setPorcentagemSeguroEnfermagem($shakaiHokenDb["PorcentagemSeguroEnfermagem"]);
		    	$shakaiHoken->setPorcentagemAposentadoria($shakaiHokenDb["PorcentagemAposentadoria"]);
		    	$shakaiHoken->setAnoDaVigencia($shakaiHokenDb["AnoDaVigencia"]);

		    	$shakaiHokens[] = $shakaiHoken;
			}
		 	$conn->close();

		    return $shakaiHokens;
		}
	}
?>