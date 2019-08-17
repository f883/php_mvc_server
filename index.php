<?php

// TODO: поставить xdebug
// TODO: code sniffer

// TODO: посмотреть реализацию slim
// почитать про data transfer object

// refactoring.guru 
// описание паттернов с примерами

// uncle bob // роберт мартин?


require_once "src/Router.php";
require_once 'src/Storage.php';


$app = new app();
$app->run();

class app{
    private $router;
    private $storage;

    public function run(){
        $this->router = new Router();
        $store = new Storage();
        $this->storage = $store->data;

        $this->router->addRoute('get', '/game\/\d+/', $this->storage['GetGameController']);
        $this->router->addRoute('put', '/game\/\d+/', $this->storage['ChangeGameController']);
        $this->router->addRoute('post', '/game/', $this->storage['AddGameController']);
        $this->router->addRoute('delete', '/game\/\d+/', $this->storage['DeleteGameController']);
    
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $data = file_get_contents('php://input');

        // error_log(print_r($url, TRUE));
        // error_log(print_r($method, TRUE));
        // error_log(print_r($data, TRUE));

        // $url = '/game/4'; 
        // $method = "put";
        // $data = '{"name":"test_4_game"}';

        $this->router->dispatch($method, $url, $data);
    }
}