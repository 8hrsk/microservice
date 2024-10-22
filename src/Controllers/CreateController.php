<?php



class CreateController extends Controller {
    public function handle() {

        $validationNotPassed = $this->validate();

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