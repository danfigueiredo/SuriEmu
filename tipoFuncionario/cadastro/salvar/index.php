<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$tipoFuncionario = new TipoFuncionario();
	$service = new TipoFuncionarioService();
	$service->save($tipoFuncionario->createObjectByPost($_POST));
	
	header("location: /SuriEmu/tipoFuncionario/");
?>