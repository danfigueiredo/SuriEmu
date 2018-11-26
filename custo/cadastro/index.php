<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");
	$id = "";
	$valor = null;
	$nome = "";
	$descricao = "";
	if (isset($_GET) && !empty($_GET)) {
		$id = $_GET["id"];
		$autoload = new Autoload();

		$service = new CustoService();
		$custo = $service->findById($id);

		$id = $custo->getId();
		$nome = $custo->getNome();
		$valor = $custo->getValor();
		$descricao = $custo->getDescricao();
	}
?>

<!DOCTYPE html>
<html ng-app="suriEmu">
<head>
	<title>SURI-EMU - Cadastro de Custos</title>

	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/suri-emu.css">

	<script type="text/javascript" src="../../lib/bootstrap/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../lib/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../lib/angular/angular.js"></script>
	<script type="text/javascript" src="../../lib/angular/angular-locale_ja-jp.js"></script>

	<script type="text/javascript" src="../../js/suriEmu.js"></script>
	<script type="text/javascript" src="../../js/controllers/custoCadastroController.js"></script>
	<script type="text/javascript" src="../../js/bundle_pt-BR.js"></script>


</head>
	<body ng-controller="custoCadastroController">
		<ng-include src="'../../view/header.php'"></ng-include>
		<div class="container">

			<div>
				<ol class="breadcrumb">
				  <li><a href="../../">Home</a></li>
				  <li><a href="../">Custos</a></li>
				  <li class="active">Cadastro</li>
				</ol>
			</div>

			<div class="panel-group">
				<div class="panel panel-primary">
	  				<div class="panel-heading"><h2>Cadastro de Custo</h2></div>
	  				<div class="panel-body">
	  					<form class="form-horizontal" action="salvar/" method="POST">
		  					<div class="form-group">
			  				
								<div class="form-group">
									<label class="col-md-3 control-label" for="nome">Nome</label>
									<div class="col-md-7">
									<input type="hidden" name="id" <?=!empty($id) ? 'value="' . $id  . '"'   : ""?> />
									<input class="form-control input-md" type="text" placeholder="Nome do Custo" name="nome" <?=!empty($id) ? 'value="' . $nome  . '"'   : ""?> />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="valor">Valor</label>
									<div class="col-md-7">
										<input class="form-control input-md" type="text" placeholder="Valor do Custo" name="valor" <?=!empty($id) ? 'value="' . $valor  . '"'   : ""?> />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="descricao">Descrição</label>
									<div class="col-md-7">
									<input class="form-control input-md" type="text" placeholder="Descrição do Custo" name="descricao" <?=!empty($id) ? 'value="' . $descricao  . '"'   : ""?> />
									</div>
								</div>
								<div class="form-group text-right">
									<div class="col-md-10">
										<button class="btn btn-primary btn-lg">Salvar</button>
									</div>
								</div>
							</div>	
		  				</form>
		  			</div>	
	  			</div>
	  		</div>
		</div>
		<ng-include src="'../../view/footer.php'"></ng-include>
	</body>
</html>