<?php 

	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$id = $_GET["id"];
	$service = new TipoFuncionarioService();
	$service->remove($id);
	
	header("location: /SuriEmu/tipoFuncionario/");
?>