<?php 

	echo currentUrl("SuriEmu");
	function currentUrl($dirApp) {
		$url = explode("/",  $_SERVER["REQUEST_URI"]);
		print_r($url);
		$currentUrl = "";
		$isCreatePath = false;
		foreach ($url as $path) {
			if ($dirApp == $path) {
				$isCreatePath = true;
			}

			if ($isCreatePath && $dirApp != $path) {
				$currentUrl .= "../";
			}
		}

		return $currentUrl;
	}
?>