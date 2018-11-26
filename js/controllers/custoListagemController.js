angular.module("suriEmu").controller("custoListagemController", function ($scope, $http) {
	$(document).ready(function(){
		$(".dropdown-toggle").dropdown();
	});

	var carregarCustos = function () {
			$http.post("listagem.php").then(function onSuccess(response) {
				$scope.custos = response.data;
			});
		};
	carregarCustos();

});

