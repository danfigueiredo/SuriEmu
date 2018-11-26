<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");
	
	$id = "";
	$codigoSetor = "";
	$nome = "";
	$descricao = "";
	$idDepartamento = "";

	$autoload = new Autoload();
	$departamentoService = new DepartamentoService();
	$departamentos = $departamentoService->findAll();

	if (isset($_GET) && !empty($_GET)) {
		$id = $_GET["id"];

		$service = new SetorService();
		$setor = $service->findById($id);

		$id = $setor->getId();
		$codigoSetor = $setor->getCodigoSetor();
		$nome = $setor->getNome();
		$descricao = $setor->getDescricao();
		$idDepartamento = $setor->getDepartamento()->getId();
	}
?>

<!DOCTYPE html>
<html ng-app="suriEmu">
<head>
	<title>SURI-EMU - Cadastro de Departamento</title>

	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/suri-emu.css">

	<script type="text/javascript" src="../../lib/bootstrap/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../lib/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../lib/angular/angular.js"></script>
	<script type="text/javascript" src="../../lib/angular/angular-locale_ja-jp.js"></script>

	<script type="text/javascript" src="../../js/suriEmu.js"></script>
	<script type="text/javascript" src="../../js/controllers/setorCadastroController.js"></script>
	<script type="text/javascript" src="../../js/bundle_pt-BR.js"></script>


</head>
	<body ng-controller="setorCadastroController">
		<ng-include src="'../../view/header.php'"></ng-include>
		<div class="container">

			<div>
				<ol class="breadcrumb">
				  <li><a href="../../">Home</a></li>
				  <li><a href="../">Setores</a></li>
				  <li class="active">Cadastro</li>
				</ol>
			</div>

			<div class="panel-group">
				<div class="panel panel-primary">
	  				<div class="panel-heading"><h2>Cadastro de Setores</h2></div>
	  				<div class="panel-body">
	  					<form class="form-horizontal" action="salvar/" method="POST">
		  					<div class="form-group">

								<div class="form-group">
									<label class="col-md-3 control-label" for="codigoSetor">Codigo</label>
									<div class="col-md-7">
										<input type="hidden" name="id" <?=!empty($id) ? 'value="' . $id  . '"'   : ""?> />
										<input class="form-control input-md" type="text" placeholder="Codigo do Setor" name="codigoSetor" <?=!empty($id) ? 'value="' . $codigoSetor  . '"'   : ""?> />
									</div>
								</div>
			  				
								<div class="form-group">
									<label class="col-md-3 control-label" for="nome">Nome</label>
									<div class="col-md-7">
									<input class="form-control input-md" type="text" placeholder="Nome do Setor" name="nome" <?=!empty($id) ? 'value="' . $nome  . '"'   : ""?> />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label" for="descricao">Descrição</label>
									<div class="col-md-7">
									<input class="form-control input-md" type="text" placeholder="Descrição do Setor" name="descricao" <?=!empty($id) ? 'value="' . $descricao  . '"'   : ""?> />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="idDepartamento">Departamento</label>
									<div class="col-md-7">
										<select class="form-control input-md" name="idDepartamento">
											<option>Selecione o Departamento</option>
											<?php 
												foreach ($departamentos as $dp) {
													$condicao = !empty($idDepartamento) && $idDepartamento == $dp->getId() ? 'selected="selected"' : '';
													echo '<option '. $condicao .' value="' . $dp->getId() . '">' . $dp->getNome() . '</option>';
												} 
											?>
										</select>
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
		</div>
		<ng-include src="'../../view/footer.php'"></ng-include>
	</body>
</html>