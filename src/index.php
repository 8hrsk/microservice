<?php
$memoryUsageStart = memory_get_usage();
$timeStart = microtime(true);

require_once('./ControllersAutoimport.php');

$controllersDirectory = __DIR__ . '/Controllers';
$controllersAutoimport = new ControllersAutoimport($controllersDirectory);

$routes = require __DIR__ . '/routes.php';

require_once('./RequestHandler.php');
require_once('./ResponseSender.php');


$requestHandler = new RequestHandler($routes);
$responseSender = new ResponseSender();

$response = $requestHandler->handleRequest($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO'], $_POST);

$executionTime = microtime(true) - $timeStart;
$memoryUsage = memory_get_usage() - $memoryUsageStart;

$responseSender->send($response, $executionTime, $memoryUsage);