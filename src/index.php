<?php

require_once('./ControllersAutoimport.php');

require_once('./Database/Database.php');
require_once('./Database/User.php');

$controllersDirectory = __DIR__ . '/Controllers';
$controllersAutoimport = new ControllersAutoimport($controllersDirectory);

$routes = require __DIR__ . '/routes.php';

require_once('./RequestHandler.php');
require_once('./ResponseSender.php');

$requestHandler = new RequestHandler($routes);
$responseSender = new ResponseSender();

$response = $requestHandler->handleRequest($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO'], $_POST);
$responseSender->send($response);