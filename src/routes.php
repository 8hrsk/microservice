<?php

return [
    '/create' => [
        "handler" => "CreateController",
        "parameters" => ["name", "surname", "email", "phone", "country"],
    ],

    '/delete' => [
        "handler" => "DeleteController",
        "parameters" => ["id"],
    ],

    '/update' => [
        "handler" => "RedactController",
        "parameters" => ["id", "name", "surname", "email", "phone", "country"], // Только id важен. Остальные параметры применяются, если их нужно изменить
    ],

    '/getAllUsers' => [
        "handler" => "GetUsersController",
        "parameters" => [],
    ],
];