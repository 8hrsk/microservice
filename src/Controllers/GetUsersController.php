<?php

class GetUsersController extends Controller {
    public function handle() {

        $response = [
            'status' => 200,
            'body' => [
                'users'
            ],
        ];
        return $response;
    }
}