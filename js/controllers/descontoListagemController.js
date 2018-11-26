angular.module("suriEmu").controller("descontoListagemController", function ($scope, $http) {
	$(document).ready(function(){
		$(".dropdown-toggle").dropdown();
	});

	var carregarDescontos = function () {
			$http.post("listagem.php").then(function onSuccess(response) {
				$scope.descontos = response.data;
			});
		};
	carregarDescontos();

});

