<?php


class HelloController extends Controller{
    public function handle() {
        $response = [
            'status' => 200,
            'body' => 'Hello, World!',
            'headers' => [],
        ];

        $response = $this->JSON($response);

        return $response;
    }
}