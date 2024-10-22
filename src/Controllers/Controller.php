<?php

class Controller {

    protected $data;
    protected $Users;
    protected $Numverify;

    public function __construct($requestData) {
        require_once('./Database/Database.php');
        require_once('./Database/User.php');
        require_once('./NumverifyApi.php');

        $this->Users = new User();
        $this->Numverify = new NumverifyApi();
        $this->data = $requestData;
    }

    public function handle() {
        $response = [
            'status' => 200,
            'body' => 'Hello, World!',
            'headers' => [],
        ];

        $response = $this->JSON($response);

        return $response;
    }

    public function JSON(array $data) {
        return json_encode($data);
    }

    protected function validateUserNameOrSurname(string $name) {
        if (
                str_replace(' ', '', $name) === '' ||
                $name === null ||
                strlen($name) > 32
            ) {
                return false;
            } else {
                return true;
            }
    }

    protected function validateEmail(string $email) {
        if (
            str_replace(' ', '', $email) === '' ||
            $email === null ||
            !filter_var($email, FILTER_VALIDATE_EMAIL)
        ) {
            return false;
        } else {
            return true;
        }
    }

    protected function validatePhone(string $phone) {
        if (
            str_replace(' ', '', $phone) === '' ||
            $phone === null ||
            strlen($phone) > 18
        ) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Проверяет, существует ли пользователь с таким номером телефона.
     *
     * @param string $phone Номер телефона.
     *
     * @return bool True, если пользователь с таким номером телефона существует, false в противном случае.
     */
    protected function checkSimilarPhones(string $phone) {
        $result = $this->Users->getUserByPhone(['phone' => $phone]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Проверяет, существует ли пользователь с таким email.
     *
     * @param string $email Email.
     *
     * @return bool True, если пользователь с таким email существует, false в противном случае.
     */
    protected function checkSimilarEmails(string $email) {
        $result = $this->Users->getUserByEmail(['email' => $email]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    protected function validate() {
        $validationNotPassed = [
            'status' => 400,
            'body' => [],
        ];

        if (isset($this->data['name']) && $this->validateUserNameOrSurname($this->data['name']) === false) {
            array_push($validationNotPassed['body'], 'Name validation failed');
        }

        if (isset($this->data['surname']) && $this->validateUserNameOrSurname($this->data['surname']) === false) {
            array_push($validationNotPassed['body'], 'Surname validation failed');
        }

        if (isset($this->data['email']) && $this->validateEmail($this->data['email']) === false) {
            array_push($validationNotPassed['body'], 'Email validation failed');
        }

        if (isset($this->data['phone']) && $this->validatePhone($this->data['phone']) === false) {
            array_push($validationNotPassed['body'], 'Phone validation failed');
        }

        if (isset($this->data['phone']) && $this->checkSimilarPhones($this->data['phone']) === true) {
            array_push($validationNotPassed['body'], 'Phone is already taken');
        }

        if (isset($this->data['email']) && $this->checkSimilarEmails($this->data['email']) === true) {
            array_push($validationNotPassed['body'], 'Email is already taken');
        }

        return $validationNotPassed;
    }
}