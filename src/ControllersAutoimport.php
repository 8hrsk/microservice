<?php

class ControllersAutoimport {

    private $ControllersDirectory;

    public function __construct($controllersDirectory) {
        $this->ControllersDirectory = $controllersDirectory;

        $this->autoimport();
    }


    public function autoimport() {
        $files = glob($this->ControllersDirectory . '/*');
        foreach ($files as $file) {
            require_once($file);
        }
    }
}