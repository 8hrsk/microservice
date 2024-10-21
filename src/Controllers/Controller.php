<?php

class Controller {

    private $data;

    public function __construct($requestData) {
        $this->data = $requestData;
    }

    public function handle() {
        $response = [
            'status' => 200,
            'body' => 'Hello, World!',
            'headers' => [],
        ];
        return $response;
    }
}