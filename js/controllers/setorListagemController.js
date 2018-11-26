angular.module("suriEmu").controller("setorListagemController", function ($scope, $http) {
	$(document).ready(function(){
		$(".dropdown-toggle").dropdown();
	});

	var carregarSetores = function () {
			$http.post("listagem.php").then(function onSuccess(response) {
				$scope.setores = response.data;
			});
		};
	carregarSetores();

});

