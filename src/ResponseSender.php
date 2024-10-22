<?php

class ResponseSender {
    public function send($response, $executionTime, $memoryUsage) {
        header('X-Debug-Time: ' . $executionTime, true, 200);
        header('X-Debug-Memory: ' . $memoryUsage, true, 200);
        echo $response;
    }
}