<!DOCTYPE html>
<html ng-app="suriEmu">
<head>
	<title>SURI-EMU - Departamentos</title>

	<link rel="stylesheet" type="text/css" href="../lib/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../css/suri-emu.css">

	<script type="text/javascript" src="../lib/bootstrap/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../lib/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../lib/angular/angular.js"></script>
	<script type="text/javascript" src="../lib/angular/angular-locale_ja-jp.js"></script>

	<script type="text/javascript" src="../js/suriEmu.js"></script>
	<script type="text/javascript" src="../js/controllers/departamentoListagemController.js"></script>
	<script type="text/javascript" src="../js/bundle_pt-BR.js"></script>
	<style type="text/css">
		@font-face {
		  font-family: 'Glyphicons Halflings';
		  src: url('../lib/bootstrap/fonts/glyphicons-halflings-regular.eot');
		  src: url('../lib/bootstrap/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../lib/bootstrap/fonts/glyphicons-halflings-regular.woff') format('woff'), url('../lib/bootstrap/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../lib/bootstrap/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
}

.modal-dialog {
    transform: translate(0, -70%);
    top: 30%;
    margin: 0 auto;
}
	</style>
</head>
	<body ng-controller="departamentoListagemController">
		<ng-include src="'../view/header.php'"></ng-include>
		<div class="container">

			<div>
				<ol class="breadcrumb">
				  <li><a href=''>Home</a></li>
				  <li class="active">Departamentos</li>
				</ol>
			</div>

			<div class="panel-group">
				<div class="panel panel-primary">
	  				<div class="panel-heading">
	  					<h2>
	  						<div class="row">
	  							<div class="col-xs-10">
	  								<span>Departamentos</span>
	  							</div>
	  							<div class="text-right col-xs-2">
	  								<span>
				  						<a href="cadastro">
				  							<button type="button" class="btn btn-primary btn-md">
				  								<i class="glyphicon glyphicon-file" aria-hidden="true"></i>
				  							Novo</button>
				  						</a>	
			  						</span>
	  							</div>
	  							<div class="text-right">
	  								<span></span>
	  							</div>
	  						</div>
	  					</h2>

	  				</div>
	  				<div class="panel-body">
	  					<div class="form-group">

							<table class="table table-striped">
								<tr class="row">
									<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">ID</th>
									<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1">Codigo</th>
									<th>Nome</th>
									<th>Descricao</th>
									<th class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></th>
								</tr>
								<tr ng-model="departamento" ng-repeat="departamento in departamentos" class="row">
									<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
										{{departamento.id}}
									</td>
									<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1">{{departamento.codigoDepartamento}}</td>
									<td>{{departamento.nome}}</td>
									<td>{{departamento.descricao}}</td>
									<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-right">
										<a href="cadastro?id={{departamento.id}}" title="Editar">
									        <img width="25" height="25" src="../img/edit.png">
									    </a>
									    <a href='' data-toggle="modal" data-target='#remover{{id=departamento.id}}' title="Remover">
									        <img width="25" height="25" src="../img/remove.png">
									    </a>
									</td>

									
								</tr>
							</table>

						</div>	
		  			</div>	
	  			</div>
	  		</div>
		
		<div ng-repeat="departamento in departamentos">
			<div class="modal fade" id="remover{{departamento.id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="removeTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
					    <h5 class="modal-title" id="removeTitle"><b>Excluir Registro</b></h5>
					    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					      <span aria-hidden="true">&times;</span>
					    </button>
					  </div>
					  <div class="modal-body">
					  	<span>Deseja excluir este registro?</span>
					  </div>
					  <div class="modal-footer">
					    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					    <!-- <button type="button" class="btn btn-primary">Excluir</button> -->
					    <a href="remover?id={{departamento.id}}">
					    	<button type="button" class="btn btn-primary">Excluir</button>
					    </a>
					  </div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<ng-include src="'../view/footer.php'"></ng-include>
	</body>
</html>