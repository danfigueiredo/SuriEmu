<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$setor = new Setor();
	$service = new SetorService();
	$service->save($setor->createDepartamentoByPost($_POST));
	
	header("location: /SuriEmu/setor/");
?>