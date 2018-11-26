<?php
class Autoload {
    public function __construct() {
        spl_autoload_extensions('.php');
        spl_autoload_register(array($this, 'load'));
    
    }

    private function load($className) {
        $extension = spl_autoload_extensions();
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/SuriEmu/src/' . $className . $extension);
    }
}
?>