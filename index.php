<?php

require_once "GetGameController.php";
require_once "ChangeGameController.php";
require_once "AddGameController.php";
require_once "Router.php";

$router = new Router();

$router->addRoute('get', '/game\/\d+/', 'GetGameController');
$router->addRoute('post', '/game\/\d+/', 'ChangeGameController');
$router->addRoute('post', '/game/', 'AddGameController');

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$data = file_get_contents('php://input');

// error_log(print_r($url, TRUE));
// error_log(print_r($method, TRUE));
// error_log(print_r($data, TRUE));

// $url = '/game/123?sgf=23&tes=set';
// $method = "get";
// $data = [];

$router->dispatch($method, $url, $data);