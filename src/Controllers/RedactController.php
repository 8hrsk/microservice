<?php

class RedactController extends Controller {

    public function handle() {
        $response = [
            'status' => 200,
            'body' => 'Redact',
        ];
        return $response;
    }
}