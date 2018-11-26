angular.module("suriEmu").controller("shakaiHokenListagemController", function ($scope, $http) {
	$(document).ready(function(){
		$(".dropdown-toggle").dropdown();
	});

	var carregarShakaiHokens = function () {
			$http.post("listagem.php").then(function onSuccess(response) {
				$scope.shakaiHokens = response.data;
			});
		};
	carregarShakaiHokens();

});