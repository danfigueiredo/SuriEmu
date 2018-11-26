<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$departamento = new Departamento();
	$service = new DepartamentoService();
	$service->save($departamento->createDepartamentoByPost($_POST));
	
	header("location: /SuriEmu/departamento/");
?>