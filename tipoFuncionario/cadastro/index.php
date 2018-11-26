<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");
	$id = "";
	$sigla = null;
	$horasDeTrabalho = null;
	$nome = "";
	$descricao = "";
	if (isset($_GET) && !empty($_GET)) {
		$id = $_GET["id"];
		$autoload = new Autoload();

		$service = new TipoFuncionarioService();
		$tipoFuncionario = $service->findById($id);

		$id = $tipoFuncionario->getId();
		$nome = $tipoFuncionario->getNome();
		$sigla = $tipoFuncionario->getSigla();
		$horasDeTrabalho = $tipoFuncionario->getHorasDeTrabalho();
		$descricao = $tipoFuncionario->getDescricao();
	}
?>

<!DOCTYPE html>
<html ng-app="suriEmu">
<head>
	<title>SURI-EMU - Cadastro de Tipos de Funcionario</title>

	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/suri-emu.css">

	<script type="text/javascript" src="../../lib/bootstrap/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../lib/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../lib/angular/angular.js"></script>
	<script type="text/javascript" src="../../lib/angular/angular-locale_ja-jp.js"></script>

	<script type="text/javascript" src="../../js/suriEmu.js"></script>
	<script type="text/javascript" src="../../js/controllers/tipoFuncionarioCadastroController.js"></script>
	<script type="text/javascript" src="../../js/bundle_pt-BR.js"></script>


</head>
	<body ng-controller="tipoFuncionarioCadastroController">
		<ng-include src="'../../view/header.php'"></ng-include>
		<div class="container">

			<div>
				<ol class="breadcrumb">
				  <li><a href="../../">Home</a></li>
				  <li><a href="../">Tipo de Funcionario</a></li>
				  <li class="active">Cadastro</li>
				</ol>
			</div>

			<div class="panel-group">
				<div class="panel panel-primary">
	  				<div class="panel-heading"><h2>Cadastro de Tipo de Funcionario</h2></div>
	  				<div class="panel-body">
	  					<form class="form-horizontal" action="salvar/" method="POST">
		  					<div class="form-group">
			  				
								<div class="form-group">
									<label class="col-md-3 control-label" for="nome">Nome</label>
									<div class="col-md-7">
									<input type="hidden" name="id" <?=!empty($id) ? 'value="' . $id  . '"'   : ""?> />
									<input class="form-control input-md" type="text" placeholder="Nome do Tipo Funcionario" name="nome" <?=!empty($id) ? 'value="' . $nome  . '"'   : ""?> />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="sigla">Sigla</label>
									<div class="col-md-7">
										<input class="form-control input-md" type="text" placeholder="Sigla do Tipo do Funcionario" name="sigla" <?=!empty($id) ? 'value="' . $sigla  . '"'   : ""?> />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="horasDeTrabalho">Horas de Trabalho</label>
									<div class="col-md-7">
										<input class="form-control input-md" type="text" placeholder="Horas de Trabalho" name="horasDeTrabalho" <?=!empty($id) ? 'value="' . $horasDeTrabalho  . '"'   : ""?> />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="descricao">Descrição</label>
									<div class="col-md-7">
									<input class="form-control input-md" type="text" placeholder="Descrição do Tipo de Funcionario" name="descricao" <?=!empty($id) ? 'value="' . $descricao  . '"'   : ""?> />
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