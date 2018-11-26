<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$service = new SetorService();
	$setores = $service->findAll();

	echo (json_encode($setores));
?>