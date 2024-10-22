<?php

class Database {

    protected $Connection;

    public function __construct() {
        $this->connect();
        $this->checkIfDBExists();
    }

    protected function connect() {
        $this->Connection = @new mysqli("microservise-db-1", "root", "121212Err");
        if ($this->Connection->connect_error) {
            die("Connection failed: " . $this->Connection->connect_error);
        }
    }

    private function checkIfDBExists() {
        $result = $this->Connection->query('SHOW DATABASES LIKE "php"');
        if ($result->num_rows == 0) {
            $this->createDB();
        } else {
            $this->Connection->query('USE php');
        }
    }

    private function createDB() {
        $this->Connection->query('CREATE DATABASE php');
        $this->Connection->query('
            CREATE TABLE `php`.`guests` 
            (`id` INT NOT NULL AUTO_INCREMENT , 
            `name` TEXT NOT NULL , 
            `surname` TEXT NOT NULL , 
            `email` VARCHAR(256) NOT NULL , 
            `phone` VARCHAR(22) NOT NULL , 
            `country` VARCHAR(128) NOT NULL , 
            PRIMARY KEY (`id`), 
            UNIQUE `phone` (`phone`), 
            UNIQUE `email` (`email`)) 
            ENGINE = InnoDB;
        ');
    }
}