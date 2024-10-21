<?php

class CreateController extends Controller {
    public function handle() {

        $response = [
            'status' => 200,
            'body' => 'Create',
        ];
        return $response;
    }
}