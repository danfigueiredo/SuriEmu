<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$service = new DepartamentoService();
	$departamentos = $service->findAll();

	echo (json_encode($departamentos));
?>