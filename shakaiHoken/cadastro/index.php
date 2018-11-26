<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");
	$id = "";
	$porcentagemSeguroSaude = null;
	$porcentagemSeguroEnfermagem = null;
	$porcentagemAposentadoria = null;
	$anoDaVigencia = null;
	if (isset($_GET) && !empty($_GET)) {
		$id = $_GET["id"];
		$autoload = new Autoload();

		$service = new ShakaiHokenService();
		$shakaiHoken = $service->findById($id);

		$id = $shakaiHoken->getId();
		$porcentagemSeguroSaude = $shakaiHoken->getPorcentagemSeguroSaude();
		$porcentagemSeguroEnfermagem = $shakaiHoken->getPorcentagemSeguroEnfermagem();
		$porcentagemAposentadoria = $shakaiHoken->getPorcentagemAposentadoria();
		$anoDaVigencia = $shakaiHoken->getAnoDaVigencia();
	}
?>

<!DOCTYPE html>
<html ng-app="suriEmu">
<head>
	<title>SURI-EMU - Cadastro de Shakai Hoken</title>

	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/suri-emu.css">

	<script type="text/javascript" src="../../lib/bootstrap/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../lib/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../lib/angular/angular.js"></script>
	<script type="text/javascript" src="../../lib/angular/angular-locale_ja-jp.js"></script>

	<script type="text/javascript" src="../../js/suriEmu.js"></script>
	<script type="text/javascript" src="../../js/controllers/shakaiHokenCadastroController.js"></script>
	<script type="text/javascript" src="../../js/bundle_pt-BR.js"></script>


</head>
	<body ng-controller="shakaiHokenCadastroController">
		<ng-include src="'../../view/header.php'"></ng-include>
		<div class="container">

			<div>
				<ol class="breadcrumb">
				  <li><a href="../../">Home</a></li>
				  <li><a href="../">Shakai Hoken</a></li>
				  <li class="active">Cadastro</li>
				</ol>
			</div>

			<div class="panel-group">
				<div class="panel panel-primary">
	  				<div class="panel-heading"><h2>Cadastro de Shakai Hoken</h2></div>
	  				<div class="panel-body">
	  					<form class="form-horizontal" action="salvar/" method="POST">
		  					<div class="form-group">
			  				
								<div class="form-group">
									<label class="col-md-3 control-label" for="nome">Seguro de Saude</label>
									<div class="col-md-7">
									<input type="hidden" name="id" <?=!empty($id) ? 'value="' . $id  . '"'   : ""?> />
									<input class="form-control input-md" type="text" placeholder="Porcentagem do Seguro de Saude" name="porcentagemSeguroSaude" <?=!empty($id) ? 'value="' . $porcentagemSeguroSaude  . '"'   : ""?> />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="sigla">Seguro Enfermagem</label>
									<div class="col-md-7">
										<input class="form-control input-md" type="text" placeholder="Porcentagem do Seguro Enfermagem" name="porcentagemSeguroEnfermagem" <?=!empty($id) ? 'value="' . $porcentagemSeguroEnfermagem  . '"'   : ""?> />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="horasDeTrabalho">Aposentadoria</label>
									<div class="col-md-7">
										<input class="form-control input-md" type="text" placeholder="Porcentagem da Aposentadoria" name="porcentagemAposentadoria" <?=!empty($id) ? 'value="' . $porcentagemAposentadoria  . '"'   : ""?> />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="descricao">Vigencia</label>
									<div class="col-md-7">
									<input class="form-control input-md" type="text" placeholder="Ano da Vigencia" name="anoDaVigencia" <?=!empty($id) ? 'value="' . $anoDaVigencia  . '"'   : ""?> />
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