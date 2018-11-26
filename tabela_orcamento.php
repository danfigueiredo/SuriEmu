<?php 
	$diaUteis = 18;
	$horasNormais = 144;
	$horasExtras = 40;
	$horasNoturnas = 108;
	$valorHora = 1000;
	$valorHoraExtra = 1250;
	$adicionalNoturno = 250;
	$valorHoraNormalTotal = 140000;
	$valorHoraExtraTotal = 50000;
	$valorAdicionalTotal = 27000;
	$previsaoDesconto = 50000;
	$valorTotal = 0;

	$count = 1;
?>

<!DOCTYPE html>
<html ng-app="tabelaOrcamento">
<head>
	<title>Orçamento</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap-theme.css">
	<style type="text/css">
		.negrito {
			font-weight: bold;
		}		
	</style>
	<script type="text/javascript" src="lib/angular/angular.js"></script>
	<script type="text/javascript" src="lib/angular/angular-locale_ja-jp.js"></script>
	<script type="text/javascript">
		angular.module("tabelaOrcamento", []);
		angular.module("tabelaOrcamento", []).filter('ceil', function(){
  			return function(input) {
    		return Math.ceil(+input);
  		};
  	}).controller("tabelaOrcamentoController", function($scope) {

	
 		$scope.numbers = [0.2,1.5,1.3,5.5,3,10,0.5];

		var orcamentos = [
			{	
				funcionario: {
					id: 1, 
					codigoFuncional: 658747, 
					nome: "Komazona Pedro", 
					nomeJapones: "隈園　ペドロ", 
					dataNascimento: new Date("1968-1-20"), 
					descricao: "", 
					dataEntrada: new Date("2006-10-18"), 
					tipoFuncionario: {id: 1, nome: "Direct Worker", sigla: "DW",horasDeTrabalho: 8, descricao: ""}, 
					absenteismos: [
						{id: 1, data: new Date("2018-9-1"), horas: 8},
						{id: 2, data: new Date("2018-9-2"), horas: 8},
						{id: 3, data: new Date("2018-9-3"), horas: 8}
					],
					salarioHora: {id: 1, valorHora: 1200, descricao: ""}, 
					shakaiHoken: {id: 1, PorcentagemSeguroSaude: 9.9, PorcentagemSeguroEnfermagem: 1.57, PorcentagemAposentadoria: 17.83, AnoDaVigencia: new Date("2018")}, 
					descontos: [
						{nome: "Seguro Desemprego", Porcentagem: 0.7, valor: null, isVigente: true},
						{nome: "Passagem", Porcentagem: null, valor: 50000, isVigente: true},
						{nome: "Auxilio Infantil", Porcentagem: 0.2, valor: null, isVigente: true}
					],
					setor: {id: 1, codigoSetor: 123, nome: "HYB", descricao: ""}
				},
				diaUteis: 18, 
				horasExtras: 40,
				horasNoturnas: 108, 
				valorHoraExtra: 1250, 
				adicionalNoturno: 250, 
				previsaoDesconto: 50000,
				valorTotal: 0
			},
			{	
				funcionario: {
					id: 2, 
					codigoFuncional: 659920, 
					nome: "Ooshiro Shigeme", 
					nomeJapones: "大城　シゲメ", 
					dataNascimento: new Date("1957-2-6"), 
					descricao: "", 
					dataEntrada: new Date("2006-10-18"), 
					tipoFuncionario: {id: 1, nome: "Direct Worker", sigla: "DW",horasDeTrabalho: 8, descricao: ""}, 
					absenteismos: [
						{id: 1, data: new Date("2018-9-1"), horas: 8},
						{id: 2, data: new Date("2018-9-2"), horas: 8},
						{id: 3, data: new Date("2018-9-3"), horas: 8}
					],
					salarioHora: {id: 1, valorHora: 1000, descricao: ""}, 
					shakaiHoken: {id: 1, PorcentagemSeguroSaude: 9.9, PorcentagemSeguroEnfermagem: 1.57, PorcentagemAposentadoria: 17.83, AnoDaVigencia: new Date("2018")}, 
					descontos: [
						{nome: "Seguro Desemprego", Porcentagem: 0.7, valor: null, isVigente: true},
						{nome: "Passagem", Porcentagem: null, valor: 50000, isVigente: true},
						{nome: "Auxilio Infantil", Porcentagem: 0.2, valor: null, isVigente: true}
					],
					setor: {id: 1, codigoSetor: 123, nome: "HYB", descricao: ""}
				},
				diaUteis: 18, 
				horasExtras: 40,
				horasNoturnas: 108, 
				valorHoraExtra: 1250, 
				adicionalNoturno: 250, 
				previsaoDesconto: 50000,
				valorTotal: 0
			},
			{	
				funcionario: {
					id: 3, 
					codigoFuncional: 668618, 
					nome: "Kudaka Masahide", 
					nomeJapones: "久高　マサヒデ", 
					dataNascimento: new Date("1984-4-4"), 
					descricao: "", 
					dataEntrada: new Date("2006-10-18"), 
					tipoFuncionario: {id: 1, nome: "Direct Worker", sigla: "DW",horasDeTrabalho: 8, descricao: ""}, 
					absenteismos: [
						{id: 1, data: new Date("2018-9-1"), horas: 8},
						{id: 2, data: new Date("2018-9-2"), horas: 8},
						{id: 3, data: new Date("2018-9-3"), horas: 8}
					],
					salarioHora: {id: 1, valorHora: 1345, descricao: ""}, 
					shakaiHoken: {id: 1, PorcentagemSeguroSaude: 9.9, PorcentagemSeguroEnfermagem: 1.57, PorcentagemAposentadoria: 17.83, AnoDaVigencia: new Date("2018")}, 
					descontos: [
						{nome: "Seguro Desemprego", Porcentagem: 0.7, valor: null, isVigente: true},
						{nome: "Passagem", Porcentagem: null, valor: 50000, isVigente: true},
						{nome: "Auxilio Infantil", Porcentagem: 0.2, valor: null, isVigente: true}
					],
					setor: {id: 1, codigoSetor: 123, nome: "HYB", descricao: ""}
				},
				diaUteis: 18, 
				horasExtras: 40, 
				horasNoturnas: 108, 
				valorHoraExtra: 1250, 
				adicionalNoturno: 250, 
				previsaoDesconto: 50000,
				valorTotal: 0
			}
		];

		$scope.orcamentos = orcamentos;

		$scope.tiposFuncionario = [
			{id: 1, nome: "Direct Worker", sigla: "DW",horasDeTrabalho: 8, descricao: ""},
			{id: 2, nome: "Indirect Worker", sigla: "IW",horasDeTrabalho: 8, descricao: ""}
		];

		var getIdadePorDataNascimento = function (dataNascimento) {
			var hoje = new Date();
			var idade = hoje.getFullYear() - dataNascimento.getFullYear();
			var mes = hoje.getMonth() - dataNascimento.getMonth();
			if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
				idade--;
			}
			return idade;
		}

		var calcularHorasAbsenteismo = function (funcionario) {
			var horasAbsenteismo = 0;
				for (var i = funcionario.absenteismos.length - 1; i >= 0; i--) {
					horasAbsenteismo += funcionario.absenteismos[i].horas;
				};
				return horasAbsenteismo;
			};


		$scope.totalDiaUteis = 0;
		$scope.totalHorasNormais = 0;
		$scope.totalHorasExtras = 0;
		$scope.totalHorasNoturnas = 0;

		$scope.calcularTotalHorasTrabalhadas = function(diasUteis, horasDeTrabalho) {
			return horasDeTrabalho * diasUteis;
		};

		var calcularTotal = function(orcamentos) {
				$scope.totalHorasNormais = 0;
			for (var i = orcamentos.length - 1; i >= 0; i--) {
				//$scope.totalHorasNormais += calcularTotalHorasTrabalhadas(orcamentos[i].diaUteis, orcamentos[i].funcionario.tipoFuncionario.horasDeTrabalho);
				$scope.totalDiaUteis += orcamentos[i].diaUteis;
				$scope.totalHorasNormais += orcamentos[i].funcionario.tipoFuncionario.horasDeTrabalho;
				$scope.totalHorasExtras += orcamentos[i].horasExtras;
				$scope.totalHorasNoturnas += orcamentos[i].horasNoturnas;
				console.log()
			}
		};

		calcularTotal(orcamentos);
			
		});
	</script>
</head>
<body ng-controller="tabelaOrcamentoController">
	<table class="table table-bordered">
		<thead class="thead-dark">
			<tr>
				<th></th>
				<th scope="col">Codigo Funcional</th>
				<th scope="col">Nome do Funcionario</th>
				<th scope="col">Tipo</th>
				<th scope="col">Dias Uteis</th>
				<th scope="col">Normal (H)</th>
				<th scope="col">Extra (H)</th>
				<th scope="col">Noturno (H)</th>
				<th scope="col">Valor (H)</th>
				<th scope="col">Valor Extra (H)</th>
				<th scope="col">Adicional Noturno</th>
				<th scope="col">Valor Hora Normal Total</th>
				<th scope="col">Valor Hora Extra Total</th>
				<th scope="col">Valor Adcional Total</th>
				<th scope="col">Total</th>
				<th scope="col">Previsão Desconto</th>
			</tr>
		</thead>
			<tbody>
			
			<tr ng-class="{'negrito bg-warning': orcamento.selecionado}" ng-repeat="orcamento in orcamentos">
				<td class="align-middle text-center"><input type="checkbox" ng-model="orcamento.selecionado" /></td>
				<td class="align-middle">{{orcamento.funcionario.codigoFuncional}}</td>
				<td class="align-middle">{{orcamento.funcionario.nomeJapones}}</td>
				<td class="align-middle">
					<span ng-if="!orcamento.selecionado">{{orcamento.funcionario.tipoFuncionario.sigla}}</span>
					<select class="form-control" style="margin-right: 12px;" ng-if="orcamento.selecionado" ng-model="orcamento.funcionario.tipoFuncionario" ng-options="tipoFuncionario as tipoFuncionario.sigla for tipoFuncionario in tiposFuncionario track by tipoFuncionario.sigla"></select>
				</td>
				<td class="align-middle">
					<span ng-if="!orcamento.selecionado">{{orcamento.diaUteis}}</span>
					<input ng-model="orcamento.diaUteis" class="form-control" type="text" size="3" ng-if="orcamento.selecionado" value="{{orcamento.diaUteis}}" />
				</td>
				<td class="align-middle"><span ng-model="orcamento.totalHorasNormais">144</span></td>
				<td class="align-middle">
					<span ng-if="!orcamento.selecionado">{{orcamento.horasExtras}}</span>
					<input ng-model="orcamento.horasExtras" class="form-control" type="text" size="3" ng-if="orcamento.selecionado" value="{{orcamento.horasExtras}}" />
				</td>
				<td class="align-middle">
					<span ng-if="!orcamento.selecionado">{{orcamento.horasNoturnas}}</span>
					<input ng-model="orcamento.horasNoturnas" class="form-control" type="text" size="3" ng-if="orcamento.selecionado" value="{{orcamento.horasNoturnas}}" />
				</td>
				<td class="align-middle">{{orcamento.funcionario.salarioHora.valorHora | currency}}</td>
				<td class="align-middle">{{orcamento.funcionario.salarioHora.valorHora * 1.25| ceil | currency}}</td>
				<td class="align-middle" class="align-middle">{{orcamento.adicionalNoturno | currency}}</td>
				<td class="align-middle">140,000</td>
				<td class="align-middle">50,000</td>
				<td class="align-middle">27,000</td>
				<td class="align-middle">270,000</td>
				<td class="align-middle">50,000</td>
			</tr>
		
		</tbody>
		 <thead>
		 	<tbody>
			 	<tr class="table bg-secondary">
					<th class="text-center" colspan="2">Total</th>
					<th class="text-center" colspan="2">5 Pessoas</th>
					<th>{{totalDiaUteis}}</th>
					<th>{{totalHorasNormais}}</th>
					<th>{{totalHorasExtras}}</th>
					<th>{{totalHorasNoturnas}}</th>
					<th>{{<?=$valorHora * $count ?> | currency}}</th>
					<th>{{<?=$valorHoraExtra * $count ?> | currency}}</th>
					<th>{{<?=$valorAdicionalTotal * $count ?> | currency}}</th>
					<th>{{<?=$valorHoraNormalTotal * $count ?> | currency}}</th>
					<th>{{<?=$valorHoraExtraTotal * $count ?> | currency}}</th>
					<th>{{<?=$valorAdicionalTotal * $count ?> | currency}}</th>
					<th>{{<?=($valorHoraNormalTotal + $valorHoraExtraTotal + $valorAdicionalTotal) * $count?> | currency}}</th>
					<th>{{<?=$previsaoDesconto * $count ?> | currency}}</th>
				</tr>
				<tr class="table bg-secondary">
					<th class="align-middle text-center" colspan="2" rowspan="2">Detalhes</th>
					<th>Direct Worker</th>
					<th><?=$count ?></th>
					<th><?=$diaUteis * $count ?></th>
					<th><?=$horasNormais * $count ?></th>
					<th><?=$horasExtras * $count ?></th>
					<th><?=$horasNoturnas * $count ?></th>
				</tr>
				<tr class="table bg-secondary">
					<th>Indirect Worker</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
				</tr>

			</tbody>
		</thead>
	</table>
</body>
</html>