<?php

class RedactController extends Controller {

    public function handle() {

        $validationNotPassed = $this->validate();

        if (count($validationNotPassed['body']) > 0) {
            return $this->JSON($validationNotPassed);
        }

        $result = $this->Users->updateUserData($this->data);

        if ($result === true) {
            $response = [
                'status' => 200,
                'body' => 'Updated successfully',
            ];
        } else {
            $response = [
                'status' => 500,
                'body' => 'Error during update',
            ];
        }

        $response = $this->JSON($response);

        return $response;
    }
}