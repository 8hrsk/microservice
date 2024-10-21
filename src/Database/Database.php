<?php

class Database {

    protected $Connection;

    public function __construct() {

    }

    protected function connect() {

        $this->Connection = new PDO('mysql:host=localhost;dbname=php', 'root', '');
    }
}