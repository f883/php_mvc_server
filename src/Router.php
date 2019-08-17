<?php

class Router{
    private $routes = [];

    /*
    // Примеры

    $router->addRoute('get', '/test/', 'TestController');
    // путь должен начинаться и заканчиваться слешами

    $router->addRoute('get', '/test\/index/', 'TestController');
    // при пути из нескольких элементов разделительные слеши необходимо экранировать

    $router->addRoute('get', '/test\/\d+/', 'TestController');
    */

    // path: путь к файлу
    // method: тип запроса (GET, POST и др.)
    // controller: название класса контроллера
    public function addRoute($method, $regexp, $controller){
        $regexp = $regexp . "i"; // регистронезависимый поиск
        $this->routes[] = [
            'regexp' => $regexp,
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }

    public function dispatch($method, $url, $data = null){
        $path = '';
        $params = [];
        // error_log($url);
        // error_log(strpos($url, '?'));
        if (strpos($url, '?') !== false){
            $domains = explode('?', $url);
            $path = $domains[0];
            $params = $this->getParams($domains[1]);
        }
        else{
            $path = $url;
        }
        
        $controllerFound = false;
        foreach ($this->routes as $route){
            //echo $route['regexp'] . " " . $path . "\n";
            if (preg_match($route['regexp'], $path) === 1){
                if ($route['method'] === strtoupper($method)){
                    $controllerFound = true;
                    $route['controller']->execute($path, $params, json_decode($data, true));
                    break;
                }
            }
        }

        if (!$controllerFound){
            http_response_code(404);
            echo "Url not found.";
        }
    }

    private function getParams($rawParams){
        $res = [];
        parse_str($rawParams, $res);
        return $res;
    }
}