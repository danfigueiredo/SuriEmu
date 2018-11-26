angular.module("suriEmu").controller("tipoFuncionarioListagemController", function ($scope, $http) {
	$(document).ready(function(){
		$(".dropdown-toggle").dropdown();
	});

	var carregarTiposFuncionario = function () {
			$http.post("listagem.php").then(function onSuccess(response) {
				$scope.tiposFuncionario = response.data;
			});
		};
	carregarTiposFuncionario();

});