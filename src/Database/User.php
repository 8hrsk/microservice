<?php

class User extends Database {
    public function create(array $UserData) {
        $result = $this->Connection->query('
            INSERT INTO `php`.`guests` (`name`, `surname`, `email`, `phone`, `country`)
            VALUES
            ("' . $UserData['name'] . '", "' . $UserData['surname'] . '", "' . $UserData['email'] . '", "' . $UserData['phone'] . '", "' . $UserData['country'] . '")
        ');

        return $result ? true : false;
    }

    public function getUserById(array $UserData) {
        $result = $this->Connection->query('
            SELECT * FROM `php`.`guests`
            WHERE `id` = ' . $UserData['id'] . '
        ');

        return $result->fetch_assoc();
    }

    public function getUserByEmail(array $UserData) {
        $result = $this->Connection->query('
            SELECT * FROM `php`.`guests`
            WHERE `email` = "' . $UserData['email'] . '"
        ');

        return $result->fetch_assoc();
    }

    public function getUserByPhone(array $UserData) {
        $result = $this->Connection->query('
            SELECT * FROM `php`.`guests`
            WHERE `phone` = "' . $UserData['phone'] . '"
        ');

        return $result->fetch_assoc();
    }

    public function delete(array $UserData) {
        $result = $this->Connection->query('
            DELETE FROM `php`.`guests`
            WHERE `id` = ' . $UserData['id'] . '
        ');

        return $result ? true : false;
    }

    public function updateUserData(array $UserData) {
        $updateKeys = array_intersect_key($UserData, array_flip(['name', 'surname', 'phone', 'email', 'country']));
        $updateString = '';

        foreach ($updateKeys as $key => $value) {
            $updateString .= "`$key` = '$value', ";
        }
        
        $updateString = rtrim($updateString, ', ');

        $result = $this->Connection->query('
            UPDATE `php`.`guests`
            SET
            ' . $updateString . '
            WHERE `id` = ' . $UserData['id'] . '
        ');

        return $result ? true : false;
    }

    public function getAllUsers() {
        $result = $this->Connection->query('
            SELECT * FROM `php`.`guests`
            ORDER BY `id` ASC
        ');

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}