<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$service = new CustoService();
	$custos = $service->findAll();

	echo (json_encode($custos));
?>