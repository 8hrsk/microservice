<?php


class HelloController {

    private $data;

    public function handle() {
        $response = [
            'status' => 200,
            'body' => 'Hello, World!',
            'headers' => [],
        ];
        return $response;
    }
}