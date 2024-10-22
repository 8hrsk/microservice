<?php

class DeleteController extends Controller {
    public function handle() {

        $result = $this->Users->delete($this->data);

        if ($result === true) {
            $response = [
                'status' => 200,
                'body' => 'Deleted successfully',
            ];
        } else {
            $response = [
                'status' => 500,
                'body' => 'Error during deletion',
            ];
        }

        $response = $this->JSON($response);

        return $response;
    }
}