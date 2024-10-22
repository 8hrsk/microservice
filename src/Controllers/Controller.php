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
            $phone === null
        ) {
            return false;
        } else {
            return true;
        }
    }
}