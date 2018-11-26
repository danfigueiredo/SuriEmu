<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$service = new TipoFuncionarioService();
	$tipos = $service->findAll();

	echo (json_encode($tipos));
?>