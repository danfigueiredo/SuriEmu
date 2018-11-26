<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$custo = new Custo();
	$service = new CustoService();
	$service->save($custo->createObjectByPost($_POST));
	
	header("location: /SuriEmu/custo/");
?>