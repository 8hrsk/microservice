<?php

class DeleteController extends Controller {
    public function handle() {

        $response = [
            'status' => 200,
            'body' => 'Delete',
        ];
        return $response;
    }
}