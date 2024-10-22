<?php

class GetUsersController extends Controller {
    public function handle() {

        $result = $this->Users->getAllUsers();

        if ($result !== null) {
            $response = [
                'status' => 200,
                'body' => $result,
            ];
        } else {
            $response = [
                'status' => 500,
                'body' => 'Error during getting users',
            ];
        }

        $response = $this->JSON($response);

        return $response;
    }
}