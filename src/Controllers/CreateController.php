<?php



class CreateController extends Controller {
    public function handle() {

        if (
                !array_key_exists('name', $this->data) || 
                !array_key_exists('surname', $this->data) || 
                !array_key_exists('email', $this->data) || 
                !array_key_exists('phone', $this->data)
            ) {
            return $this->JSON([
                'status' => 400,
                'body' => 'Not enough data',
            ]);
        }

        $validationNotPassed = [
            'status' => 400,
            'body' => [],
        ];

        if ($this->validateUserNameOrSurname($this->data['name']) === false) {
            array_push($validationNotPassed['body'], 'Name validation failed');
        }

        if ($this->validateUserNameOrSurname($this->data['surname']) === false) {
            array_push($validationNotPassed['body'], 'Surname validation failed');
        }

        if ($this->validateEmail($this->data['email']) === false) {
            array_push($validationNotPassed['body'], 'Email validation failed');
        }

        if ($this->validatePhone($this->data['phone']) === false) {
            array_push($validationNotPassed['body'], 'Phone validation failed');
        }

        if ($this->checkSimilarPhones($this->data['phone']) === true) {
            array_push($validationNotPassed['body'], 'Phone is already taken');
        }

        if ($this->checkSimilarEmails($this->data['email']) === true) {
            array_push($validationNotPassed['body'], 'Email is already taken');
        }

        if (count($validationNotPassed['body']) > 0) {
            return $this->JSON($validationNotPassed);
        }

        if ($this->data['country'] == null) { // Если не указана страна, то получаем её через API
            $this->data['country'] = $this->Numverify->getCountryNameByNumber($this->data['phone'])['country_name'];
        }

        $result = $this->Users->create($this->data);

        if ($result === true) {
            $response = [
                'status' => 200,
                'body' => 'User created successfully',
            ];
        } else {
            $response = [
                'status' => 500,
                'body' => 'Error during user creation',
            ];
        }

        $response = $this->JSON($response);

        return $response;
    }
}