<?php

return [
    '/hello' => [
        "handler" => "HelloController",
    ],

    '/create' => [
        "handler" => "CreateController",
    ],

    '/delete' => [
        "handler" => "DeleteController",
    ],

    '/redact' => [
        "handler" => "RedactController",
    ],

    '/getAllUsers' => [
        "handler" => "GetUsersController",
    ],
];