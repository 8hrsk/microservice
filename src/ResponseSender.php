<?php

class ResponseSender {
    public function send($response) {
        // header('Content-Type: multipart/form-data');
        echo $response['body'];
    }
}