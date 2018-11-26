<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/SuriEmu/src/lib/autoload.php");

	$autoload = new Autoload();

	$shakaiHoken = new ShakaiHoken();
	$service = new ShakaiHokenService();
	$service->save($shakaiHoken->createObjectByPost($_POST));
	
	header("location: /SuriEmu/shakaiHoken/");
?>