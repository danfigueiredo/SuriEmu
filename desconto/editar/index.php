<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$desconto = new Desconto();
	$service = new DescontoService();
	$service->save($desconto->createObjectByPost($_POST));
	
	header("location: /SuriEmu/desconto/");
?>