<?php

class User extends Database {
    public function create(array $UserData) {}

    public function getUserById(int $id) {}

    public function getUserByUsername(string $username) {}

    public function delete(int $id) {}

    public function update(int $id, array $UserData) {}

    public function getAllUsers() {}
}