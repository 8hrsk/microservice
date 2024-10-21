<?php

return [
    '/hello' => [
        "handler" => "HelloController",
    ],

    '/create' => [
        "handler" => "CreateController",
    ],

    '/update' => [
        "handler" => "UpdateController",
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