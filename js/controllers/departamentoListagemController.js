angular.module("suriEmu").controller("departamentoListagemController", function ($scope, $http) {
	$(document).ready(function(){
		$(".dropdown-toggle").dropdown();
	});

	var carregarDepartamentos = function () {
			$http.post("listagem.php").then(function onSuccess(response) {
				$scope.departamentos = response.data;
			});
		};
	carregarDepartamentos();

});

